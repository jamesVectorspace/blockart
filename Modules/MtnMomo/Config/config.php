<?php

return [
    'name' => 'MtnMomo',

    'alias' => 'mtnmomo',

    'logo' => 'Modules/MtnMomo/Resources/assets/mtnmomo.png',

    // MTN momo addon settings

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'mtnmomo.edit'],
        ['label' => __('MTN Momo Documentation'), 'target' => '_blank', 'url' => 'https://momodeveloper.mtn.com/']
    ],

    /**
     * MTN momo data validation
     */
    'validation' => [
        'rules' => [
            'userApiId' => 'required',
            'userApiKey' => 'required',
            'ocpApimSubscriptionKey' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'userApiId' => __('User API Id'),
            'userApiKey' => __('User API key'),
            'ocpApimSubscriptionKey' => __('Subscription key'),
            'sandbox' => __('Please specify sandbox enabled/disabled.')
        ]
    ],
    'fields' => [
        'userApiId' => [
            'label' => __('User API Id'),
            'type' => 'text',
            'required' => true
        ],
        'userApiKey' => [
            'label' => __('User API Key'),
            'type' => 'text',
            'required' => true
        ],
        'ocpApimSubscriptionKey' => [
            'label' => __('Subscription key'),
            'type' => 'text',
            'required' => true
        ],
        'instruction' => [
            'label' => __('Instruction'),
            'type' => 'textarea',
        ],
        'sandbox' => [
            'label' => __('Sandbox'),
            'type' => 'select',
            'required' => true,
            'options' => [
                'Enabled' => 1,
                'Disabled' =>  0
            ]
        ],
        'country' => [
            'label' => __('Country'),
            'type' => 'select',
            'required' => true,
            'options' => [
                'Benin' => 'benin',
                'Cameroon' => 'cameroon',
                'Congo' => 'congo',
                'Ghana' => 'ghana',
                'Guinea' => 'guinea',
                'Ivory Coast' => 'ivoryCoast',
                'Liberia' => 'liberia',
                'Rwanda' => 'rwanda',
                'South Africa' => 'southAfrica',
                'Swaziland' => 'swaziland',
                'Uganda' => 'uganda',
                'Zambia' => 'zambia',
            ]
        ],
        'status' => [
            'label' => __('Status'),
            'type' => 'select',
            'required' => true,
            'options' => [
                'Active' => 1,
                'Inactive' =>  0
            ]
        ]
    ],
    'store_route' => 'mtnmomo.store',

    'sandbox' => [
        'xTargetEnvironment' => 'sandbox',
        'currency' => 'EUR'
    ],
    'benin' => [
        'xTargetEnvironment' => 'mtnbenin',
        'currency' => 'XOF'
    ],
    'cameroon' => [
        'xTargetEnvironment' => 'mtncameroon',
        'currency' => 'XAF'
    ],
    'congo' => [
        'xTargetEnvironment' => 'mtncongo',
        'currency' => 'XAF'
    ],
    'ghana' => [
        'xTargetEnvironment' => 'mtnghana',
        'currency' => 'GHS'
    ],
    'guinea' => [
        'xTargetEnvironment' => 'mtnguineac',
        'currency' => 'GNF'
    ],
    'ivoryCoast' => [
        'xTargetEnvironment' => 'mtnivorycoast',
        'currency' => 'XOF'
    ],
    'liberia' => [
        'xTargetEnvironment' => 'mtnliberia',
        'currency' => 'LRD'
    ],
    'rwanda' => [
        'xTargetEnvironment' => 'mtnrwanda',
        'currency' => 'RWF'
    ],
    'southAfrica' => [
        'xTargetEnvironment' => 'mtnsouthafrica',
        'currency' => 'ZAR'
    ],
    'swaziland' => [
        'xTargetEnvironment' => 'mtnswaziland',
        'currency' => 'SZL'
    ],
    'uganda' => [
        'xTargetEnvironment' => 'mtnuganda',
        'currency' => 'UGX'
    ],
    'zambia' => [
        'xTargetEnvironment' => 'mtnzambia',
        'currency' => 'ZMW'
    ],

];
