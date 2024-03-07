@extends('admin.layouts.app')
@section('page_title', __('Edit :x', ['x' => __('AI Preferences')]))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="preference-container">
        <div class="card">
            <div class="card-body row" id="preference-container">
                <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3" aria-labelledby="navbarDropdown">
                    <div class="card card-info shadow-none" id="nav">
                        <div class="card-header pt-4 border-bottom text-nowrap">
                            <h5 id="general-settings">{{ __('Content Types') }}</h5>
                        </div>
                        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li><a class="nav-link text-left tab-name active" id="v-pills-setup-tab" data-bs-toggle="pill"
                                href="#v-pills-setup" role="tab" aria-controls="v-pills-setup"
                                aria-selected="true" data-id="{{ __('AI Setup') }}">{{ __('AI Setup') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-document-tab" data-bs-toggle="pill"
                                    href="#v-pills-document" role="tab" aria-controls="v-pills-document"
                                    aria-selected="true" data-id="{{ __('Document') }}">{{ __('Document') }}</a></li>

                            <!-- Long Article -->
                            <li>
                                <a class="nav-link text-left tab-name" id="v-pills-long-article-tab" data-bs-toggle="pill"
                                    href="#v-pills-long-article" role="tab" aria-controls="v-pills-long-article"
                                    aria-selected="true" data-id="{{ __('long-article') }}">{{ __('Long Article') }}</a>
                            </li>
                            
                            <!-- Image Providers -->
                            <li>
                                <a class="accordion-heading position-relative text-start" data-bs-toggle="collapse"
                                    data-bs-target="#image-main-v-pills-tab"> {{ __('Image Providers') }}
                                    <span class="pull-right"><b class="caret"></b></span>
                                    <span><i class="fa fa-angle-down position-absolute arrow-icon end-0 me-2 top-0 fs-6"></i></span>
                                </a>
                                <ul class="nav nav-list flex-column flex-nowrap collapse ml-2 vertical-class side-nav"
                                    id="image-main-v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <li>
                                        <a class="nav-link text-left tab-name" id="v-pills-openai-image-tab" data-bs-toggle="pill"
                                        href="#v-pills-openai-image" role="tab" aria-controls="v-pills-openai-image"
                                        aria-selected="true" data-id="{{ __('Image Providers') }} >> {{ __('OpenAI') }}">{{ __('OpenAI') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-left tab-name" id="v-pills-stable-diffusion-image-tab" data-bs-toggle="pill" 
                                        href="#v-pills-stable-diffusion-image" role="tab" aria-controls="v-pills-stable-diffusion-image"
                                        aria-selected="true" data-id="{{ __('Image Providers') }} >> {{ __('Stable Diffusion') }}">{{ __('Stable Diffusion') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-left tab-name" id="v-pills-clipdrop-image-tab" data-bs-toggle="pill" 
                                        href="#v-pills-clipdrop-image" role="tab" aria-controls="v-pills-clipdrop-image"
                                        aria-selected="true" data-id="{{ __('Image Providers') }} >> {{ __('Clipdrop') }}">{{ __('Clipdrop') }}</a>
                                    </li>
                                </ul>
                            </li>

                            <li><a class="nav-link text-left tab-name" id="v-pills-code-tab" data-bs-toggle="pill"
                                href="#v-pills-code" role="tab" aria-controls="v-pills-code"
                                aria-selected="true" data-id="{{ __('Code') }}">{{ __('Code') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-speech-tab" data-bs-toggle="pill"
                                    href="#v-pills-speech" role="tab" aria-controls="v-pills-speech"
                                    aria-selected="true" data-id="{{ __('Speech To Text') }}">{{ __('Speech To Text') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-voiceover-tab" data-bs-toggle="pill"
                                    href="#v-pills-voiceover" role="tab" aria-controls="v-pills-voiceover"
                                    aria-selected="true" data-id="{{ __('Voiceover') }}">{{ __('Voiceover') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-bad-word-tab" data-bs-toggle="pill"
                                href="#v-pills-bad-word" role="tab" aria-controls="v-pills--bad-word"
                                aria-selected="true" data-id="{{ __('Bad Words') }}">{{ __('Bad Words') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-access-tab" data-bs-toggle="pill"
                                href="#v-pills-access" role="tab" aria-controls="v-pills-access"
                                aria-selected="true" data-id="{{ __('User Access') }}">{{ __('User Assess') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-12 ps-0">
                    <div class="card card-info shadow-none">
                        <div class="card-header pt-4 border-bottom">
                            <h5><span id="theme-title">{{ __('Document') }}</span></h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.features.preferences.create') }}" id="aiSettings">
                                @csrf

                                <div class="tab-content p-0 box-shadow-unset" id="topNav-v-pills-tabContent">
                                    {{-- OpenAI Setup --}}
                                    <div class="tab-pane fade active show" id="v-pills-setup" role="tabpanel" aria-labelledby="v-pills-setup-tab">
                                        <div class="row">
                                            <div class="d-flex justify-content-between mt-16p">
                                                <div id="#headingOne">
                                                    <h5 class="text-btn">{{ __('Ai Key') }}</h5>
                                                </div>
                                                <div class="mr-3"></div>
                                            </div>
                                            <div class="card-body p-l-15">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left require">{{ __('OpenAi Key') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ config('openAI.is_demo') ? 'sk-xxxxxxxxxxxxxxx' : $openai['openai'] ?? '' }}"
                                                            class="form-control inputFieldDesign" name="openai" id="openai_key">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left">{{ __('Stable Diffusion Key') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ config('openAI.is_demo') ? 'sk-xxxxxxxxxxxxxxx' : $openai['stablediffusion'] ?? '' }}"
                                                            class="form-control inputFieldDesign" name="stablediffusion" id="stable_diffusion_key">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left">{{ __('Google API Key') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ config('openAI.is_demo') ? 'sk-xxxxxxxxxxxxxxx' : $openai['google_api'] ?? '' }}"
                                                            class="form-control inputFieldDesign" name="google_api" id="googleApi_key">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left">{{ __('Clipdrop API Key') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ config('openAI.is_demo') ? 'sk-xxxxxxxxxxxxxxx' : $openai['clipdrop_api'] ?? '' }}"
                                                            class="form-control inputFieldDesign" name="clipdrop_api" id="clipdropApi_key">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left require">{{ __('Max Length for Short Description') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ $openai['short_desc_length'] ?? '' }}"
                                                            class="form-control inputFieldDesign positive-int-number" name="short_desc_length" required pattern="^(?:[1-9]|[1-9][0-9]{1,2}|1000)$"
                                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" data-pattern="{{ __('Value exceeds the maximum limit of 1000.') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left require">{{ __('Max Length for Long Description ') }}</label>
                
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                            value="{{ $openai['long_desc_length'] ?? '' }}"
                                                            class="form-control inputFieldDesign positive-int-number" name="long_desc_length" required  pattern="^(?:[1-9]|[1-9][0-9]{1,2}|1000)$"
                                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" data-pattern="{{ __('Value exceeds the maximum limit of 1000.') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-left control-label">{{ __('Word Count method based on') }}</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2-hide-search inputFieldDesign" name="word_count_method">
                                                            <option value="token" {{ $openai['word_count_method'] == 'token' ? 'selected="selected"' : '' }}>{{ __('Token') }}</option>
                                                            <option value="count_word_function" {{ $openai['word_count_method'] == 'count_word_function' ? 'selected="selected"' : '' }}>{{ __('Word Counter') }}</option>
                                                        </select>
                                                        <div class="py-1" id="note_txt_1">
                                                            <p><span class="badge badge-danger h-100 mt-1"> {{__('Note') }}!</span> {!! __('Token counting is performed in accordance with OpenAI\'s token counting guidelines, as outlined in their official :x. Meanwhile, word counting is based on the conventional method', ['x' => '
                                                            <a href="https://help.openai.com/en/articles/4936856-what-are-tokens-and-how-to-count-them" target="_blank">' . __('documentation') . '</a>']) !!} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between pt-3">
                                                <div id="#headingOne">
                                                    <h5 class="text-btn">{{ __('Live Mode') }}</h5>
                                                </div>
                                                <div class="mr-3"></div>
                                            </div>
                                            <div class="card-body p-l-15">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-left control-label">{{ __('OpenAI Model') }}</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control select2-hide-search inputFieldDesign" name="ai_model">
                                                            @foreach($aiModels as $key => $aiModel)
                                                            <option value="{{ $key }}"
                                                                {{ $key == $openai['ai_model'] ? 'selected="selected"' : '' }}>
                                                                {{ $aiModel }} ({{ $aiModelDescription[$key] }})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--smtp form start here-->
                                                <span id="smtp_form">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 control-label text-left require">{{ __('Max Result Length (Token)') }}</label>
                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                value="{{ $openai['max_token_length'] ?? $openai['max_token_length'] }}"
                                                                class="form-control inputFieldDesign positive-int-number" name="max_token_length" required
                                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Document --}}
                                    <div class="tab-pane fade" id="v-pills-document" role="tabpanel" aria-labelledby="v-pills-document-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Languages') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[document][language][]" multiple required>
                                                            @foreach ($languages as $language)
                                                                @if ( !array_key_exists($language->name, $omitLanguages) )
                                                                <option value="{{ $language->name }}"
                                                                    {{ in_array($language->name, processPreferenceData($meta[0]->language) ) ? 'selected' : '' }}> {{ $language->name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Tones') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[document][tone][]" multiple required>
                                                            @foreach ($preferences['document']['tone'] as $key => $tone)
                                                                <option value="{{ $key }}" {{ in_array($tone, processPreferenceData($meta[0]->tone)) ? 'selected' : '' }} > {{ $tone }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Number of variants') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[document][variant][]" multiple required>
                                                            @foreach ($preferences['document']['variant'] as $key => $variant)
                                                                <option value="{{ $key }}" {{ in_array($variant, processPreferenceData($meta[0]->variant)) ? 'selected' : '' }} > {{ $variant }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Creativity Level') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[document][temperature][]" multiple required>
                                                            @foreach ($preferences['document']['temperature'] as $key => $temperature)
                                                                <option value="{{ $key }}" {{ in_array($temperature, processPreferenceData($meta[0]->temperature)) ? 'selected' : '' }} > {{ $temperature }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Long Article -->
                                    <div class="tab-pane fade" id="v-pills-long-article" role="tabpanel" aria-labelledby="v-pills-long-article-tab">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <!-- Long Article Generate From -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Long Article Generate Using') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="preference[long_article][ai_provider]"
                                                            id="long_article_generate_using"
                                                            required>
                                                            @foreach (json_decode($longArticleMetas['long_article_providers']) as $longArticle)
                                                                <option value="{{ $longArticle }}" {{ preference('long_article_provider') == $longArticle ? 'selected' : '' }} > {{ $longArticle}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Language -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Languages') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="preference[long_article][language][]" multiple required>
                                                            @foreach ($languages as $language)
                                                                @if ( !array_key_exists($language->name, $omitLanguages) )
                                                                <option value="{{ $language->name }}"
                                                                    {{ in_array($language->name, json_decode(preference('long_article_language')) ) ? 'selected' : '' }}> {{ $language->name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
 
                                                <!-- Tone -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Tones') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="preference[long_article][tone][]" multiple required>
                                                            @foreach (json_decode($longArticleMetas['long_article_tones']) as $tone)
                                                                <option value="{{ $tone }}" {{ in_array($tone, json_decode(preference('long_article_tone'))) ? 'selected' : '' }} > {{ $tone }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Long Article Models -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('OpenAi Model') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="preference[long_article][model]"
                                                            id="long_article_model"
                                                            required>
                                                            @foreach (json_decode($longArticleMetas['long_article_models']) as $model)
                                                                <option value="{{ $model }}" {{ preference('long_article_model') == $model ? 'selected' : '' }} > {{ $model}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Frequency Penalty -->
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left">{{ __('Frequency Penalty') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="range" class="form-range" id="frequency_penalty" min="0" max="2" step="0.1" value="{{ preference('long_article_frequency_penalty') }}" name="preference[long_article][frequency_penalty]">
                                                    </div>
                                                    <div class="col-sm-1 text-right">
                                                        <span id="frequency_penalty_value">0</span>
                                                    </div>
                                                </div>

                                                <!-- Presence Penalty -->
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label text-left">{{ __('Presence Penalty') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="range" class="form-range" id="presence_penalty" min="0" max="2" step="0.1" value="{{ preference('long_article_presence_penalty') }}" name="preference[long_article][presence_penalty]">
                                                    </div>
                                                    <div class="col-sm-1 text-right">
                                                        <span id="presence_penalty_value">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                    @php 
                                        $openaiImageStatus = processPreferenceData($meta[1]->imageCreateFrom)['openai'] ?? '0';
                                        $stableDiffusionImageStatus =  processPreferenceData($meta[1]->imageCreateFrom)['stable_diffusion'] ?? '0';
                                        $clipdropImageStatus =  processPreferenceData($meta[1]->imageCreateFrom)['clipdrop'] ?? '0';
                                    @endphp

                                    {{-- OpenAI Image Provider --}}
                                    <div class="tab-pane fade" id="v-pills-openai-image" role="tabpanel" aria-labelledby="v-pills-openai-image-tab">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group row">
                                                    <label for="meta_title"
                                                        class="col-sm-3 text-left col-form-label ">{{ __('Activate OpenAI') }}</label>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="meta[image_maker][imageCreateFrom][openai]"
                                                            value="0">
                                                        <div class="switch switch-bg d-inline m-r-10">
                                                            <input type="checkbox" name="meta[image_maker][imageCreateFrom][openai]"
                                                                {{ $openaiImageStatus == "1" ? 'checked' : '' }}
                                                                value="1" id="show-openai-image">
                                                            <label for="show-openai-image" class="cr"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-openai-image">
                                                    <div class="col-12">
                                                        <label for="openai_engine" class="control-label require">{{ __('OpenAI Engine') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="openai_engine" id="openai_engine" required>
                                                            @foreach (config('openAI.openAIImageModel') as $key => $variant)
                                                                <option value="{{ $key }}" {{ preference('openai_engine') == $key ? 'selected':"" }} > {{ $variant }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-openai-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Number of variants') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx" 
                                                            name="meta[image_maker][openai_variant][]" multiple required id="openai_variant">
                                                            @foreach ($preferences['image_maker']['openai_variant'] as $key => $variant)
                                                                <option value="{{ $key }}" {{ in_array($variant, processPreferenceData($meta[1]->openai_variant)) ? 'selected' : '' }} > {{ $variant }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @php
                                                    $resolutions = [];
                                                    if (preference('openai_engine')) {
                                                        $resolutions = config('openAI.size')[preference('openai_engine')];
                                                    }
                                                @endphp
                                                <div class="form-group row conditional" data-if="#show-openai-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Resulation') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][openai_resulation][]" multiple required id="openai_resulation">
                                                            @foreach ($resolutions as $key => $resulation)
                                                                <option value="{{ $key }}" {{ in_array($resulation, processPreferenceData($meta[1]->openai_resulation)) ? 'selected' : '' }} > {{ $resulation }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-openai-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Image Style') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][openai_artStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['openai_artStyle'] as $key => $artStyle)
                                                                <option value="{{ $key }}" {{ in_array($artStyle, processPreferenceData($meta[1]->openai_artStyle)) ? 'selected' : '' }} > {{ $artStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-openai-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Lighting Effects') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][openai_lightingStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['openai_lightingStyle'] as $key => $lightingStyle)
                                                                <option value="{{ $key }}" {{ in_array($lightingStyle, processPreferenceData($meta[1]->openai_lightingStyle)) ? 'selected' : '' }} > {{ $lightingStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Stablediffusion Image Provider --}}
                                    <div class="tab-pane fade" id="v-pills-stable-diffusion-image" role="tabpanel" aria-labelledby="v-pills-stable-diffusion-image-tab">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group row">
                                                    <label for="meta_title"
                                                        class="col-sm-3 text-left col-form-label ">{{ __('Activate Stable Diffusion') }}</label>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="meta[image_maker][imageCreateFrom][stable_diffusion]"
                                                            value="0">
                                                        <div class="switch switch-bg d-inline m-r-10">
                                                            <input type="checkbox" name="meta[image_maker][imageCreateFrom][stable_diffusion]"
                                                                {{ $stableDiffusionImageStatus == "1" ? 'checked' : '' }}
                                                                value="1" id="show-stable-diffusion-image">
                                                            <label for="show-stable-diffusion-image" class="cr"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row conditional" data-if="#show-stable-diffusion-image">
                                                    <div class="col-12">
                                                        <label for="stable_diffusion_engine" class="control-label require">{{ __('Stable Diffusion Engine') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="stable_diffusion_engine" id="stable_diffusion_engine" required>
                                                            @foreach (config('openAI.stableDiffusion') as $key => $variant)
                                                                <option value="{{ $key }}" {{ preference('stable_diffusion_engine') == $key ? 'selected':"" }} > {{ $variant }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-stable-diffusion-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Number of variants') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx" 
                                                            name="meta[image_maker][stable_diffusion_variant][]" multiple required>
                                                            @foreach ($preferences['image_maker']['stable_diffusion_variant'] as $key => $variant)
                                                                <option value="{{ $key }}" {{ in_array($variant, processPreferenceData($meta[1]->stable_diffusion_variant)) ? 'selected' : '' }} > {{ $variant }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @php
                                                    $resolutions = [];
                                                    if (preference('stable_diffusion_engine')) {
                                                        $resolutions = config('openAI.size')[preference('stable_diffusion_engine')];
                                                    }
                                                    
                                                @endphp
                                                <div class="form-group row conditional" data-if="#show-stable-diffusion-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Resulation') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][stable_diffusion_resulation][]" id="stable_diffusion_resulation" multiple required>
                                                            @foreach ($resolutions as $key => $resulation)
                                                                <option value="{{ $key }}" {{ in_array($resulation, processPreferenceData($meta[1]->stable_diffusion_resulation)) ? 'selected' : '' }} > {{ $resulation }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-stable-diffusion-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Image Style') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][stable_diffusion_artStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['stable_diffusion_artStyle'] as $key => $artStyle)
                                                                <option value="{{ $key }}" {{ in_array($artStyle, processPreferenceData($meta[1]->stable_diffusion_artStyle)) ? 'selected' : '' }} > {{ $artStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-stable-diffusion-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Lighting Effects') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][stable_diffusion_lightingStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['stable_diffusion_lightingStyle'] as $key => $lightingStyle)
                                                                <option value="{{ $key }}" {{ in_array($lightingStyle, processPreferenceData($meta[1]->stable_diffusion_lightingStyle)) ? 'selected' : '' }} > {{ $lightingStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Clipdrop Image Provider --}}
                                    <div class="tab-pane fade" id="v-pills-clipdrop-image" role="tabpanel" aria-labelledby="v-pills-clipdrop-image-tab">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="form-group row">
                                                    <label for="meta_title"
                                                        class="col-sm-3 text-left col-form-label ">{{ __('Activate Clipdrop') }}</label>
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="meta[image_maker][imageCreateFrom][clipdrop]"
                                                            value="0">
                                                        <div class="switch switch-bg d-inline m-r-10">
                                                            <input type="checkbox" name="meta[image_maker][imageCreateFrom][clipdrop]"
                                                                {{ $clipdropImageStatus == "1" ? 'checked' : '' }}
                                                                value="1" id="show-clipdrop-image">
                                                            <label for="show-clipdrop-image" class="cr"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row conditional" data-if="#show-clipdrop-image">
                                                    <div class="col-12">
                                                        <label for="clipdrop_apis_engine" class="control-label require">{{ __('Clip Drop Services') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][clipdrop_apis_engine][]" id="clipdrop_apis_engine" multiple required>
                                                            @foreach (config('openAI.clipdrop')['service'] as $key => $api)
                                                                <option value="{{ $key }}" {{ in_array($key, processPreferenceData($meta[1]->clipdrop_apis_engine)) ? 'selected' : '' }}> {{ $api }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-clipdrop-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Image Style') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][clipdrop_artStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['clipdrop_artStyle'] as $key => $artStyle)
                                                                <option value="{{ $key }}" {{ in_array($artStyle, processPreferenceData($meta[1]->clipdrop_artStyle)) ? 'selected' : '' }} > {{ $artStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row conditional" data-if="#show-clipdrop-image">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Lighting Effects') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[image_maker][clipdrop_lightingStyle][]" multiple required>
                                                            @foreach ($preferences['image_maker']['clipdrop_lightingStyle'] as $key => $lightingStyle)
                                                                <option value="{{ $key }}" {{ in_array($lightingStyle, processPreferenceData($meta[1]->clipdrop_lightingStyle)) ? 'selected' : '' }} > {{ $lightingStyle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Code --}}
                                    <div class="tab-pane fade" id="v-pills-code" role="tabpanel" aria-labelledby="v-pills-code-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Language') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[code_writer][language][]" multiple required>
                                                            @foreach ($preferences['code_writer']['language'] as $key => $language)
                                                                <option value="{{ $key }}" {{ in_array($language, processPreferenceData($meta[2]->language)) ? 'selected' : '' }} > {{ $language }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Code Level') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[code_writer][codeLabel][]" multiple required>
                                                            @foreach ($preferences['code_writer']['codeLabel'] as $key => $codeLabel)
                                                                <option value="{{ $key }}" {{ in_array($codeLabel, processPreferenceData($meta[2]->codeLabel)) ? 'selected' : '' }} > {{ $codeLabel }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Speech To Text --}}
                                    <div class="tab-pane fade" id="v-pills-speech" role="tabpanel" aria-labelledby="v-pills-speech-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Languages') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[speech_to_text][language][]" multiple required>
                                                            @foreach ($languages as $language)
                                                                @if ( !array_key_exists($language->name, $omitSpeechLanguages) )
                                                                <option value="{{ $language->short_name }}"
                                                                    {{ in_array($language->short_name, processPreferenceData($meta[3]->language) ) ? 'selected' : '' }}> {{ $language->name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Voiceover --}}
                                    <div class="tab-pane fade" id="v-pills-voiceover" role="tabpanel" aria-labelledby="v-pills-voiceover-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Maximum Text Blocks Limit') }}</label>
                                                        <div>
                                                            <input type="number" class="form-control" name="conversation_limit" value="{{ $openai['conversation_limit'] ?? 1 }}" min="1" data-min="{{ __('This value must be greater than :x.', ['x' => '0']) }}" required />
                                                        </div>
                                                        <div class="d-flex py-1" id="note_txt_1">
                                                            <span class="badge badge-danger h-100 mt-1"> {{__('Note') }}!</span>
                                                            <ul class="list-unstyled ml-3">
                                                                <li>{{ __('If you increase the value, it will take longer to generate. Please note that the minimum value must be equal to or greater than 1.') }} </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Languages') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][language][]" multiple required>
                                                            @foreach ($languages as $language)
                                                                @if ( !array_key_exists($language->name, $omitTextToSpeechLanguages) )
                                                                    <option value="{{ $language->name }}"
                                                                        {{ in_array($language->name, processPreferenceData($meta[4]->language) ) ? 'selected' : '' }}> {{ $language->name }} 
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Select Volumes') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][volume][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['volume'] as $key => $volume)
                                                                <option value="{{ $key }}" {{ in_array($volume, processPreferenceData($meta[4]->volume)) ? 'selected' : '' }} > {{ $volume }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Pitch') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][pitch][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['pitch'] as $key => $pitch)
                                                                <option value="{{ $key }}" {{ in_array($pitch, processPreferenceData($meta[4]->pitch)) ? 'selected' : '' }} > {{ $pitch }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Speed') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][speed][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['speed'] as $key => $speed)
                                                                <option value="{{ $key }}" {{ in_array($speed, processPreferenceData($meta[4]->speed)) ? 'selected' : '' }} > {{ $speed }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Pause') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][pause][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['pause'] as $key => $pause)
                                                                <option value="{{ $key }}" {{ in_array($pause, processPreferenceData($meta[4]->pause)) ? 'selected' : '' }} > {{ $pause }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Audio Effect') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][audio_effect][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['audio_effect'] as $key => $audio_effect)
                                                                <option value="{{ $key }}" {{ in_array($audio_effect, processPreferenceData($meta[4]->audio_effect)) ? 'selected' : '' }} > {{ $audio_effect }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label require">{{ __('Converted To') }}</label>
                                                        <select class="form-control select2 inputFieldDesign sl_common_bx"
                                                            name="meta[text_to_speech][target_format][]" multiple required>
                                                            @foreach ($preferences['text_to_speech']['target_format'] as $key => $target_format)
                                                                <option value="{{ $key }}" {{ in_array($target_format, processPreferenceData($meta[4]->target_format)) ? 'selected' : '' }} > {{ $target_format }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Bad Words --}}
                                    <div class="tab-pane fade" id="v-pills-bad-word" role="tabpanel" aria-labelledby="v-pills-bad-word-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="default-category" class="control-label">{{ __('Words') }}</label>
                                                        <div class="col-sm-12">
                                                            <textarea class="form-control" rows="5" name="bad_words">{{ $openai['bad_words'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="py-1" id="note_txt_1">
                                                    <div class="d-flex mt-1 mb-3">
                                                        <span class="badge badge-danger h-100 mt-1"> {{__('Note') }}!</span>
                                                        <ul class="list-unstyled ml-3">
                                                            <li>{{ __('After using each bad word, please differentiate them using a comma (,).') }} </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-access" role="tabpanel" aria-labelledby="v-pills-access-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_template" class="col-sm-3 control-label">{{ __('Enable Template') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $hideTemplate = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_template" value="{{ $hideTemplate }}">
                                                                    <input type="checkbox" name="hide_template" class="checkActivity" id="hide_template" value="0" {{ json_decode(preference('user_permission'))?->hide_template == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_template" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Long Article -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_long_article" class="control-label">{{ __('Enable Long Article') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $longArticle = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_long_article" value="{{ $longArticle }}">
                                                                    <input type="checkbox" name="hide_long_article" class="checkActivity" id="hide_long_article" value="0" {{ json_decode(preference('user_permission'))?->hide_long_article == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_long_article" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Long Article -->
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_image" class="col-sm-3 control-label">{{ __('Enable Image') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $hideImage = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_image" value="{{ $hideImage }}">
                                                                    <input type="checkbox" name="hide_image" class="checkActivity" id="hide_image" value="0" {{ json_decode(preference('user_permission'))?->hide_image == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_image" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_code" class="col-sm-3 control-label">{{ __('Enable Code') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $hideCode = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_code" value="{{ $hideCode }}">
                                                                    <input type="checkbox" name="hide_code" class="checkActivity" id="hide_code" value="0" {{ json_decode(preference('user_permission'))?->hide_code == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_code" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_speech_to_text" class="control-label">{{ __('Enable Speech to Text') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $speechToText = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_speech_to_text" value="{{ $speechToText }}">
                                                                    <input type="checkbox" name="hide_speech_to_text" class="checkActivity" id="hide_speech_to_text" value="0" {{ json_decode(preference('user_permission'))?->hide_speech_to_text == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_speech_to_text" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="hide_text_to_speech" class="control-label">{{ __('Enable Voiceover') }}</label>
                                                        <div class="col-9 d-flex">
                                                            <div class="mr-3">
                                                                <div class="switch switch-bg d-inline m-r-10">
                                                                    @php
                                                                        $textToSpeech = 1;
                                                                    @endphp
                                                                    <input type="hidden" name="hide_text_to_speech" value="{{ $textToSpeech }}">
                                                                    <input type="checkbox" name="hide_text_to_speech" class="checkActivity" id="hide_text_to_speech" value="0" {{ json_decode(preference('user_permission'))?->hide_text_to_speech == 1  ? '' : 'checked' }}>
                                                                    <label for="hide_text_to_speech" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer py-0">
                                    <div class="form-group row">
                                        <label for="btn_save" class="col-sm-3 control-label"></label>
                                        <div class="m-auto">
                                            <button type="submit"
                                                class="btn form-submit custom-btn-submit float-right package-submit-button"
                                                id="footer-btn">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('mediamanager::image.modal_image')
@endsection

@section('js')
    <script>
        var openai_key = "{{ $openai['openai'] ?? '' }}";
        var stable_diffusion_key = "{{ $openai['stablediffusion'] ?? '' }}";
        var googleApi_key = "{{ $openai['google_api'] ?? '' }}";
        var clipdropApi_key = "{{ $openai['clipdrop_api'] ?? '' }}";
        const openAI = @json(config('openAI'));
        var openAIPreferenceSizes = @json($preferences['image_maker']['openai_variant']);
    </script>
    <script src="{{ asset('public/dist/js/custom/openai-settings.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/OpenAI/Resources/assets/js/admin/preference.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/condition.min.js') }}"></script>
@endsection

