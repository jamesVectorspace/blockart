<?php


return [
    'name' => 'PaypalRecurring',

    'alias' => 'paypalrecurring',

    'logo' => 'Modules/PaypalRecurring/Resources/assets/paypalrecurring.png',

    // paypal recurring addon settings

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'paypalrecurring.edit'],
        ['label' => __('PayPal Documentation'), 'target' => '_blank', 'url' => 'https://developer.paypal.com/api/rest/']
    ],

    'validation' => [
        'rules' => [
            'secretKey' => 'required',
            'clientId' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'secretKey' => __('Client Secret Key'),
            'clientId' => __('Client Id'),
            'sandbox' => 'Please specify sandbox enabled/disabled.'
        ]
    ],
    'fields' => [
        'secretKey' => [
            'label' => __('Client Secret Key'),
            'type' => 'text',
            'required' => true
        ],
        'clientId' => [
            'label' => __('Client Id'),
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

    'store_route' => 'paypalrecurring.store',


    /**
     * Paypal recurring payment routes for returning and canceling payment
     */
    'return_url' => 'paypalrecurring.capture',

    'cancel_url' => 'paypalrecurring.cancel'
];
