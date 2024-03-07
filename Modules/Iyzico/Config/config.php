<?php
/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */
return [
    'name' => 'Iyzico',
    'alias' => 'iyzico',
    'logo' => 'Modules/Iyzico/Resources/assets/iyzico.png',

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'iyzico.edit'],
        ['label' => __('Iyzico Documentation'), 'target' => '_blank', 'url' => 'https://dev.iyzipay.com/en']
    ],
  'validation' => [
        'rules' => [
            'apiKey' => 'required',
            'secretKey' => 'required',
            'sandbox' => 'required'
        ],
        'attributes' => [
            'apiKey' => __('Merchant API key'),
            'secretKey' => __('Merchant Secret Key'),
            'sandbox' => __('Please specify sandbox enabled/disabled.')
        ]
    ],
    'fields' => [
        'apiKey' => [
            'label' => __('API Key'),
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
            'label' => 'Sandbox',
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
    'store_route' => 'iyzico.store',

];


