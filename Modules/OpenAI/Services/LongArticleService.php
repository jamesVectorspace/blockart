<?php 

namespace Modules\OpenAI\Services;

use Modules\OpenAI\Contracts\Resources\ChatContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Modules\OpenAI\Entities\Archive;
use Str, Exception;

class LongArticleService
{
    public $generator;
    private $production = true;
    
    /**
     * Method __construct
     *
     * @param ContentGenerator $generator [decide which AI provider will be used for generate]
     *
     * @return void
     */
    public function __construct(ChatContract $generator) 
    {
        $this->generator = $generator;
    }
    
    /**
     * Method getAllGeneratedArticle
     *
     * @return LengthAwarePaginator
     */
    public function getAllGeneratedArticle(): LengthAwarePaginator
    {
        return Archive::with('metas')->whereType('long_article')->where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(preference('row_per_page'));
    }
    
    /**
     * Method handleTitleGenerate (generate titles based on user input)
     *
     * @param array $requestData [required input for generate title]
     *
     * @return array
     * @throws Exception
     */
    public function handleTitleGenerate(array $requestData): array
    {
        $subscription = null;
        if (!subscription('isAdminSubscribed')) {
            $userId = (new ContentService())->getCurrentMemberUserId('meta', null);
            $userStatus = (new ContentService())->checkUserStatus($userId, 'meta');
            if ($userStatus['status'] == 'fail') {
                throw new Exception($userStatus['message']);
            }
            $validation = subscription('isValidSubscription', $userId, 'word');
            $subscription = subscription('getUserSubscription', $userId);
            if ($validation['status'] == 'fail' && !auth()->user()->hasCredit('word')) {
                throw new Exception($validation['message']);
            }
        }

        $options['prompt'] = filteringBadWords("Generate " . ($requestData['number_of_title'] == '1' ? 'only one' :  $requestData['number_of_title']) ." seo friendly ". Str::plural('title', $requestData['number_of_title']) ." in " . $requestData['language'] . " language based on this topic & keywords in " . $requestData['tone'] . " tone. Topic: " . $requestData['topic'] . ", Keywords: " . $requestData['keywords'] . ". ". ($requestData['number_of_title'] == '1' ? "The title" : "Each titles") ." must be an array element, give the output as an array. No addtional text before and after array [] brackets. Don't prefix array element with numbers.");
        
        $options['message'] = [
            ['role' => 'user', 'content' => $options['prompt']]
        ];
        $options['n'] = 1;

        if ($this->production) {
            $result =  $this->generator->prepareChatOptions($options)->generateChatContent(['method' => 'createChatCompletion']);
            $content = $this->generator->getChatContent($result);
        } else {
            $result = '{"id":"chatcmpl-8cmOdt48tbc82MiScVe1XRVWQKT6m","object":"chat.completion","created":1704253191,"model":"gpt-3.5-turbo-0613","choices":[{"index":0,"message":{"role":"assistant","content":"[\n\"Unleashing AI Superpowers: Exploring the Future of AI Technology\",\n\"Unlocking the Potential: AI Integration Services for the Future of AI\",\n\"Intelligent Automation and Machine Learning on Demand: Powering the Future of AI\",\n\"The Future of AI: OpenAI Envisions On-Demand AI Superpowers\"\n]","functionCall":null},"finishReason":"stop"}],"usage":{"promptTokens":90,"completionTokens":66,"totalTokens":156}}';
            $result = json_decode($result);
            $content = $this->generator->getChatContent($result);
        }
    
        if (!empty($content)) {

            if (!subscription('isAdminSubscribed') || auth()->user()->hasCredit('word')) {
                $increment = subscription('usageIncrement', $subscription?->id, 'word', $content['totalWords'], $userId);
                if ($increment  && $userId != auth()->user()->id) {
                    (new CodeService())->storeTeamMeta($content['totalWords']);
                }
                $wordLeft = subscription('isSubscribed', auth()->id()) ? subscription('fetureUsageLeft', $subscription?->id, 'feature_word') : 0;
            }

            $outputContents = $content['outputContents'];

            if (is_null(json_decode($outputContents))) {
                throw new Exception(__('Something went wrong with title generation. Please try again.'));
            }

            $validityCheck = json_decode($outputContents);
            if (! json_last_error() === JSON_ERROR_NONE) {
                throw new Exception(__('Something went wrong with title generation'));
            } 

            // Update Database
            if (! is_null($requestData['long_article_id'])) {
                $longArticle = Archive::whereType('long_article')->whereId($requestData['long_article_id'])->first();
                
                if (!is_null($longArticle)) {

                    $title = new Archive();
                    $title->parent_id = $longArticle->id;
                    $title->user_id = auth()->id();
                    $title->unique_identifier = (string) Str::uuid();
                    $title->type = 'long_article_title';
                    $title->title_values = json_decode($outputContents);
                    $title->title_initiated_by = auth()->id();
                    $title->title_article_generate_model = preference('long_article_model');
                    $title->title_prompt = $options['prompt'];
                    $title->title_tone = $requestData['tone'];
                    $title->title_language = $requestData['language'];
                    $title->title_topic = $requestData['topic'];
                    $title->title_keywords = $requestData['keywords']; 
                    $title->title_raw_response = $result;
                    $title->title_updated_by = auth()->id();
                    $title->save();

                    $allTitles = Archive::with('metas')
                        ->whereType('long_article_title')
                        ->where('parent_id', $longArticle->id)
                        ->latest()
                        ->get();
                    $generatedTitles = $allTitles->pluck('title_values')
                        ->flatten()
                        ->filter(function ($title) {
                            // Exclude null or empty title values
                            return !is_null($title) && $title !== '';
                        })
                        ->all();
                } else {
                    $longArticle = new Archive();
                    $longArticle->user_id = auth()->id();
                    $longArticle->title = $requestData['topic'];
                    $longArticle->unique_identifier = (string) Str::uuid();
                    $longArticle->provider = preference('long_article_provider');
                    $longArticle->type = 'long_article';
                    $longArticle->status = 'Incomplete';
                    $longArticle->expense_type =  $this->generator->expenseType();
                    $longArticle->expense += $content['totalTokens'];
                    $longArticle->total_words += $content['totalWords'];
                    $longArticle->completed_step = 1;
                    $longArticle->long_article_generate_model = preference('long_article_model');
                    $longArticle->save();

                    $title = new Archive();
                    $title->parent_id = $longArticle->id;
                    $title->user_id = auth()->id();
                    $title->unique_identifier = (string) Str::uuid();
                    $title->type = 'long_article_title';
                    $title->title_values = json_decode($outputContents);
                    $title->title_initiated_by = auth()->id();
                    $title->title_article_generate_model = preference('long_article_model');
                    $title->title_prompt = $options['prompt'];
                    $title->title_tone = $requestData['tone'];
                    $title->title_language = $requestData['language'];
                    $title->title_topic = $requestData['topic'];
                    $title->title_keywords = $requestData['keywords']; 
                    $title->title_raw_response = $result;
                    $title->save();

                    $generatedTitles = $title->title_values;
                }
            } else {
                $longArticle = new Archive();
                $longArticle->user_id = auth()->id();
                $longArticle->title = $requestData['topic'];
                $longArticle->unique_identifier = (string) Str::uuid();
                $longArticle->provider = preference('long_article_provider');
                $longArticle->type = 'long_article';
                $longArticle->status = 'Incomplete';
                $longArticle->expense_type =  $this->generator->expenseType();
                $longArticle->expense += $content['totalTokens'];
                $longArticle->total_words += $content['totalWords'];
                $longArticle->completed_step = 1;
                $longArticle->long_article_generate_model = preference('long_article_model');
                $longArticle->save();

                $title = new Archive();
                $title->parent_id = $longArticle->id;
                $title->user_id = auth()->id();
                $title->unique_identifier = (string) Str::uuid();
                $title->type = 'long_article_title';
                $title->title_values = json_decode($outputContents);
                $title->title_initiated_by = auth()->id();
                $title->title_article_generate_model = preference('long_article_model');
                $title->title_prompt = $options['prompt'];
                $title->title_tone = $requestData['tone'];
                $title->title_language = $requestData['language'];
                $title->title_topic = $requestData['topic'];
                $title->title_keywords = $requestData['keywords']; 
                $title->title_raw_response = $result;
                $title->save();

                $generatedTitles = $title->title_values;

            }

            return [
                'num_of_title' => count($title->title_values),
                'longArticleResponse' => $longArticle,
                'generatedTitles' => $generatedTitles,
                'wordLeft' => $wordLeft ?? 0,
            ];
        } else {
            throw new Exception(__("Unable to generate the :x. Please try again.", ['x' => __('titles')]));
        }
    }

