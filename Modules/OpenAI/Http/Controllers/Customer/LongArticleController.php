<?php

namespace Modules\OpenAI\Http\Controllers\Customer;

use Modules\OpenAI\Resolvers\AiProviderResolver;
use Modules\OpenAI\Http\Requests\LongArticle\{
    LongArticleOutlineStoreRequest,
    LongArticleBlogStoreRequest,
    LongArticleTitleRequest
};
use Modules\OpenAI\Services\{
    LongArticleService,
    ContentService
};
use Modules\OpenAI\Entities\Archive;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str, Exception, URL;

class LongArticleController extends Controller
{
    /**
     * The Long Article Service instance.
     *
     * @var \App\Services\LongArticleService
     */
    private $longArticleService;

    /**
     * The AI Provider instance.
     *
     * @var mixed
     */
    private $aiProvider;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\LongArticleService $longArticleService
     */
    public function __construct()
    {
        $aiProviderResolver = new AiProviderResolver('long_article');
        $this->aiProvider = $aiProviderResolver->getResolver();
        $this->longArticleService = new LongArticleService( $this->aiProvider );
    }

    /**
     * Display the index view with the list of long articles.
     *
     * @return View
     */
    public function index(): View
    {
        return view('openai::blades.long_article.index', [
            'longArticles' => $this->longArticleService->getAllGeneratedArticle()
        ]);
    }

    /**
     * Display the create view for long articles.
     *
     * @param ContentService $contentService
     * @param Request $request
     *
     * @return View
     */
    public function create(ContentService $contentService, Request $request): View
    {
        $data['userSubscription'] = subscription('getUserSubscription');
        $data['featureLimit'] = subscription('getActiveFeature', optional($data['userSubscription'])->id ?? 1);
        $data['meta'] = $contentService->getMeta('long_article');
        $data['userId'] = $contentService->getCurrentMemberUserId(null, 'session');
        $data['longArticle'] = null;
        $data['longArticleTitle'] = null;
        $data['longArticleOutline'] = null;
        $data['generatedTitles'] = null;
        $data['generatedOutlines'] = null;
        

        if($request->uuid) {

            $data['longArticle'] = Archive::with('metas')
                ->whereType('long_article')
                ->where('unique_identifier', $request->uuid)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $data['longArticleTitle'] = Archive::with('metas')
                ->whereType('long_article_title')
                ->where('parent_id',  $data['longArticle']->id)
                ->where('user_id', auth()->id())
                ->latest()
                ->get();

            $data['generatedTitles'] = $data['longArticleTitle']
                ->pluck('title_values')
                ->flatten()->filter(function ($title) {
                    // Exclude null or empty title values if any
                    return !is_null($title) && $title !== '';
                })
                ->all();

            $data['longArticleOutline'] = Archive::with('metas')
                ->whereType('long_article_outline')
                ->where('parent_id',  $data['longArticle']->id)
                ->where('user_id', auth()->id())
                ->latest()
                ->get();

            $data['generatedOutlines'] = $data['longArticleOutline']
                ->pluck('outline_values')
                ->filter(function ($outline) {
                    // Exclude null or empty outline values if any
                    return !is_null($outline) && $outline !== '';
                })
                ->toArray();
        }

        return view('openai::blades.long_article.create', $data);
    }
    
    /**
     * Display the edit view for a long article.
     *
     * @param integer $id
     *
     * @return View
     */
    public function edit(int $longArticleId): View
    {
        $data['resetFlag'] = false;
        $data['longArticleId'] = $longArticleId;
        $lastTwoSegments = implode('/', array_slice(explode('/', URL::previous()), -2));
        if ($lastTwoSegments == 'articles/create') {
            session()->forget(['title','keywords','outlines','language']);
            $data['resetFlag'] = true;
        }
     
        $data['longArticle'] = Archive::where(['id' => $longArticleId, 'type' => 'long_article'])->firstOrFail();
   
        return view('openai::blades.long_article.edit', $data); 
    }

