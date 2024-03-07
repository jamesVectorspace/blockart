<?php

use Illuminate\Support\Facades\Route;
use Modules\OpenAI\Entities\Chat;
use Modules\OpenAI\Http\Controllers\Admin\{
    UseCasesController,
    UseCaseCategoriesController,
    OpenAIController,
    ImageController,
    CodeController,
    TextToSpeechController as AdminTextToSpeechController,
    ChatCategoriesController,
    ChatAssistantsController,
    SpeechToTextController,
    LongArticleController as AdminLongArticleController,
};
use Modules\OpenAI\Http\Controllers\Customer\{
    OpenAIController as UserAIController,
    SpeechToTextController as UserSpeechToTextController,
    ImageController as UserImageController,
    UseCasesController as CustomerUseCasesController,
    DocumentsController as CustomerDocumentsController,
    CodeController as CustomerCodeController,
    ChatController,
    TextToSpeechController,
    FolderController,
    LongArticleController,
};

use Modules\OpenAI\Http\Controllers\Api\V1\Admin\{
    UseCasesController as adminUsecaseApi,
    UseCaseCategoriesController as adminUseCaseCategoryApi,
    OpenAIController as adminApi,
    ImageController as adminImageApi,
    CodeController as adminCodeApi,
};
use Modules\OpenAI\Http\Controllers\Api\V1\User\{
    OpenAIController as OpenAIControllerAPI,
    ImageController as ImageControllerAPI,
    UseCasesController as UseCasesControllerAPI,
    UseCaseCategoriesController as UseCaseCategoriesControllerAPI,
    CodeController as CodeControllerAPI,
    OpenAIPreferenceController as OpenAIPreferenceControllerAPI,
    ChatController as ChatControllerAPI,
    UserController as UserControllerAPI,
    SpeechToTextController as SpeechToTextControllerAPI,
    TextToSpeechController as TextToSpeechControllerAPI
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function() {
    Route::get('image-share/{slug}', [UserImageController::class, 'imageShare'])->name('imageShare');
});
 