    /**
     * Method handleOutlineGenerate (generate outlines based on user input)
     *
     * @param array $requestData [required input for generate outlines]
     *
     * @return array
     * @throws Exception
     */
    public function handleOutlineGenerate(array $requestData): array
    {
        $subscription = null;
        if (!subscription('isAdminSubscribed')) {
            $userId = (new ContentService())->getCurrentMemberUserId('meta', null);
            $userStatus = (new ContentService())->checkUserStatus($userId, 'meta');
            if ($userStatus['status'] == 'fail') {
                throw new Exception($userStatus['message']);
            }
            $validation = subscription('isValidSubscription', $userId, 'word');
            $subscription = subscription('getUserSubscription', $userId);
            if ($validation['status'] == 'fail' && !auth()->user()->hasCredit('word')) {
                throw new Exception($validation['message']);
            }
        }
            
        $options = [
            'prompt' => filteringBadWords("Generate section headings only to write a blog in " . $requestData['language'] . " language in " . $requestData["tone"] . " tone based on this title & keywords. Title: " . $requestData['title'] . ", Keywords: " . $requestData['keywords'] . ". Each section headings must be an array element, give the output as an array. No addtional text before and after array [] brackets. Don't prefix array element with numbers."),
            'n' => (int) $requestData['number_of_outlines']
        ];
        $options['message'] = [
            ['role' => 'user', 'content' => $options['prompt']]
        ];

        if ($this->production) {
            $result = $this->generator->prepareChatOptions($options)->generateChatContent(['method' => 'createChatCompletion']);
            $content = $this->generator->getChatContent($result);
        } else {
            $result = '{"id":"chatcmpl-8cnR62kWw9pVFmbIWraed0b53DEOr","object":"chat.completion","created":1704257188,"model":"gpt-3.5-turbo-0613","choices":[{"index":0,"message":{"role":"assistant","content":"[\"Introduction\", \n\"AI Superpowers: A Game Changer\",\n\"The Future of AI Technology\",\n\"Unleashing the Power of AI Integration Services\",\n\"Empowering Efficiency with Intelligent Automation\",\n\"Machine Learning on Demand: Revolutionizing Industries\",\n\"Conclusion\"]","functionCall":null},"finishReason":"stop"},{"index":1,"message":{"role":"assistant","content":"[\"Introduction\", \"The Power of AI Superpowers\", \"Exploring the Future of AI Technology\", \"AI Integration Services: Enhancing Business Efficiency\", \"Intelligent Automation: Revolutionizing Industries\", \"Machine Learning on Demand: Advancing AI Applications\", \"Conclusion\"]","functionCall":null},"finishReason":"stop"}],"usage":{"promptTokens":96,"completionTokens":105,"totalTokens":201}}';
            $result = json_decode($result);
            $content = $this->generator->getChatContent($result);
        }

        if (!empty($content)) { 
            if (!subscription('isAdminSubscribed') || auth()->user()->hasCredit('word')) {
                $increment = subscription('usageIncrement', $subscription?->id, 'word', $content['totalWords'], $userId);
                if ($increment  && $userId != auth()->user()->id) {
                    (new CodeService())->storeTeamMeta($content['totalWords']);
                }
                $wordLeft = subscription('isSubscribed', auth()->id()) ? subscription('fetureUsageLeft', $subscription?->id, 'feature_word') : 0;
            }

            $longArticle = Archive::whereType('long_article')->whereId($requestData['long_article_id'])->first();
            if (! $longArticle) {
                throw new Exception(__('Article not found. Please reset and try again.'));
            } 

            if (is_array($content['outputContents'])) {
                foreach ($content['outputContents'] as $key => $outlineContent) {

                    if (is_null(json_decode($outlineContent))) {
                        break;
                        throw new Exception(__('Something went wrong with outline generation. Please try again.'));
                    }

                    $outline = new Archive();
                    $outline->parent_id = $longArticle->id;
                    $outline->user_id = auth()->id();
                    $outline->unique_identifier = (string) Str::uuid();
                    $outline->type = 'long_article_outline';
                    $outline->outline_values = is_array($outlineContent) ? $outlineContent : json_decode($outlineContent);
                    $outline->outline_initiated_by = auth()->id();
                    $outline->prompt = $options['prompt'];
                    $outline->outline_title = $requestData['title'];
                    $outline->outline_keywords  = $requestData['keywords'];
                    $outline->outline_tone = $requestData['tone'];
                    $outline->outline_language = $requestData['language'];
                    $outline->outline_raw_response = $result;
                    $outline->save();
                }
            } else {

                if (is_null(json_decode($content['outputContents']))) {
                    throw new Exception(__('Something went wrong with outline generation. Please try again.'));
                }
                $outline = new Archive();
                $outline->parent_id = $longArticle->id;
                $outline->user_id = auth()->id();
                $outline->unique_identifier = (string) Str::uuid();
                $outline->type = 'long_article_outline';
                $outline->outline_values = is_array($content['outputContents']) ? $content['outputContents'] : json_decode($content['outputContents']);
                $outline->outline_initiated_by = auth()->id();

                $outline->prompt = $options['prompt'];
                $outline->outline_title = $requestData['title'];
                $outline->outline_keywords  = $requestData['keywords'];
                $outline->outline_tone = $requestData['tone'];
                $outline->outline_language = $requestData['language'];
                $outline->outline_raw_response = $result;
                $outline->save();
            } 

            $longArticle->completed_step  = 2;
            $longArticle->total_words += $content['totalWords'];
            $longArticle->expense += $content['totalTokens'];
            $longArticle->article_title = $requestData['title'];
            $longArticle->article_keywords  = $requestData['keywords'];
            $longArticle->save();

            $allOutlines = Archive::with('metas')
                ->whereType('long_article_outline')
                ->where('parent_id', $longArticle->id)
                ->latest()
                ->get();

            $generatedOutlines = $allOutlines->pluck('outline_values')
                ->filter(function ($outline) {
                    // Exclude null or empty outline values
                    return !is_null($outline) && $outline !== '';
                })
                ->toArray();

            return [
                'rawAiResponse' => $result,
                'longArticleResponse' => $longArticle,
                'generatedOutlines' => $generatedOutlines,
                'wordLeft' => $wordLeft ?? 0,
            ];
        } else {
            throw new Exception(__("Unable to generate the :x. Please try again.", ['x' => __('outlines')]));
        }
    }

