<?php

return [
    'name' => 'Khalti',
    'alias' => 'khalti',

    'logo' => 'Modules/Khalti/Resources/assets/khalti.png',

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'khalti.edit'],
        ['label' => __('Khalti Documentation'), 'target' => '_blank', 'url' => 'https://docs.khalti.com/']
    ],

    'validation' => [
        'rules' => [
            'secretKey' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'secretKey' => __('Secret Key'),
            'sandbox' => __('Please specify sandbox enabled/disabled.')
        ]
    ],

    'fields' => [
        'secretKey' => [
            'label' => __('Secret Key'),
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
            'label' => 'Status',
            'type' => 'select',
            'required' => true,
            'options' => [
                'Active' => 1,
                'Inactive' =>  0
            ],
            'note' => __("Khalti does not support any currency except 'NPR'"),
        ]
    ],

    'store_route' => 'khalti.store',
    'base_url' => url('/'),
];