//template
Route::middleware(['web', 'middleware' => 'userPermission:hide_template'])->group(function () {
    Route::get('/user/templates/', [UserAIController::class, 'templates'])->name('openai')->middleware(['auth', 'locale','teamAccess:template']);
});
Route::prefix('user')->middleware(['auth', 'locale', 'web'])->name('user.')->group(function () {
    //template
    Route::middleware(['middleware' => 'userPermission:hide_template'])->group(function () {
        Route::get('documents', [UserAIController::class, 'documents'])->name('documents');
        Route::get('favourite-documents', [UserAIController::class, 'favouriteDocuments'])->name('favouriteDocuments');
        Route::get('templates/{slug}', [UserAIController::class, 'template'])->name('template')->middleware('teamAccess:template');
        Route::get('formfiled-usecase/{slug}', [UserAIController::class, 'getFormFiledByUsecase'])->name('formField');
        Route::get('get-content', [UserAIController::class, 'getContent']);
        Route::get('deleteContent', [UserAIController::class, 'deleteContent'])->name('deleteContent');
        Route::get('content/edit/{slug}', [UserAIController::class, 'editContent'])->name('editContent');
        Route::post('update-content', [UserAIController::class, 'updateContent'])->name('updateContent');
    });
    
    // Text To Speech
    Route::middleware(['middleware' => 'userPermission:hide_text_to_speech'])->group(function () {
        Route::get('text-to-speech', [TextToSpeechController::class, 'textToSpeechTemplate'])->name('textToSpeechTemplate')->middleware('teamAccess:voiceover');
        Route::get('text-to-speech-list', [TextToSpeechController::class, 'textToSpeechList'])->name('textToSpeechList');
        Route::get('text-to-speech/view/{id}', [TextToSpeechController::class, 'show'])->name('textToSpeechView');
        Route::post('text-to-speech/delete', [TextToSpeechController::class, 'delete'])->name('textToSpeechDelete');
        Route::post('text-to-speech/destroy', [TextToSpeechController::class, 'destroy'])->name('textToSpeechDestroy');

    });

    // Image
    Route::middleware(['middleware' => 'userPermission:hide_image'])->group(function () {
        Route::get('image', [UserAIController::class, 'imageTemplate'])->name('imageTemplate')->middleware('teamAccess:image');
        Route::post('delete-image', [UserImageController::class, 'deleteImage'])->name('deleteImage');
        Route::post('save-image', [UserImageController::class, 'saveImage'])->name('saveImage');
        Route::get('image-list', [UserImageController::class, 'list'])->name('imageList');
        Route::get('image/view/{slug}', [UserImageController::class, 'view'])->name('image.view');
        Route::get('image-gallery', [UserImageController::class, 'imageGallery'])->name('imageGallery');
        Route::get('image-view/{slug}', [UserImageController::class, 'imageView'])->name('imageView');
        Route::get('formfiled-image', [UserImageController::class, 'getFormFiledByImage'])->name('imageFormField');
    });
    // Folder
    Route::get('/folder', [UserAIController::class, 'index'])->name('folderLists');
    
    // Code
    Route::middleware(['middleware' => 'userPermission:hide_code'])->group(function () {
        Route::get('code', [UserAIController::class, 'codeTemplate'])->name('codeTemplate')->middleware('teamAccess:code');
        Route::get('code-list', [CustomerCodeController::class, 'index'])->name('codeList');
        Route::get('code/view/{slug}', [CustomerCodeController::class, 'view'])->name('codeView');
        Route::post('code/delete/', [CustomerCodeController::class, 'delete'])->name('deleteCode');
    });
    
    // Speech To Text
    Route::middleware(['middleware' => 'userPermission:hide_speech_to_text'])->group(function () {
        Route::get('speech-to-text', [UserSpeechToTextController::class, 'speechTemplate'])->name('speechTemplate')->middleware('teamAccess:speech_to_text');
        Route::get('speech-list', [UserSpeechToTextController::class, 'speechLists'])->name('speechLists');
        Route::get('speech/edit/{id}', [UserSpeechToTextController::class, 'editSpeech'])->name('editSpeech');
        Route::post('update-speech', [UserSpeechToTextController::class, 'updateSpeech'])->name('updateSpeech');
        Route::post('delete-speech', [UserSpeechToTextController::class, 'deleteSpeech'])->name('deleteSpeech');
    });

    // Chat
    Route::get('chat-history/{id}', [ChatController::class, 'history'])->name('chat');
    Route::post('delete-chat', [ChatController::class, 'delete'])->name('deleteChat');
    Route::post('update-chat', [ChatController::class, 'update'])->name('updateChat');

    Route::get('chat/bot', [ChatController::class, 'chatBot']);
    Route::get('chat-conversation', [ChatController::class, 'conversation']);

    // Folder
    Route::get('/folder', [FolderController::class, 'index'])->name('folderLists');
    Route::post('/folder-create', [FolderController::class, 'create'])->name('folderCreate');
    Route::post('/folder-update', [FolderController::class, 'update'])->name('folderUpdate');
    Route::get('/folder/{slug}', [FolderController::class, 'view'])->name('folderView');
    Route::get('/folder/download/{id}', [FolderController::class, 'download']);
    Route::post('/folder/download/content', [FolderController::class, 'downloadContent']);
    
    Route::get('/fetch-folder', [FolderController::class, 'fetchFolder'])->name('fetchFolder');
    Route::get('/fetch/all-folder', [FolderController::class, 'fetchAllFolder']);
    Route::post('/folder/move', [FolderController::class, 'moveData']);
    Route::post('/folder/delete', [FolderController::class, 'delete']);
    Route::post('/folder/toggle/bookmark', [FolderController::class, 'toggleBookmarkFiles']);
    
    Route::post('download/file', [UserAIController::class, 'downloadFile']);

    // Long Article
    Route::group(['prefix' => 'articles','as' => 'long_article.', 'controller' => LongArticleController::class, 'middleware' => 'userPermission:hide_long_article'], function() {
        // Crud routes
        Route::get('/', 'index')->name('index')->middleware('teamAccess:long_article');
        Route::get('create', 'create')->name('create')->middleware('teamAccess:long_article');
        // Route::get('{uuid}', 'view')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::patch('{id}', 'update')->name('update');
        Route::delete('{id}', 'destroy')->name('destroy');

        // Generator routes
        Route::post('generate-titles', 'generateTitles')->name('generate_titles')->middleware('teamAccess:long_article,api');
        Route::post('generate-outlines', 'generateOutlines')->name('generate_outlines')->middleware('teamAccess:long_article,api');
        Route::post('init-article', 'initArticle')->name('init_article')->middleware('teamAccess:long_article,api');
        Route::get('generate-article', 'generateArticle')->name('generate_article');

        // Display onload routes
        Route::post('display-title-data', 'displayTitleData')->name('display_title_data');
        Route::post('display-outline-data', 'displayOutlineData')->name('display_outline_data');
        Route::post('display-article-data', 'displayArticleBlogData')->name('display_article_data');
    });
});

