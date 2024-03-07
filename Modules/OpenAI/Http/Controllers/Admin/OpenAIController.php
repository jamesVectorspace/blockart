<?php
/**
 * @package AIController
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 06-03-2023
 */
namespace Modules\OpenAI\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\OpenAI\Services\{
    ContentService,
    ImageService,
};

use Modules\OpenAI\Entities\{
    ChatBot,
    Content,
    ContentTypeMeta
};
use App\Models\{
    Preference,
};
use Modules\OpenAI\Http\Requests\{
    ContentUpdateRequest,
    AiPreferenceRequest
};
use Modules\OpenAI\DataTables\{
    ContentDataTable,
    ImageDataTable
};
use Illuminate\Support\Facades\Session;

class OpenAIController extends Controller
{
    /**
     * Content Service
     *
     * @var object
     */
    protected $contentService;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @param  ContentDataTable  $dataTable
     * @return mixed
     */
    public function index(ContentDataTable $dataTable)
    {
        $data['contents'] = Content::with(['useCase:id,slug,name'])->get();
        $data['languages'] = $this->contentService->languages();
        $data['omitLanguages'] = moduleConfig('openai.language');
        $data['users'] = $this->contentService->users();
        $data['aiModel'] = config('openAI.openAIModel');
        return $dataTable->render('openai::admin.content.index', $data);
    }

    /**
     * Images
     *
     * @param ImageDataTable $dataTable
     * @return mixed
     */
    public function images(ImageDataTable $dataTable)
    {
        $data['users'] = $this->contentService->users();
        $data['sizes'] = config('openAI.size');
        return $dataTable->render('openai::admin.image.index', $data);
    }

    /**
     * Content Edit
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($slug)
    {
        $data = ['status' => 'fail', 'message' => __('The :x does not exist.', ['x' => __('Content')])];
        $data['content'] = $this->contentService->contentBySlug($slug);
        if (empty($data['content'])) {
            Session::flash($data['status'], $data['message']);
            return redirect()->back();
        }
        $data['readonly'] = is_null($data['content']->parent_id) ? '' : 'readonly';
        $data['disabled'] = is_null($data['content']->parent_id) ? '' : 'disabled';
        $data['categories'] = $this->contentService->useCases();
        $data['contentVersion'] = $this->contentService->model()->where('parent_id', $data['content']->id)->get();
        return view('openai::admin.content.edit', $data);
    }

    /**
     * Update
     *
     * @param ContentUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContentUpdateRequest $request)
    {
        $data = ['status' => 'fail', 'message' => __('The :x has not been saved. Please try again.', ['x' => __('Content')])];

        if ($this->contentService->contentUpdate($request->all())) {
            $data = ['status' => 'success', 'message' => __('Content update successfully!')];
        }

        Session::flash($data['status'], $data['message']);
        return redirect()->route('admin.features.contents');
    }

    /**
     * Content edit
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function editContent($slug)
    {
        $service = $this->contentService;
        $data['useCases'] = $service->useCases();
        $data['useCase'] = $service->contentBySlug($slug);
        $data['options'] = $service->getOption($data['useCase']->use_case_id);
        $data['slug'] = $slug;
        $data['accessToken'] = !empty(auth()->user()) ? auth()->user()->createToken('accessToken')->accessToken : '';
        
        return view('openai::blades.documents-edit', $data);
    }


    /**
     * Delete content
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $message = $this->contentService->delete($request->contentId);
        $message = json_decode(json_encode($message), true);
        Session::flash($message['original']['status'], $message['original']['message']);

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function contentPreferences(ImageService $imageService)
    {
        $data['preferences'] = $this->contentService->features();
        $data['languages'] = $this->contentService->languages();
        $data['meta'] = $this->contentService->getAllMeta();
        $data['omitLanguages'] = moduleConfig('openai.language');
        $data['omitSpeechLanguages'] = moduleConfig('openai.speech_language');
        $data['omitTextToSpeechLanguages'] = moduleConfig('openai.text_to_speech_language');
        $data['openai'] = preference();
        $data['aiModels'] = config('openAI.openAIModel');
        $data['aiModelDescription'] = config('openAI.modelDescription');
        
        $data['longArticleMetas'] = ContentTypeMeta::whereName('long_article')->get()->pluck('value', 'key')->toArray();
        $data['longArticleAiPreferences'] = Preference::getAll()->where('category', 'long_article')->pluck('value', 'field')->toArray();

        return view('openai::admin.preference.index', $data);
    }

    /**
     * Create Content preference
     *
     * @param Request $request
     * @param
     */
    public function createContentPreferences(AiPreferenceRequest $request, ChatBot $chatBot)
    {
        $data = $this->contentService->storeMeta($request->meta);

        $post = $request->only('openai', 'stablediffusion', 'google_api', 'clipdrop_api', 'short_desc_length', 'long_desc_length', 'long_desc_length', 'ai_model', 'max_token_length', 'bad_words', 'stable_diffusion_engine', 'openai_engine', 'conversation_limit', 'word_count_method');

        $post['bad_words'] = $request->bad_words ?? '';
        $i = 0;
        $response=[];

        foreach ($post as $key => $value) {
            if( $key === 'bad_words' || !empty($value)) {
                $response[$i]['category'] = 'openai';
                $response[$i]['field']    = $key;
                $response[$i]['value']    = $value;
                $i++;
            }
        }

        $preference = $request->preference;
        $j = 0;
        $preferences = [];
        foreach ($preference as $category => $categoryValue) {
                foreach ($categoryValue as $key => $value) {
                    $preferences[$j]['category'] = $category;
                    $preferences[$j]['field']    = $category . '_' . $key;
                    $preferences[$j]['value']    =  is_array($value) ? json_encode($value) : $value;
                    $j++;
                }
        }

        $permission = $request->only('hide_template', 'hide_image', 'hide_code', 'hide_speech_to_text', 'hide_text_to_speech', 'hide_long_article');
        foreach ($permission as $key => $value) {
            $permissions[$key] = $value;
        }
        $response[$i] = ['category' => 'openai', 'field' => 'user_permission', 'value' => json_encode($permissions)];
        $response = array_merge($preferences, $response);
        foreach ($response as $key => $value) {
            if (Preference::storeOrUpdate($value)) {
                $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('AI Preference Settings')])];
            }
        }

        Session::flash($data['status'], $data['message']);
        return back();
    }


}


