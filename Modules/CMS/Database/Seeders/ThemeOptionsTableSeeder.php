<?php

namespace Modules\CMS\Database\Seeders;

use Illuminate\Database\Seeder;

class ThemeOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $data = array (
            0 =>
            array (
                'id' => 1,
                'name' => 'default_template_footer_logo_light',
                'value' => '',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'default_template_payment_methods',
                'value' => '',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'default_template_phone_no',
                'value' => '0',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'default_template_email',
                'value' => '0',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'default_template_currency',
                'value' => '0',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'default_template_footer',
                'value' => '{"main":{"text_color":"#ffffff","bg_color":"#763CD4","direction":"left","about_us":{"sort":"1","status":"1","title":"About Us","data":{"social_data":{"1":{"label":"facebook","link":"https:\/\/www.facebook.com"},"2":{"label":"youtube","link":"https:\/\/www.youtube.com"},"3":{"label":"whatsapp","link":"https:\/\/www.whatsapp.com"},"4":{"label":"instagram","link":""},"5":{"label":"wechat","link":""},"6":{"label":"tiktok","link":""},"7":{"label":"telegram","link":""},"8":{"label":"snapchat","link":""},"9":{"label":"twitter","link":"https:\/\/www.twitter.com"},"10":{"label":"reddit","link":""},"11":{"label":"quora","link":""},"12":{"label":"skype","link":""},"13":{"label":"microsoft_teams","link":""},"14":{"label":"linkedin","link":"https:\/\/www.linkedin.com"}}}},"useful_links":{"sort":"2","status":"1","title":"Company","data":{"1":{"label":"About Us","link":"https://dashboard.homemaintaining.com\/page\/about-us"},"2":{"label":"Contact Us","link":"https://dashboard.homemaintaining.com\/page\/contact-us"},"3":{"label":"Privacy Policy","link":"https://dashboard.homemaintaining.com\/page\/privacy-policy"},"5":{"label":"Digital Payment","link":"https://dashboard.homemaintaining.com\/page\/digital-payments"},"6":{"label":"Terms","link":"https://dashboard.homemaintaining.com\/page\/terms"}}},"pages":{"sort":"3","status":"1","title":"Case Uses","data":{"1":{"label":"Blog Ideas & Outlines","link":"https://dashboard.homemaintaining.com\/user\/templates\/blog-ideas-outlines"},"2":{"label":"Image Generator","link":"https://dashboard.homemaintaining.com\/user\/image"},"3":{"label":"Marketing Copy & Strategies","link":"https://dashboard.homemaintaining.com\/user\/templates\/marketing-copy-strategies"},"5":{"label":"Business Ideas Strategies","link":"https://dashboard.homemaintaining.com\/user\/templates\/business-ideas-strategies"},"7":{"label":"Google Ad Copy","link":"https://dashboard.homemaintaining.com\/user\/templates\/google-ad-copy"}}},"resource_links":{"sort":"4","status":"1","title":"Resources","data":{"1":{"label":"Blog","link":"https://dashboard.homemaintaining.com\/blogs"},"2":{"label":"Guides & Tutorials","link":"https:\/\/platform.openai.com\/docs\/introduction"},"3":{"label":"API Docs","link":"https:\/\/stablediffusionapi.com\/docs\/"},"5":{"label":"Community","link":"https:\/\/community.openai.com\/"}}},"support_links":{"sort":"5","status":"1","title":"Support","data":{"1":{"label":"OpenAI API","link":"https:\/\/platform.openai.com\/docs\/introduction"},"2":{"label":"Stable Diffusion API","link":"https:\/\/stablediffusionapi.com\/docs\/"},"5":{"label":"Report Issue","link":"https:\/\/support.techvill.org\/customer"}}}},"bottom":{"status":"1","text_color":"#ffffff","bg_color":"#763CD4","border_top":"#dbdbdb","title":"2023 Artifism, Inc. All Rights Reserved.","position":"center"}}',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'default_template_header',
                'value' => '{"main":{"text_color":"#ffffff","bg_color":"#000000","show_logo":"1","show_switch_bar":"1", "show_menu":"1"}}',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'default_template_header_logo_light',
                'value' => '',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'default_template_is_color_picker_active',
                'value' => '0',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'default_template_social',
                'value' => '{"facebook":"1","whatsapp":"1","instagram":"1","pinterest":"1","linkedin":"1"}',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'default_template_page',
                'value' => '{"term_condition":"terms"}',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'default_template_header_mobile_logo',
                'value' => '',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'default_template_primary_color',
                'value' => '#fcca19',
            ),
            90 =>
            array (
                'id' => 91,
                'name' => 'default_template_footer_logo_dark',
                'value' => '',
            ),
            91 =>
            array (
                'id' => 93,
                'name' => 'default_template_header_logo_dark',
                'value' => '',
            ),
            92 =>
            array (
                'id' => 94,
                'name' => 'layout_faq',
                'value' => '{"1":"bottom"}',
            ),
        );

        $replaceFrom = [
            moduleConfig('cms.replace_url_one'),
            moduleConfig('cms.replace_url_two')
        ];

        $replaceTo = url('/');

        array_walk_recursive($data, function (&$value) use ($replaceFrom, $replaceTo) {
            $value = str_replace($replaceFrom, $replaceTo, $value);
        });

        \DB::table('theme_options')->delete();

        \DB::table('theme_options')->insert($data);

    }
}
