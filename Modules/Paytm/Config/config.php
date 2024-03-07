<?php

return [
    'name' => 'Paytm',

    'alias' => 'paytm',

    'logo' => 'Modules/Paytm/Resources/assets/paytm.png',

    // Paytm addon settings

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'paytm.edit'],
        ['label' => __('Paytm Documentation'), 'target' => '_blank', 'url' => 'https://business.paytm.com/docs']
    ],

    /**
     * Paytm data validation
     */
    'validation' => [
        'rules' => [
            'merchantId' => 'required',
            'merchantKey' => 'required',
            'merchantWebsite' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'merchantId' => __('Merchant Id'),
            'merchantKey' => __('Merchant Key'),
            'merchantWebsite' => __('Merchant Website'),
            'sandbox' => __('Please specify sandbox enabled/disabled.')
        ]
    ],
    'fields' => [
        'merchantId' => [
            'label' => __('Merchant Id'),
            'type' => 'text',
            'required' => true
        ],
        'merchantKey' => [
            'label' => __('Merchant Key'),
            'type' => 'text',
            'required' => true
        ],
        'merchantWebsite' => [
            'label' => __('Merchant Website'),
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

    'store_route' => 'paytm.store',

];