    /**
     * Update a long article's filtered content.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $response = ['status' => 'error', 'message' => __('The :x save failed.', ['x' => __('article')])];
            $longArticle = Archive::where(['id' => $request->id, 'type' => 'long_article'])->first();

            if ($longArticle) {
                $longArticle->filtered_content = $request->content;
                $longArticle->article_value = $request->content;
                $longArticle->save();
                $response = ['status' => 'success', 'message' => __('The article has been saved successfully.')];
            }
            return response()->json($response);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Generate titles for a long article.
     *
     * @param LongArticleTitleRequest $request
     *
     * @return array|JsonResponse
     */
    public function generateTitles(LongArticleTitleRequest $request): array|JsonResponse
    {
        try {
            
            $data = $this->longArticleService->handleTitleGenerate($request->validated() + ['long_article_id' => $request->long_article_id]);

            return [
                'status' => 'success',
                'success' => true, 
                'message' => __(':x new :y generated successfully.', ['x' => $data['num_of_title'], 'y' => Str::plural(__('title'), $data['num_of_title'])]), 
                'long_article_id' => $data['longArticleResponse']->id ?? '',
                'titles' => $data['generatedTitles'],
                'credit_balance' =>  $this->displayCreditBalance() ? view('openai::blades.long_article.credit_balance', ['wordLeft' => $data['wordLeft']])->render() : "",
                'output' => view('openai::blades.long_article.step_data.title', ['titles'=> $data['generatedTitles']])->render()
            ];
            
        } catch (Exception $e) {
            return $this->unprocessableResponse([
                'status' => 'failed',
                'response' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Generate outlines for a long article.
     *
     * @param LongArticleTitleRequest $request
     *
     * @return array|JsonResponse
     */
    public function generateOutlines(LongArticleOutlineStoreRequest $request): array|JsonResponse
    {
        try {   
            $data = $this->longArticleService->handleOutlineGenerate($request->validated() + ['long_article_id' => $request->long_article_id]);

            return [
                'status' => 'success',
                'success' => true,
                'message' => __(':x new :y generated successfully.', ['x' =>  count($data['rawAiResponse']->choices), 'y' => Str::plural(__('outline'), count($data['rawAiResponse']->choices))]), 
                'long_article_id' => $data['longArticleResponse']->id ?? '',
                'outlines' => $data['generatedOutlines'],
                'credit_balance' => $this->displayCreditBalance() ? view('openai::blades.long_article.credit_balance', ['wordLeft' => $data['wordLeft']])->render() : "",
                'output' => view('openai::blades.long_article.step_data.outline', ['outlinesData'=> $data['generatedOutlines']])->render(),
            ];
            
        } catch (Exception $e) {
            return $this->unprocessableResponse([
                'status' => 'failed',
                'response' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Initialize a long article for a blog.
     *
     * @param LongArticleBlogStoreRequest $request
     *
     * @return array
     */
    public function initArticle(LongArticleBlogStoreRequest $request): array
    {
        $longArticle = Archive::whereType('long_article')->whereId($request->long_article_id)->first();

        if (! $longArticle) {
            return [
                'status' => 404,
                'response' => __('Article not found. Please reset and try again.'),
            ];
        }
        
        $longArticle->title = $request->title;
        $longArticle->article_title = $request->title;
        $longArticle->save();

        $article = new Archive();
        $article->parent_id = $longArticle->id;
        $article->user_id = auth()->id();
        $article->unique_identifier = (string) Str::uuid();
        $article->article_tone = $request->tone;
        $article->article_language = $request->language;
        $article->article_title = $request->title;
        $article->article_keywords = $request->keywords;
        $article->article_outlines = $request->outlines;
        $article->article_initiated_by = auth()->id();
        $article->article_value = null;
        $article->type = 'long_article_article';
        $article->save();
        
        $request->session()->put('long_article_id', $request->long_article_id);
        $request->session()->put('long_article_blog_id', $request->long_article_id);
        $request->session()->put('outlines', $request->outlines);
        $request->session()->put('title', $request->title);
        $request->session()->put('keywords', $request->keywords);
        $request->session()->put('language', $request->language);
        $request->session()->put('article_id', $article->id);

        return [
            'status' => 200,
            'success' => true,
            'message' => '',
            'longArticleBlogId' => $longArticle->id, 
            'unique_identifier' => $longArticle->unique_identifier, 
            'blog' => view('openai::blades.long_article.step_data.article', ['articleData'=> $longArticle])->render()
        ];  
    }
    
    public function generateArticle()
    {
        try {
            return $this->longArticleService->handleArticleGenerate(request('long_article_id'));
        } catch (Exception $e) {
            return $this->unprocessableResponse([
                'status' => 'failed',
                'response' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display title data and return HTML for rendering.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function displayTitleData(Request $request): array
    {
        $data = is_array($request->generatedTitles) ? $request->generatedTitles : json_decode($request->generatedTitles, true) ?? [];

        return [
            'html' => view('openai::blades.long_article.step_data.title', ['titles' => $data])->render()
        ];
    }

    /**
     * Display outline data and return HTML for rendering.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function displayOutlineData(Request $request): array
    {
        $data = is_array($request->generatedOutlines) ? 
            $request->generatedOutlines : 
            (is_string($request->generatedOutlines) && !is_null($request->generatedOutlines) ? 
                json_decode($request->generatedOutlines) : 
                []);

        return [
            'html' => view('openai::blades.long_article.step_data.outline', ['outlinesData' => $data])->render()
        ];
    }

    /**
     * Display article blog data and return HTML for rendering.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function displayArticleBlogData(Request $request): array
    {
        $data = $request->generatedArticleBlogId ?? null;
        $article = Archive::whereType('long_article')->where('id', $data)->first();
        return [
            'html'  => view('openai::blades.long_article.step_data.article', ['articleData' => $article])->render(),
            'id'    => $article->id ?? null,
            'contents' => $article->content ?? null,
        ];
    }

    /**
     * Delete a long article based on the provided request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $response = $this->longArticleService->deleteArticle($request->longArticleId);
        } catch (Exception $e) {
            $response = ['status' => 'error', 'message' => $e->getMessage()];
        }
        return response()->json($response);
    }

    /**
     * Display credit balance for the current user.
     *
     * @return bool Returns true if the credit balance is to be displayed; otherwise, false.
     */
    public function displayCreditBalance(): bool
    {
        $userId = (new ContentService())->getCurrentMemberUserId(null, 'session');
        $userSubscription = subscription('getUserSubscription',$userId);
        $featureLimit = subscription('getActiveFeature', $userSubscription?->id ?? 1);

        $wordLeft = 0;
        if ($userSubscription && in_array($userSubscription->status, ['Active', 'Cancel'])) {
            $wordLeft = $featureLimit['word']['remain'];
            $wordLimit = $featureLimit['word']['limit'];
        }

        return ($wordLeft && auth()->user()->id == $userId) ?? false;
    }
}