Route::middleware(['auth', 'locale', 'web'])->prefix('admin')->group(function () {
    Route::name('admin.use_case.')->group(function() {
        // use case
        Route::get('/use-cases', [UseCasesController::class, 'index'])->name('list');
        Route::match(['get', 'post'], '/use-case/create', [UseCasesController::class, 'create'])->name('create');
        Route::match(['get', 'post'], '/use-case/{id}/edit', [UseCasesController::class, 'edit'])->name('edit');
        Route::post('/use-case/{id}/delete', [UseCasesController::class, 'destroy'])->middleware(['checkForDemoMode'])->name('destroy');

        // use case category
        Route::get('/use-case/categories', [UseCaseCategoriesController::class, 'index'])->name('category.list');
        Route::match(['get', 'post'], '/use-case/category/create', [UseCaseCategoriesController::class, 'create'])->name('category.create');
        Route::match(['get', 'post'], '/use-case/category/{id}/edit', [UseCaseCategoriesController::class, 'edit'])->name('category.edit');
        Route::post('/use-case/category/{id}/delete', [UseCaseCategoriesController::class, 'destroy'])->middleware(['checkForDemoMode'])->name('category.destroy');
        Route::get('/use-case/category/search', [UseCaseCategoriesController::class, 'searchCategory'])->name('category.search');
    });

    Route::name('admin.chat.')->group(function() {
        
        // Chat category
        Route::get('/chat/categories', [ChatCategoriesController::class, 'index'])->name('category.list');
        Route::match(['get', 'post'], '/chat/category/create', [ChatCategoriesController::class, 'create'])->name('category.create');
        Route::match(['get', 'post'], '/chat/category/{id}/edit', [ChatCategoriesController::class, 'edit'])->name('category.edit');
        Route::post('/chat/category/{id}/delete', [ChatCategoriesController::class, 'destroy'])->middleware(['checkForDemoMode'])->name('category.destroy');

        // Chat Assistants
        Route::get('/chat/assistants', [ChatAssistantsController::class, 'index'])->name('assistant.list');
        Route::match(['get', 'post'], '/chat/assistant/create', [ChatAssistantsController::class, 'create'])->name('assistant.create');
        Route::match(['get', 'post'], '/chat/assistant/{id}/edit', [ChatAssistantsController::class, 'edit'])->name('assistant.edit');
        Route::get('/chat/assistant/delete', [ChatAssistantsController::class, 'destroy'])->middleware(['checkForDemoMode'])->name('assistant.destroy');
    });

    Route::name('admin.features.')->group(function() {
        // Content
        Route::get('content/list', [OpenAIController::class, 'index'])->name('contents');
        Route::get('content/edit/{slug}', [OpenAIController::class, 'edit'])->name('content.edit');
        Route::post('content/update/{id}', [OpenAIController::class, 'update'])->middleware(['checkForDemoMode'])->name('content.update');
        Route::get('content/delete', [OpenAIController::class, 'delete'])->middleware(['checkForDemoMode'])->name('content.delete');

        // Image
        Route::post('delete-images', [ImageController::class, 'deleteImages'])->middleware(['checkForDemoMode'])->name('deleteImage');
        Route::post('save-image', [ImageController::class, 'saveImage'])->name('saveImage');
        Route::get('image/list', [ImageController::class, 'list'])->name('imageList');
        Route::get('image/view/{slug}', [ImageController::class, 'view'])->name('image.view');

        // Code
        Route::get('code/list', [CodeController::class, 'index'])->name('code.list');
        Route::get('code/view/{slug}', [CodeController::class, 'view'])->name('code.view');
        Route::post('code/delete', [CodeController::class, 'delete'])->middleware(['checkForDemoMode'])->name('code.delete');

        // Content Preferences
        Route::get('features/preferences', [OpenAIController::class, 'contentPreferences'])->name('preferences');
        Route::post('features/preferences/create', [OpenAIController::class, 'createContentPreferences'])->middleware(['checkForDemoMode'])->name('preferences.create');

        // Text To Speech
        Route::get('text-to-speech/list', [AdminTextToSpeechController::class, 'index'])->name('textToSpeech.lists');
        Route::get('text-to-speech/view/{slug}', [AdminTextToSpeechController::class, 'show'])->name('textToSpeech.view');
        Route::post('text-to-speech/delete', [AdminTextToSpeechController::class, 'delete'])->middleware(['checkForDemoMode'])->name('textToSpeech.delete');

        // All Voices
        Route::get('text-to-speech/voice/list', [AdminTextToSpeechController::class, 'allVoices'])->name('textToSpeech.voice.lists');
        Route::match(['get', 'post'], 'text-to-speech/voice/create', [AdminTextToSpeechController::class, 'voiceCreate'])->name('textToSpeech.voice.create');
        Route::match(['get', 'post'],'text-to-speech/voice/edit/{id}', [AdminTextToSpeechController::class, 'voiceEdit'])->name('textToSpeech.voice.edit');
        
        // Speech
        Route::get('speech/list', [SpeechToTextController::class, 'index'])->name('speeches');
        Route::get('speech/edit/{id}', [SpeechToTextController::class, 'edit'])->name('speech.edit');
        Route::post('speech/update/{id}', [SpeechToTextController::class, 'update'])->middleware(['checkForDemoMode'])->name('speech.update');
        Route::post('speech/delete', [SpeechToTextController::class, 'delete'])->middleware(['checkForDemoMode'])->name('speech.delete');
    });

    // Long Article
    Route::group(['prefix' => 'articles','as' => 'admin.long_article.', 'controller' => AdminLongArticleController::class], function() {
        Route::get('csv', 'csv')->name('export_csv');
        Route::get('pdf', 'pdf')->name('print_pdf');
        Route::get('/', 'index')->name('index');
        Route::get('{id}', 'edit')->name('edit');
        Route::post('{id}', 'update')->name('update');
        Route::delete('{id}', 'destory')->name('destroy');
    });
});

