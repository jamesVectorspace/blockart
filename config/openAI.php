<?php

return [
    'name' => 'OpenAI',

    'url' => 'https://api.openai.com/v1/images/generations',
    'chatUrl' => 'https://api.openai.com/v1/chat/completions',
    'textToSpeechUrl' => 'https://texttospeech.googleapis.com/v1/text:synthesize',
    'chatModel' => 'gpt-3.5-turbo',
    'chatToken' => 4000,

    'speechUrl' => 'https://api.openai.com/v1/audio/transcriptions',
    'speechModel' => 'whisper-1',

    'openAIModel' => [
        'gpt-4-0125-preview' => 'GPT-4-0125-preview',
        'gpt-4-1106-preview' => 'GPT-4 Turbo',
        'gpt-4' => 'Gpt-4',
        'text-davinci-003' => 'Davinci',
        'text-curie-001' =>  'Curie',
        'gpt-3.5-turbo-0125' => 'GPT-3.5-turbo-0125',
        'gpt-3.5-turbo' =>  'Gpt-3.5-turbo',
        'gpt-3.5-turbo-1106' =>  'Gpt-3.5-turbo-1106',
        'gpt-3.5-turbo-16k' =>  'gpt-3.5-turbo-16k',
        'text-babbage-001' =>  'Babbage',
        'text-ada-001' =>  'Ada',
    ],

    'modelDescription' => [
        'gpt-4-0125-preview' => 'Excelling in diverse tasks with enhanced understanding, creativity, and contextual reasoning',
        'gpt-3.5-turbo-0125' => 'Excelling in diverse tasks with improved performance and efficiency.',
        'gpt-4-1106-preview' => 'The latest GPT-4 model with improved instruction',
        'gpt-3.5-turbo-1106' =>  'The latest GPT-3.5 Turbo model with large Tokens',
        'gpt-4' => 'More capable than any GPT-3.5 model, able to do more complex tasks',
        'text-davinci-003' => 'Most capable GPT-3 model. Can do any task with higher quality',
        'text-curie-001' =>  'Very capable, but faster and lower cost than Davinci',
        'gpt-3.5-turbo' =>  'Optimized for chat at 1/10th the cost of text-davinci-003',
        'gpt-3.5-turbo-16k' =>  'Same capabilities as gpt-3.5-turbo model but with 4 times the context',
        'text-babbage-001' =>  'Capable of straightforward tasks',
        'text-ada-001' =>  'Cheapest & Fastest',
    ],

    'stableDiffusion' => [
        'stable-diffusion-xl-1024-v1-0' => 'Stable Diffusion XL v1.0',
        'stable-diffusion-xl-1024-v0-9' => 'Stable Diffusion XL v0.9',
        'stable-diffusion-xl-beta-v2-2-2' => 'Stable Diffusion v2.2.2-XL Beta',
        'stable-diffusion-512-v2-1' => 'Stable Diffusion-512-v2-1',
        'stable-diffusion-768-v2-1' => 'Stable Diffusion v2.1-768',
        'stable-diffusion-v1-5' => 'Stable Diffusion v1.5',

    ],

    'clipdrop' => [

        'service' => [
            'text-to-image' => 'Text To Image',
            'sketch-to-image' => 'Sketch To Image',
            'replace-background' => 'Replace Background',
            'remove-background' => 'Remove Background',
            'remove-text' => 'Remove Text',
            'reimagine' => 'Reimagine',
        ],
    
        'validation' => [
            'sketch-to-image' => [
                'resolution' => '1024x1024', 
                'size' => ''
            ],

            'replace-background' => [
                'resolution' => '2048x2048', 
                'size' => '20'
            ],

            'remove-text' => [
                'resolution' => '4000x4000', 
                'size' => '30'
            ],

            'reimagine' => [
                'resolution' => '1024x1024', 
                'size' => ''
            ],

            'remove-background' => [
                'resolution' => '5000x5000', 
                'size' => '30'
            ],

            'text-to-image' => [
                'resolution' => '', 
                'size' => ''
            ]
        ]

    ],


    'openAIImageModel' => [
        'dall-e-2' => 'DALL·E 2',
        'dall-e-3' => 'DALL·E 3',
    ],

    'size' => [
        'dall-e-2' => [
            '256x256' => '256x256',
            '512x512' => '512x512',
            '1024x1024' => '1024x1024',
        ], 
        'dall-e-3' => [
            '1024x1024' => '1024x1024',
            '1024x1792' => '1024x1792',
            '1792x1024' => '1792x1024',
        ], 
        'stable-diffusion-xl-1024-v1-0' => [
            '1536x640' => '1536x640',
            '1152x896' => '1152x896',
            '1344x768' => '1344x768',
            '1024x1024' => '1024x1024',
            '768x1344' => '768x1344',
            '640x1536' => '640x1536',
            '832x1216' => '832x1216',
            '896x1152' => '896x1152',
        ],
        'stable-diffusion-xl-1024-v0-9' => [
            '1536x640' => '1536x640',
            '1152x896' => '1152x896',
            '1344x768' => '1344x768',
            '1024x1024' => '1024x1024',
            '768x1344' => '768x1344',
            '640x1536' => '640x1536',
            '832x1216' => '832x1216',
            '896x1152' => '896x1152',
        ],
        'stable-diffusion-xl-beta-v2-2-2' => [
            '896x512' => '896x512',
            '768x512' => '768x512',
            '512x512' => '512x512',
            '512x768' => '512x768',
            '512x896' => '512x896',
        ],
        'stable-diffusion-768-v2-1' => [
            '1344x768' => '1344x768',
            '1152x768' => '1152x768',
            '1024x768' => '1024x768',
            '768x768' => '768x768',
            '768x1024' => '768x1024',
            '768x1152' => '768x1152',
            '768x1344' => '768x1344',
        ],
        'stable-diffusion-512-v2-1' => [
            '768x512' => '768x512',
            '1024x512' => '1024x512',
            '512x512' => '512x512',
            '512x768' => '512x768',
            '512x1024' => '512x1024',
        ],
        'stable-diffusion-v1-5' => [
            '512x512' => '512x512',
            '768x768' => '768x768',
        ],
        'text-to-image' => [
            '1024x1024' => '1024x1024',
        ],
        'sketch-to-image' => [
            '256x256' => '256x256',
            '512x512' => '512x512',
            '1024x1024' => '1024x1024',
        ],
    ],

    'providers' => [
        'openAI' => 'OpenAI',
        'stableDiffusion' => 'Stable Diffusion',
        'clipdrop' => 'Clipdrop'
    ],

    'ssl_verify_host' => false,

    'ssl_verify_peer' => false,

    /*
    |--------------------------------------------------------------------------
    | The application is in demo mode or not
    |--------------------------------------------------------------------------
    |
    | This option controls the demo mode of the application.
    |
    | value: true, false
    |
    */

    'is_demo' => env('IS_DEMO', false),

    /* The application version */
    'version' => env('ARTIFISM_VERSION', '1.0.0'),

     /**
     * Thumbnail path
     *
     * Note:If you want to change the thumbnail_dir name,
     * You must change dir name from public/uploads/[old thumbnail directory name]
     * */
    'thumbnail_dir' => 'sizes',


    /* Demo account credentails, Only work when the application on demo mode */
    'credentials' => [
        'admin' => [
            'email' => 'admin@techvill.net',
            'password' => '123456'
        ],
        'customer' => [
            'email' => 'user@techvill.net',
            'password' => '123456'
        ]
    ],
    
    'app_install' => env('APP_INSTALL', false),
];
