<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('preferences')->delete();

        \DB::table('preferences')->insert(array (
            0 =>
            array (
                'id' => 1,
                'category' => 'preference',
                'field' => 'row_per_page',
                'value' => '25',
            ),
            1 =>
            array (
                'id' => 2,
                'category' => 'preference',
                'field' => 'date_format',
                'value' => '1',
            ),
            2 =>
            array (
                'id' => 3,
                'category' => 'preference',
                'field' => 'date_sepa',
                'value' => '-',
            ),
            3 =>
            array (
                'id' => 5,
                'category' => 'company',
                'field' => 'site_short_name',
                'value' => 'AR',
            ),
            4 =>
            array (
                'id' => 8,
                'category' => 'preference',
                'field' => 'date_format_type',
                'value' => 'dd-mm-yyyy',
            ),
            5 =>
            array (
                'id' => 9,
                'category' => 'company',
                'field' => 'company_name',
                'value' => 'Artifism',
            ),
            6 =>
            array (
                'id' => 10,
                'category' => 'company',
                'field' => 'company_email',
                'value' => 'admin@techvill.net',
            ),
            7 =>
            array (
                'id' => 11,
                'category' => 'company',
                'field' => 'company_phone',
                'value' => '+12013828901',
            ),
            8 =>
            array (
                'id' => 12,
                'category' => 'company',
                'field' => 'company_street',
                'value' => 'City Hall Park Path',
            ),
            9 =>
            array (
                'id' => 13,
                'category' => 'company',
                'field' => 'company_city',
                'value' => 'Azimpur',
            ),
            10 =>
            array (
                'id' => 14,
                'category' => 'company',
                'field' => 'company_state',
                'value' => '81',
            ),
            11 =>
            array (
                'id' => 15,
                'category' => 'company',
                'field' => 'company_zip_code',
                'value' => '1200',
            ),
            12 =>
            array (
                'id' => 17,
                'category' => 'company',
                'field' => 'dflt_lang',
                'value' => 'en',
            ),
            13 =>
            array (
                'id' => 18,
                'category' => 'company',
                'field' => 'dflt_currency_id',
                'value' => '3',
            ),
            14 =>
            array (
                'id' => 21,
                'category' => 'company',
                'field' => 'company_gstin',
                'value' => '11',
            ),
            15 =>
            array (
                'id' => 29,
                'category' => 'preference',
                'field' => 'default_timezone',
                'value' => 'Asia/Manila',
            ),
            16 =>
            array (
                'id' => 44,
                'category' => 'preference',
                'field' => 'thousand_separator',
                'value' => ',',
            ),
            17 =>
            array (
                'id' => 45,
                'category' => 'preference',
                'field' => 'decimal_digits',
                'value' => '2',
            ),
            18 =>
            array (
                'id' => 46,
                'category' => 'preference',
                'field' => 'symbol_position',
                'value' => 'before',
            ),
            19 =>
            array (
                'id' => 47,
                'category' => 'company',
                'field' => 'company_icon',
                'value' => '4b24511c095a0ce03fdcb53acab1ef2d_25_data_center_icon_191506ico.ico',
            ),
            20 =>
            array (
                'id' => 48,
                'category' => 'company',
                'field' => 'company_logo',
                'value' => 'cabdcd95ee758d5c09e9b516e80a8bd5.png',
            ),
            21 =>
            array (
                'id' => 49,
                'category' => 'preference',
                'field' => 'pdf',
                'value' => 'mPdf',
            ),
            22 =>
            array (
                'id' => 51,
                'category' => 'preference',
                'field' => 'file_size',
                'value' => '10',
            ),
            23 =>
            array (
                'id' => 55,
                'category' => 'preference',
                'field' => 'sso_service',
                'value' => '["Facebook","Google"]',
            ),
            24 =>
            array (
                'id' => 56,
                'category' => 'preference',
                'field' => 'order_prefix',
                'value' => 'ORD-',
            ),
            25 =>
            array (
                'id' => 61,
                'category' => 'verification',
                'field' => 'email',
                'value' => 'both',
            ),
            26 =>
            array (
                'id' => 88,
                'category' => 'preference',
                'field' => 'customer_signup',
                'value' => '1',
            ),
            27 =>
            array (
                'id' => 90,
                'category' => 'preference',
                'field' => 'order_refund',
                'value' => '1',
            ),
            28 =>
            array (
                'id' => 95,
                'category' => 'company',
                'field' => 'company_country',
                'value' => 'bd',
            ),
            29 =>
            array (
                'id' => 100,
                'category' => 'preference',
                'field' => 'hide_decimal',
                'value' => '1',
            ),
            30 =>
            array (
                'id' => 101,
                'category' => 'preference',
                'field' => 'user_default_signup_status',
                'value' => 'Active',
            ),
            32 =>
            array (
                'id' => 105,
                'category' => 'openai',
                'field' => 'long_desc_length',
                'value' => '300',
            ),
            33 =>
            array (
                'id' => 106,
                'category' => 'openai',
                'field' => 'ai_model',
                'value' => 'text-davinci-003',
            ),
            34 =>
            array (
                'id' => 107,
                'category' => 'openai',
                'field' => 'max_token_length',
                'value' => '2500',
            ),
            35 =>
            array (
                'id' => 108,
                'category' => 'openai',
                'field' => 'ai_model_demo',
                'value' => 'text-davinci-003',
            ),
            36 =>
            array (
                'id' => 109,
                'category' => 'openai',
                'field' => 'max_token_demo',
                'value' => '300',
            ),
            37 =>
            array (
                'id' => 110,
                'category' => 'openai',
                'field' => 'demo_word_limit',
                'value' => '200',
            ),
            38 =>
            array (
                'id' => 111,
                'category' => 'openai',
                'field' => 'demo_img_limit',
                'value' => '3',
            ),
            39 =>
            array (
                'id' => 113,
                'category' => 'openai',
                'field' => 'short_desc_length',
                'value' => '190',
            ),
            40 =>
            array (
                'id' => 114,
                'category' => 'company',
                'field' => 'company_logo_light',
                'value' => '8cb43aa79a3e22e214260ef8dc6090c2.png',
            ),
            41 =>
            array (
                'id' => 115,
                'category' => 'company',
                'field' => 'company_logo_dark',
                'value' => 'cabdcd95ee758d5c09e9b516e80a8bd5.png',
            ),
            42 =>
            array (
                'id' => 116,
                'category' => 'subscription',
                'field' => 'subscription_downgrade',
                'value' => '1',
            ),
            43 =>
            array (
                'id' => 117,
                'category' => 'subscription',
                'field' => 'subscription_change_plan',
                'value' => '1',
            ),
            46 =>
            array (
                'id' => 120,
                'category' => 'subscription',
                'field' => 'subscription_renewal',
                'value' => 'manual',
            ),
            47 =>
            array (
                'id' => 121,
                'category' => 'openai',
                'field' => 'openai',
                'value' => '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',
            ),
            48 =>
            array (
                'id' => 122,
                'category' => 'openai',
                'field' => 'stablediffusion',
                'value' => '',
            ),
            49 =>
            array (
                'id' => 123,
                'category' => 'preference',
                'field' => 'otp_expire_time',
                'value' => '120',
            ),
        ));


    }
}
