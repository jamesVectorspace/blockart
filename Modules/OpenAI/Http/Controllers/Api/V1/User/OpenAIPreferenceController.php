<?php

namespace Modules\OpenAI\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Modules\OpenAI\Services\{
    ContentService,
    CodeService,
    ChatService,
    ImageService
};
use Modules\OpenAI\Transformers\Api\V1\{
    PreferenceResource,
    ChatResource
};
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Modules\OpenAI\Http\Resources\ConversationResource;
use Illuminate\Pagination\Paginator;

class OpenAIPreferenceController extends Controller
{
    /**
    * Content Preferences
    * @param ContentService $contentService
    * @return [type]
    */
    public function contentPreferences(ContentService $contentService)
    {
        $document = $contentService->getMeta('document');
        return $this->successResponse(new PreferenceResource($document));
    }

    /**
    * Image Maker Preferences
    * @param ContentService $contentService
    * @param ImageService $imageService
    * @return [type]
    */
    public function imagePreferences(ContentService $contentService, ImageService $imageService)
    {
        $imageMakerObject = $contentService->getMeta('image_maker');
      
        $providers = $imageService->filterImageProviders($imageMakerObject->imageCreateFrom);
        
        foreach($providers as $value) {
            $providerName = ucfirst(str_replace('_', '', $value));
            $provider[$providerName] = $providerName;
        }

        $response = [
            'image_createFrom' =>
                $provider
            ,
            'Openai' => [],
            'Stablediffusion' => [],
        ];
        // Iterate over the metaData relations
        foreach ($imageMakerObject->metaData as $meta) {
            $parts = explode("_", $meta->key);

            // Get the last element of the array
            $key = $meta->key;
            $value = json_decode($meta->value, true);
            $lastValue = end($parts);
        
            // Check if the key is one of the predefined keys
            if (in_array($key, ['openai_variant', 'openai_resulation', 'openai_artStyle', 'openai_lightingStyle'])) {
                $response['Openai'][$lastValue] = $value;
                $response['Openai']['model'] = array_keys(config('openAI.openAIImageModel'));
            } elseif (in_array($key, ['stable_diffusion_variant', 'stable_diffusion_resulation', 'stable_diffusion_artStyle', 'stable_diffusion_lightingStyle'])) {
                $response['Stablediffusion'][$lastValue] = $value;
                $response['Stablediffusion']['model'] = array_keys(config('openAI.stableDiffusion'));
            }
        }
        
        return $this->successResponse($response);
    }

    /**
    * Code Writer Preferences
    * @param CodeService $codeService
    * @return [type]
    */
    public function codePreferences(CodeService $codeService)
    {
        $codeWriter = $codeService->getMeta('code_writer');
        return $this->successResponse(new PreferenceResource($codeWriter));
    }

    /**
    * Chat Preferences
    * @return [type]
    */
    public function chatPreferences(ChatService $chatService)
    {
        $chatBot = $chatService->getBotName();
        return $this->successResponse(new ChatResource($chatBot));
    }

    /**
     * Providers with his model
     * @return [type]
     */
    public function aiProviders(ContentService $contentService)
    {
        return $this->successResponse($contentService->aiProviders());
    }

    /**
     * all AI data
     * @param ContentService $contentService
     * @param ImageService $imageService
     * 
     * @return [type]
     */
    public function conversationData(ChatService $chatService, ImageService $imageService)
    {
        $configs        = $this->initialize([], request()->all());
        $data = $chatService->conversationData($imageService);
        
        if (sizeof($data) < 0) {
            return $this->okResponse([], __('No data found'));
        }
        $perPage = $configs['rows_per_page']; 
        $page = request()->get('page', 1); 

        $collection = new Collection($data);

        // Paginate the collection manually as data comes as arary foramt. We will refactor it later.
        $paginatedData = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $responseData = ConversationResource::collection($paginatedData)->response()->getData(true);
        return $this->response($responseData);
    }
}
