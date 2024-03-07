<?php

namespace Modules\CMS\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;
use Modules\CMS\Http\Models\ThemeOption;

class ThemeOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $themeId = ThemeOption::where('name', 'default_template_footer')->value('id');
        $data = [
            'id' => $themeId,
            'name' => 'default_template_footer',
            'value' => '{"main":{"text_color":"#ffffff","bg_color":"#763CD4","direction":"left","about_us":{"sort":"1","status":"1","title":"About Us","data":{"social_data":{"1":{"label":"facebook","link":"https:\/\/www.facebook.com"},"2":{"label":"youtube","link":"https:\/\/www.youtube.com"},"3":{"label":"whatsapp","link":"https:\/\/www.whatsapp.com"},"4":{"label":"instagram","link":""},"5":{"label":"wechat","link":""},"6":{"label":"tiktok","link":""},"7":{"label":"telegram","link":""},"8":{"label":"snapchat","link":""},"9":{"label":"twitter","link":"https:\/\/www.twitter.com"},"10":{"label":"reddit","link":""},"11":{"label":"quora","link":""},"12":{"label":"skype","link":""},"13":{"label":"microsoft_teams","link":""},"14":{"label":"linkedin","link":"https:\/\/www.linkedin.com"}}}},"useful_links":{"sort":"2","status":"1","title":"Company","data":{"1":{"label":"About Us","link":"https://dashboard.homemaintaining.com\/page\/about-us"},"2":{"label":"Contact Us","link":"https://dashboard.homemaintaining.com\/page\/contact-us"},"3":{"label":"Privacy Policy","link":"https://dashboard.homemaintaining.com\/page\/privacy-policy"},"5":{"label":"Digital Payment","link":"https://dashboard.homemaintaining.com\/page\/digital-payments"},"6":{"label":"Terms","link":"https://dashboard.homemaintaining.com\/page\/terms"}}},"pages":{"sort":"3","status":"1","title":"Case Uses","data":{"1":{"label":"Blog Ideas & Outlines","link":"https://dashboard.homemaintaining.com\/user\/templates\/blog-ideas-outlines"},"2":{"label":"Image Generator","link":"https://dashboard.homemaintaining.com\/user\/image"},"3":{"label":"Marketing Copy & Strategies","link":"https://dashboard.homemaintaining.com\/user\/templates\/marketing-copy-strategies"},"5":{"label":"Business Ideas Strategies","link":"https://dashboard.homemaintaining.com\/user\/templates\/business-ideas-strategies"},"7":{"label":"Google Ad Copy","link":"https://dashboard.homemaintaining.com\/user\/templates\/google-ad-copy"}}},"resource_links":{"sort":"4","status":"1","title":"Resources","data":{"1":{"label":"Blog","link":"https://dashboard.homemaintaining.com\/blogs"},"2":{"label":"Guides & Tutorials","link":"https:\/\/platform.openai.com\/docs\/introduction"},"3":{"label":"API Docs","link":"https:\/\/platform.stability.ai\/docs\/getting-started"},"5":{"label":"Community","link":"https:\/\/community.openai.com\/"}}},"support_links":{"sort":"5","status":"1","title":"Support","data":{"1":{"label":"OpenAI API","link":"https:\/\/platform.openai.com\/docs\/introduction"},"2":{"label":"Stable Diffusion API","link":"https:\/\/platform.stability.ai\/docs\/getting-started"},"5":{"label":"Report Issue","link":"https:\/\/support.techvill.org\/customer"}}}},"bottom":{"status":"1","text_color":"#ffffff","bg_color":"#763CD4","border_top":"#dbdbdb","title":"2023 Artifism, Inc. All Rights Reserved.","position":"center"}}',
        ];

        $replaceFrom = [
            moduleConfig('cms.replace_url_one'),
            moduleConfig('cms.replace_url_two')
        ];

        $replaceTo = url('/');
        
        $data['value'] = str_replace($replaceFrom, $replaceTo, $data['value']);

        \DB::table('theme_options')->upsert($data, 'id');

    }
}
