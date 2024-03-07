<?php

return [
    'name' => 'Esewa',

    'alias' => 'esewa',

    'logo' => 'Modules/Esewa/Resources/assets/esewa.png',

    // Esewa addon settings
    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'esewa.edit'],
        ['label' => __('Esewa Documentation'), 'target' => '_blank', 'url' => 'https://developer.esewa.com.np/#/?id=introduction']
    ],

    /**
     * Esewa data validation
     */
    'validation' => [
        'rules' => [
            'merchantKey' => 'required',
            'sandbox' => 'required',
            'status' => 'required'
        ],
        'attributes' => [
            'merchantKey' => __('Merchant ID/Service Code'),
            'sandbox' => __('Please specify sandbox enabled/disabled.'),
            'status' => __('Status'),
        ]
    ],
    'fields' => [
        'merchantKey' => [
            'label' => __('Merchant ID/Service Code'),
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

    'store_route' => 'esewa.store',
    'edit_route' => 'esewa.edit',
];