    /**
     * method handleArticleGenerate (Handle article generation and stream the results to the client)
     *
     * @param int $longArticleId The ID of the long article.
     *
     * @return void
     * @throws Exception
     */
    public function handleArticleGenerate($longArticleId)
    {
        $longArticle = Archive::whereType('long_article')->whereId($longArticleId)->first();

        $options['prompt'] = filteringBadWords("This is the title: " . session('title') . ". These are the keywords: " . session('keywords') . ". This is the Heading list: " . session('outlines') . ". Expand each Heading section to generate article in " . session('language') . " language. Do not add other Headings or write more than the specific Headings in Heading list. Give the Heading output in bold font.");
        $options['message'] = [
            ['role' => 'user', 'content' => $options['prompt']]
        ];
        $generator = $this->generator;

        if ($this->production) {
            $subscription = null;
            $userId = null;
            if (!subscription('isAdminSubscribed')) {
                $userId = (new ContentService())->getCurrentMemberUserId('meta', null);
                $userStatus = (new ContentService())->checkUserStatus($userId, 'meta');
                if ($userStatus['status'] == 'fail') {
                    throw new Exception($userStatus['message']);
                }
                $validation = subscription('isValidSubscription', $userId, 'word');
                $subscription = subscription('getUserSubscription', $userId);
                if ($validation['status'] == 'fail' && !auth()->user()->hasCredit('word')) {
                    throw new Exception($validation['message']);
                }
            }

            return response()->stream(function () use ($generator, $longArticle, $options, $subscription, $userId) {   
                
                $text = ""; 
                $totalTokens = 0;
                $streamData =  $generator->prepareChatOptions($options)->generateChatContent(['method' => 'createChatCompletionStream']);

                $textValue = '';
                foreach ($streamData as $response) {
                    
                    $text = $generator->getChatStreamContent($response);
                    
                    $textValue .= $text;
                    $totalTokens++;
                    if (connection_aborted()) {
                        break;
                    }

                    echo "event: update\n";
                    echo 'data: ' . $text;
                    echo "\n\n";
                    ob_flush();
                    flush();
                    if (is_null($text)) {
                        break;
                    }
                }

                $totalWords = preference('word_count_method') == 'token' ? subscription('tokenToWord', $totalTokens) : countWords($textValue . ' ' . $options['prompt']);

                $longArticle->status = 'Completed';
                $longArticle->content = $textValue;
                $longArticle->article_value = $textValue;
                $longArticle->expense += $totalTokens;
                $longArticle->total_words += $totalWords;
                $longArticle->completed_step = 3;
                $longArticle->save();

                $article = Archive::where('id', session('article_id'))->first();
                $article->article_prompt = $options['prompt'];
                $article->article_value = $textValue;
                $article->save();


                $wordLeft = 0;
                if (!subscription('isAdminSubscribed') || auth()->user()->hasCredit('word')) {
                    $increment = subscription('usageIncrement', $subscription?->id, 'word', $totalWords, $userId);
                    if ($increment  && $userId != auth()->user()->id) {
                        (new CodeService())->storeTeamMeta($totalWords);
                    }
                    $wordLeft = subscription('isSubscribed', auth()->id()) ? subscription('fetureUsageLeft', $subscription?->id, 'feature_word') : 0;

                }

                echo "event: message\n";
                echo 'data: ' . $wordLeft;
                echo "\n\n";
                ob_flush();
                flush();

                echo "event: update\n";
                echo 'data: <END_STREAMING_SSE>';
                echo "\n\n";
                ob_flush();
                flush();

            }, 200, [
                'Cache-Control' => 'no-cache',
                'Content-Type' => 'text/event-stream',
            ]);
        } else {
            $streamData = ['**Introduction**', 'Artificial Intelligence (AI)', 'imtiaze', 'has emerged', 'as one', 'of the', 'most powerful', 'and game-changing', 'technologies of', 'our time. With', 'its ability', 'to analyze vast', 'amounts of data', 'and make informed', 'predictions, AI', 'is set to', 'revolutionize industries', 'across the globe.', 'In this article,', 'we will delve', 'into the world', 'of AI superpowers,', 'explore the future', 'of AI technology,', 'highlight the significance', 'of AI integration', 'services, discuss', 'the power', 'of intelligent automation,', 'and examine the', 'revolutionary concept of', 'machine learning on', 'demand.', '**AI Superpowers: Enhancing', 'the Future of', 'AI Technology** AI', 'superpowers are', 'the leading', 'players in', 'the AI', 'industry, wielding', 'immense influence', 'and driving innovation', 'in this rapidly', 'evolving field.', 'These superpowers,', 'including Google,', 'Amazon, Facebook,', 'and Microsoft, have', 'made substantial investments', 'in AI', 'research and development.', 'Their cutting-edge technologies', 'and breakthroughs have', 'opened up endless', 'possibilities for the', 'future of AI', 'technology. These AI', 'superpowers are working', 'tirelessly to improve', 'AI algorithms, enhance', 'machine learning capabilities,', 'and develop increasingly', 'advanced AI applications.', 'From self-driving cars', 'to smart virtual', 'assistants, AI is', 'poised to transform', 'various industries, revolutionizing', 'customer experience, optimizing', 'business processes, and', 'driving economic growth.', '**Unlocking the Potential of', 'AI Integration Services** AI', 'integration services play', 'a crucial role', 'in unlocking the', 'full potential of', 'AI technology. As', 'organizations increasingly recognize', 'the value of', 'AI, they are', 'seeking ways to', 'seamlessly incorporate it', 'into their existing', 'systems and processes.', 'AI integration services', 'provide the necessary', 'expertise to integrate', 'AI solutions into', 'businesses, making them', 'more efficient, productive,', 'and intelligent. By', 'integrating AI into', 'their operations, businesses', 'can improve decision-making,', 'automate repetitive tasks,', 'and gain valuable', 'insights from large', 'volumes of data.', 'AI integration services', 'enable organizations to', 'harness the power', 'of AI, regardless', 'of their size', 'or industry, empowering', 'them to stay', 'competitive in an', 'increasingly AI-driven world.', '**The Power of Intelligent', 'Automation** Intelligent automation', 'combines AI technologies', 'with traditional automation,', 'enabling organizations to', 'automate complex processes', 'that traditionally required', 'human intervention. By', 'utilizing AI algorithms,', 'machine learning, and', 'natural language processing,', 'intelligent automation systems', 'can analyze and', 'understand unstructured data,', 'make intelligent decisions,', 'and perform tasks', 'with remarkable accuracy', 'and speed. With', 'intelligent automation, businesses', 'can streamline operations,', 'reduce costs, and', 'enhance efficiency. Manual', 'and repetitive tasks', 'can be automated,', 'freeing up employees', 'to focus on', 'more strategic and', 'creative endeavors. Intelligent', 'automation also improves', 'the accuracy and', 'consistency of processes,', 'reducing the likelihood', 'of human errors.', '**Machine Learning on Demand:', 'Revolutionizing Industries** Machine', 'learning on demand', 'is an innovative', 'concept that holds', 'immense potential for', 'revolutionizing industries. It', 'allows businesses to', 'access machine learning', 'capabilities as a', 'service, without the', 'need for extensive', 'infrastructure or expertise.', 'By leveraging machine', 'learning on demand,', 'organizations can benefit', 'from advanced predictive', 'analytics, anomaly detection,', 'and pattern recognition', 'without the complexities', 'and costs associated', 'with building and', 'maintaining an in-house', 'machine learning infrastructure.', 'This concept opens', 'up new avenues', 'for businesses to', 'harness the power', 'of machine learning,', 'driving innovation and', 'gaining a competitive', 'edge. Machine learning', 'on demand enables', 'organizations to tap', 'into the vast', 'potential of their', 'data and extract', 'valuable insights, enabling', 'more informed decision-making', 'and unlocking new', 'growth opportunities.', '**Conclusion** The', 'power of AI', 'superpowers, the future', 'of AI technology,', 'the significance of', 'AI integration services,', 'the potential of', 'intelligent automation, and', 'the revolution brought', 'about by machine', 'learning on demand', 'cannot be overstated.', 'As AI continues', 'to evolve, it', 'is essential for', 'organizations to embrace', 'these advancements and', 'unlock the immense', 'potential they offer.', 'By effectively leveraging', 'AI superpowers, integrating', 'AI services, harnessing', 'intelligent automation, and', 'embracing machine learning', 'on demand, organizations', 'can thrive in', 'the ever-changing landscape', 'of the AI', 'revolution.'];

            return response()->stream(function () use ($streamData, $longArticle, $options) {   
         
                $totalTokens = 0;
                $textValue = '';
                foreach ($streamData as $text) {
                    $textValue .= $text;
                    if (connection_aborted()) {
                        break;
                    }
                    $totalTokens++;
    
                    echo "event: update\n";
                    echo 'data: ' . $text;
                    echo "\n\n";
                    ob_flush();
                    flush();
                    usleep(70000);
                }

                $totalWords = preference('word_count_method') == 'token' ? subscription('tokenToWord', $totalTokens) : countWords($textValue . ' ' . $options['prompt']);
                
                $longArticle->status = 'Completed';
                $longArticle->content = $textValue;
                $longArticle->expense += $totalTokens;
                $longArticle->total_words += $totalWords;
                $longArticle->completed_step = 3;
                $longArticle->save();

                $article = Archive::where('id', session('article_id'))->first();
                $article->article_prompt = $options['prompt'];
                $article->article_value = $textValue;
                $article->save();
    
                echo "event: message\n";
                echo 'data: ' . '500';
                echo "\n\n";
                ob_flush();
                flush();
    
                echo "event: update\n";
                echo 'data: <END_STREAMING_SSE>';
                echo "\n\n";
                ob_flush();
                flush();
    
            }, 200, [
                'Cache-Control' => 'no-cache',
                'Content-Type' => 'text/event-stream',
            ]);
        }

    }

