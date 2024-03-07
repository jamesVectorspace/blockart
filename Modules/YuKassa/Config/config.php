<?php

return [
    'name' => 'YuKassa',

    'alias' => 'yukassa',

    'logo' => 'Modules/YuKassa/Resources/assets/yukassa.png',

    // YuKassa addon settings

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'yukassa.edit'],
        ['label' => __('YuKassa Documentation'), 'target' => '_blank', 'url' => 'https://yookassa.ru/']
    ],

    /**
     * Yukassa data validation
     */
    'validation' => [
        'rules' => [
            'storeId' => 'required',
            'secretKey' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'storeId' => __('Store Id'),
            'secretKey' => __('Secret Key'),
            'sandbox' => __('Please specify sandbox enabled/disabled.')
        ]
    ],
    'fields' => [
        'storeId' => [
            'label' => __('Store Id'),
            'type' => 'text',
            'required' => true
        ],
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
            'label' => __('Status'),
            'type' => 'select',
            'required' => true,
            'options' => [
                'Active' => 1,
                'Inactive' =>  0
            ]
        ]
    ],

    'store_route' => 'yukassa.store',

];