Route::middleware(['auth', 'locale', 'web'])->prefix('user/openai')->name('user.')->group(function () {
    Route::get('/use-case/search', [CustomerUseCasesController::class, 'searchTabData'])->name('use_case.search');
    Route::post('/use-case/toggle/favorite', [CustomerUseCasesController::class, 'toggleFavorite'])->name('use_case.toggle.favorite');
    Route::get('/documents/fetch', [CustomerDocumentsController::class, 'fetchAndFilter'])->name('document.fetch');
    Route::post('/documents/toggle/bookmark', [CustomerDocumentsController::class, 'toggleBookmark'])->name('document.toggle.bookmark');

    Route::post('/image/toggle/favorite', [UserImageController::class, 'toggleFavoriteImage'])->name('image.toggle.favorite');
});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function() {
    Route::group(['prefix' => '/V1/user/openai', 'middleware' => ['auth:api', 'locale', 'permission-api']], function() {
        Route::post('chat', [OpenAIControllerAPI::class, 'chat']);
        Route::get('chat/conversation', [OpenAIControllerAPI::class, 'chatConversation']);
        Route::get('chat/history/{id}', [OpenAIControllerAPI::class, 'history']);
    
        Route::post('chat/delete', [ChatControllerAPI::class, 'delete']);
        Route::post('chat/update', [ChatControllerAPI::class, 'update']);
    
        Route::get('chat/assistant/list', [ChatControllerAPI::class, 'allChatAssistants']);
    });
    
    Route::group(['prefix' => '/V1/user/openai', 'middleware' => ['auth:api', 'locale', 'permission-api']], function() {
        // Content
        Route::get('content/list', [OpenAIControllerAPI::class, 'index']);
        Route::get('content/view/{slug}', [OpenAIControllerAPI::class, 'view']);
        Route::post('content/edit/{slug}', [OpenAIControllerAPI::class, 'update']);
        Route::delete('content/delete/{id}', [OpenAIControllerAPI::class, 'delete']);
        Route::post('content/toggle/bookmark', [OpenAIControllerAPI::class, 'contentTogglebookmark']);
    
        // Image
        Route::get('image/list', [ImageControllerAPI::class, 'index']);
        Route::get('image/conversation/list', [ImageControllerAPI::class, 'converstaionList']);
        Route::delete('image/delete', [ImageControllerAPI::class, 'delete']);
        Route::get('image/list/{id}', [ImageControllerAPI::class, 'view']);
        Route::get('image/conversations/{id}', [ImageControllerAPI::class, 'converstaionView']);
        Route::delete('conversations', [ImageControllerAPI::class, 'conversationDelete']);
    
    
        // Create content, image, code, Speech to Text and Text to Speech
        Route::post('ask', [OpenAIControllerAPI::class, 'ask'])->middleware(['userPermission:hide_template', 'teamAccess:template,api']);
        Route::post('image', [OpenAIControllerAPI::class, 'image'])->middleware(['userPermission:hide_image', 'teamAccess:image,api']);
        Route::post('code', [OpenAIControllerAPI::class, 'code'])->middleware(['userPermission:hide_code', 'teamAccess:code,api']);
        Route::post('speech', [OpenAIControllerAPI::class, 'speechToText'])->middleware(['userPermission:hide_speech_to_text', 'teamAccess:speech_to_text,api']);
        Route::post('text-to-speech', [TextToSpeechControllerAPI::class, 'textToSpeech'])->middleware(['userPermission:hide_text_to_speech', 'teamAccess:voiceover,api']);
    
        // use case
        Route::get('/use-cases', [UseCasesControllerAPI::class, 'index']);
        Route::post('/use-case/create', [UseCasesControllerAPI::class, 'create']);
        Route::get('/use-case/{id}/show', [UseCasesControllerAPI::class, 'show']);
        Route::put('/use-case/{id}/edit', [UseCasesControllerAPI::class, 'edit']);
        Route::delete('/use-case/{id}/delete', [UseCasesControllerAPI::class, 'destroy']);
        Route::post('/use-case/toggle/favorite', [UseCasesControllerAPI::class, 'useCaseToggleFavorite']);
    
         // use case category
        Route::get('/use-case/categories', [UseCaseCategoriesControllerAPI::class, 'index']);
        Route::post('/use-case/category/create', [UseCaseCategoriesControllerAPI::class, 'create']);
        Route::get('/use-case/category/{id}/show', [UseCaseCategoriesControllerAPI::class, 'show']);
        Route::put('/use-case/category/{id}/edit', [UseCaseCategoriesControllerAPI::class, 'edit']);
        Route::delete('/use-case/category/{id}/delete', [UseCaseCategoriesControllerAPI::class, 'destroy']);
    
        // Code
        Route::get('code/list', [CodeControllerAPI::class, 'index']);
        Route::get('code/view/{slug}', [CodeControllerAPI::class, 'view']);
        Route::delete('code/delete/{id}', [CodeControllerAPI::class, 'delete']);
    
        // Speech
        Route::get('speech/list', [SpeechToTextControllerAPI::class, 'index']);
        Route::get('speech/view/{id}', [SpeechToTextControllerAPI::class, 'show']);
        Route::post('speech/edit/{id}', [SpeechToTextControllerAPI::class, 'edit']);
        Route::delete('speech/delete/{id}', [SpeechToTextControllerAPI::class, 'destroy']);
    
        //Content Preferences
        Route::get('preferences/content', [OpenAIPreferenceControllerAPI::class, 'contentPreferences']);
        Route::get('preferences/image', [OpenAIPreferenceControllerAPI::class, 'imagePreferences']);
        Route::get('preferences/code', [OpenAIPreferenceControllerAPI::class, 'codePreferences']);
        Route::get('preferences/chat', [OpenAIPreferenceControllerAPI::class, 'chatPreferences']);
        Route::get('preferences/providers', [OpenAIPreferenceControllerAPI::class, 'aiProviders']);
        Route::get('conversations', [OpenAIPreferenceControllerAPI::class, 'conversationData']);
    
    
        // Text To Speech
        Route::get('text-to-speech/list', [TextToSpeechControllerAPI::class, 'index']);
        Route::get('text-to-speech/view/{id}', [TextToSpeechControllerAPI::class, 'show']);
        Route::delete('text-to-speech/delete/{id}', [TextToSpeechControllerAPI::class, 'destroy']);
    
        //Update Profile
        Route::post('/profile', [UserControllerAPI::class, 'update']);
        Route::post('/profile/delete', [UserControllerAPI::class, 'destroy']);
    
        //Subscription Package Info
        Route::get('/package-info', [UserControllerAPI::class, 'index']);
    
    });
    
    Route::group(['prefix' => '/V1/admin/openai', 'middleware' => ['auth:api', 'locale', 'permission']], function() {
        // Content
        Route::get('content/list', [adminApi::class, 'index']);
        Route::get('content/view/{slug}', [adminApi::class, 'view']);
        Route::post('content/edit/{slug}', [adminApi::class, 'update']);
        Route::delete('content/delete/{id}', [adminApi::class, 'delete']);
    
        // Image
        Route::get('image/list', [adminImageApi::class, 'index']);
        Route::delete('image/delete', [adminImageApi::class, 'delete']);
        Route::get('image/view/{id}', [adminImageApi::class, 'view']);
    
        // Create content and image
        Route::post('ask', [adminApi::class, 'ask']);
        Route::post('image', [adminApi::class, 'image']);
        Route::post('code', [adminApi::class, 'code']);
    
        // use case
        Route::get('/use-cases', [adminUsecaseApi::class, 'index']);
        Route::post('/use-case/create', [adminUsecaseApi::class, 'create']);
        Route::get('/use-case/{id}/show', [adminUsecaseApi::class, 'show']);
        Route::put('/use-case/{id}/edit', [adminUsecaseApi::class, 'edit']);
        Route::delete('/use-case/{id}/delete', [adminUsecaseApi::class, 'destroy']);
    
        // use case category
        Route::get('/use-case/categories', [adminUseCaseCategoryApi::class, 'index']);
        Route::post('/use-case/category/create', [adminUseCaseCategoryApi::class, 'create']);
        Route::get('/use-case/category/{id}/show', [adminUseCaseCategoryApi::class, 'show']);
        Route::put('/use-case/category/{id}/edit', [adminUseCaseCategoryApi::class, 'edit']);
        Route::delete('/use-case/category/{id}/delete', [adminUseCaseCategoryApi::class, 'destroy']);
    
        // Code
        Route::get('code/list', [adminCodeApi::class, 'index']);
        Route::get('code/view/{slug}', [adminCodeApi::class, 'view']);
        Route::delete('code/delete/{id}', [adminCodeApi::class, 'delete']);
    
    });
});