    /**
     * method deleteArticle (Delete an article by its ID)
     *
     * @param int $longArticleId [The ID of the long article]
     *
     * @return array ['status' => string, 'message' => string]
     * @throws Exception If the article is not found.
     */
    public function deleteArticle(int $longArticleId): array
    {
        $longArticle = Archive::where(['id' => $longArticleId, 'type' => 'long_article'])->first();
        $longArticleTitles = Archive::with('metas')->where(['parent_id' => $longArticleId, 'type' => 'long_article_title'])->get();
        $longArticleOutlines = Archive::with('metas')->where(['parent_id' => $longArticleId, 'type' => 'long_article_outline'])->get();
        $longArticleArticles = Archive::with('metas')->where(['parent_id' => $longArticleId, 'type' => 'long_article_article'])->get();
        
        if ($longArticle) {
            DB::beginTransaction();

            try {
                foreach ($longArticleTitles as  $longArticleTitle) {
                    $titleMetaData =  $longArticleTitle->toArray();
                    $titleMetaKeys = array_keys($titleMetaData['meta_data']);
                    $longArticleTitle->unsetMeta($titleMetaKeys);
                    $longArticleTitle->save();
                    $longArticleTitle->delete();
                }
    
                foreach ($longArticleOutlines as  $longArticleOutline) {
                    $outlineMetaData =  $longArticleOutline->toArray();
                    $outlineMetaKeys = array_keys($outlineMetaData['meta_data']);
                    $longArticleOutline->unsetMeta($outlineMetaKeys);
                    $longArticleOutline->save();
                    $longArticleOutline->delete();
                }
    
                foreach ($longArticleArticles as  $longArticleArticle) {
                    $articleMetaData =  $longArticleArticle->toArray();
                    $articleMetaKeys = array_keys($articleMetaData['meta_data']);
                    $longArticleArticle->unsetMeta($articleMetaKeys);
                    $longArticleArticle->save();
                    $longArticleArticle->delete();
                }
               
                $metaData =  $longArticle->toArray();
                $metaKeys = array_keys($metaData['meta_data']);
                $longArticle->unsetMeta($metaKeys);
                $longArticle->save();
                $longArticle->delete();
                DB::commit();
                $response = ['status' => 'success', 'message' => __('The :x has been deleted successfully.', ['x' => __('article')])];
            } catch (Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
        } else {
            throw new Exception(__('Article not found.'));
        }
        
        return $response;
    }
}