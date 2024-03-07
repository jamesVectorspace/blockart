<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;

class PackageSubscriptionsMetaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('package_subscriptions_meta')->delete();

        \DB::table('package_subscriptions_meta')->insert(array (
            0 =>
            array (
                'id' => 1,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'type',
                'value' => 'number',
            ),
            1 =>
            array (
                'id' => 2,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            2 =>
            array (
                'id' => 3,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'title',
                'value' => 'Word limit',
            ),
            3 =>
            array (
                'id' => 4,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'title_position',
                'value' => 'before',
            ),
            4 =>
            array (
                'id' => 5,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'value',
                'value' => '200000',
            ),
            5 =>
            array (
                'id' => 6,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'description',
                'value' => 'Word description will be here',
            ),
            6 =>
            array (
                'id' => 7,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'is_visible',
                'value' => '1',
            ),
            7 =>
            array (
                'id' => 8,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'status',
                'value' => 'Active',
            ),
            8 =>
            array (
                'id' => 9,
                'package_subscription_id' => 1,
                'type' => 'feature_word',
                'key' => 'usage',
                'value' => '7491',
            ),
            9 =>
            array (
                'id' => 10,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'type',
                'value' => 'number',
            ),
            10 =>
            array (
                'id' => 11,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'is_value_fixed',
                'value' => '0',
            ),
            11 =>
            array (
                'id' => 12,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'title',
                'value' => 'Image limit',
            ),
            12 =>
            array (
                'id' => 13,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'title_position',
                'value' => 'before',
            ),
            13 =>
            array (
                'id' => 14,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'value',
                'value' => '1000',
            ),
            14 =>
            array (
                'id' => 15,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            15 =>
            array (
                'id' => 16,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'is_visible',
                'value' => '1',
            ),
            16 =>
            array (
                'id' => 17,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'status',
                'value' => 'Active',
            ),
            17 =>
            array (
                'id' => 18,
                'package_subscription_id' => 1,
                'type' => 'feature_image',
                'key' => 'usage',
                'value' => '0',
            ),
            18 =>
            array (
                'id' => 19,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'type',
                'value' => 'number',
            ),
            19 =>
            array (
                'id' => 20,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'is_value_fixed',
                'value' => '1',
            ),
            20 =>
            array (
                'id' => 21,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'title',
                'value' => 'Max Image Resolution',
            ),
            21 =>
            array (
                'id' => 22,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'title_position',
                'value' => 'before',
            ),
            22 =>
            array (
                'id' => 23,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'value',
                'value' => '1024',
            ),
            23 =>
            array (
                'id' => 24,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'description',
                'value' => 'Image description will be here',
            ),
            24 =>
            array (
                'id' => 25,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'is_visible',
                'value' => '1',
            ),
            25 =>
            array (
                'id' => 26,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'status',
                'value' => 'Active',
            ),
            26 =>
            array (
                'id' => 27,
                'package_subscription_id' => 1,
                'type' => 'feature_image-resolution',
                'key' => 'usage',
                'value' => '0',
            ),
            27 =>
            array (
                'id' => 28,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'type',
                'value' => 'string',
            ),
            28 =>
            array (
                'id' => 29,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'title',
            'value' => 'Artifism Bot (ChatGPT-like chatbot)',
            ),
            29 =>
            array (
                'id' => 30,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'description',
                'value' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'is_visible',
                'value' => '1',
            ),
            31 =>
            array (
                'id' => 32,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'status',
                'value' => 'Active',
            ),
            32 =>
            array (
                'id' => 33,
                'package_subscription_id' => 1,
                'type' => 'feature_custom1',
                'key' => 'usage',
                'value' => '0',
            ),
            33 =>
            array (
                'id' => 34,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'type',
                'value' => 'string',
            ),
            34 =>
            array (
                'id' => 35,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'title',
                'value' => '100+ AI Templates',
            ),
            35 =>
            array (
                'id' => 36,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'description',
                'value' => NULL,
            ),
            36 =>
            array (
                'id' => 37,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'is_visible',
                'value' => '1',
            ),
            37 =>
            array (
                'id' => 38,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'status',
                'value' => 'Active',
            ),
            38 =>
            array (
                'id' => 39,
                'package_subscription_id' => 1,
                'type' => 'feature_custom2',
                'key' => 'usage',
                'value' => '0',
            ),
            39 =>
            array (
                'id' => 40,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'type',
                'value' => 'string',
            ),
            40 =>
            array (
                'id' => 41,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'title',
                'value' => '25+ Languages',
            ),
            41 =>
            array (
                'id' => 42,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'description',
                'value' => NULL,
            ),
            42 =>
            array (
                'id' => 43,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'is_visible',
                'value' => '1',
            ),
            43 =>
            array (
                'id' => 44,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'status',
                'value' => 'Active',
            ),
            44 =>
            array (
                'id' => 45,
                'package_subscription_id' => 1,
                'type' => 'feature_custom3',
                'key' => 'usage',
                'value' => '0',
            ),
            45 =>
            array (
                'id' => 46,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'type',
                'value' => 'string',
            ),
            46 =>
            array (
                'id' => 47,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'title',
                'value' => 'Landing Page Generator',
            ),
            47 =>
            array (
                'id' => 48,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'description',
                'value' => NULL,
            ),
            48 =>
            array (
                'id' => 49,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'is_visible',
                'value' => '1',
            ),
            49 =>
            array (
                'id' => 50,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'status',
                'value' => 'Active',
            ),
            50 =>
            array (
                'id' => 51,
                'package_subscription_id' => 1,
                'type' => 'feature_custom4',
                'key' => 'usage',
                'value' => '0',
            ),
            51 =>
            array (
                'id' => 52,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'type',
                'value' => 'string',
            ),
            52 =>
            array (
                'id' => 53,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'title',
                'value' => '1-Click WordPress Export',
            ),
            53 =>
            array (
                'id' => 54,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'description',
                'value' => NULL,
            ),
            54 =>
            array (
                'id' => 55,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'is_visible',
                'value' => '1',
            ),
            55 =>
            array (
                'id' => 56,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'status',
                'value' => 'Active',
            ),
            56 =>
            array (
                'id' => 57,
                'package_subscription_id' => 1,
                'type' => 'feature_custom5',
                'key' => 'usage',
                'value' => '0',
            ),
            57 =>
            array (
                'id' => 58,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'type',
                'value' => 'string',
            ),
            58 =>
            array (
                'id' => 59,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'title',
                'value' => 'Zapier Integration',
            ),
            59 =>
            array (
                'id' => 60,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'description',
                'value' => NULL,
            ),
            60 =>
            array (
                'id' => 61,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'is_visible',
                'value' => '1',
            ),
            61 =>
            array (
                'id' => 62,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'status',
                'value' => 'Active',
            ),
            62 =>
            array (
                'id' => 63,
                'package_subscription_id' => 1,
                'type' => 'feature_custom6',
                'key' => 'usage',
                'value' => '0',
            ),
            63 =>
            array (
                'id' => 64,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'type',
                'value' => 'string',
            ),
            64 =>
            array (
                'id' => 65,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'title',
                'value' => 'Browser extensions',
            ),
            65 =>
            array (
                'id' => 66,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'description',
                'value' => NULL,
            ),
            66 =>
            array (
                'id' => 67,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'is_visible',
                'value' => '1',
            ),
            67 =>
            array (
                'id' => 68,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'status',
                'value' => 'Active',
            ),
            68 =>
            array (
                'id' => 69,
                'package_subscription_id' => 1,
                'type' => 'feature_custom7',
                'key' => 'usage',
                'value' => '0',
            ),
            69 =>
            array (
                'id' => 70,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'type',
                'value' => 'string',
            ),
            70 =>
            array (
                'id' => 71,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'title',
                'value' => 'AI Article Writer',
            ),
            71 =>
            array (
                'id' => 72,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'description',
                'value' => NULL,
            ),
            72 =>
            array (
                'id' => 73,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'is_visible',
                'value' => '1',
            ),
            73 =>
            array (
                'id' => 74,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'status',
                'value' => 'Active',
            ),
            74 =>
            array (
                'id' => 75,
                'package_subscription_id' => 1,
                'type' => 'feature_custom8',
                'key' => 'usage',
                'value' => '0',
            ),
            75 =>
            array (
                'id' => 76,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'type',
                'value' => 'string',
            ),
            76 =>
            array (
                'id' => 77,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'title',
            'value' => 'Sonic Editor (Google Docs like Editor)',
            ),
            77 =>
            array (
                'id' => 78,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'description',
                'value' => NULL,
            ),
            78 =>
            array (
                'id' => 79,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'is_visible',
                'value' => '1',
            ),
            79 =>
            array (
                'id' => 80,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'status',
                'value' => 'Active',
            ),
            80 =>
            array (
                'id' => 81,
                'package_subscription_id' => 1,
                'type' => 'feature_custom9',
                'key' => 'usage',
                'value' => '0',
            ),
            81 =>
            array (
                'id' => 82,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'type',
                'value' => 'string',
            ),
            82 =>
            array (
                'id' => 83,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'title',
                'value' => 'API Access',
            ),
            83 =>
            array (
                'id' => 84,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'description',
                'value' => NULL,
            ),
            84 =>
            array (
                'id' => 85,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'is_visible',
                'value' => '1',
            ),
            85 =>
            array (
                'id' => 86,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'status',
                'value' => 'Active',
            ),
            86 =>
            array (
                'id' => 87,
                'package_subscription_id' => 1,
                'type' => 'feature_custom10',
                'key' => 'usage',
                'value' => '0',
            ),
            87 =>
            array (
                'id' => 88,
                'package_subscription_id' => 1,
                'type' => '',
                'key' => 'duration',
                'value' => NULL,
            ),
            88 =>
            array (
                'id' => 89,
                'package_subscription_id' => 1,
                'type' => '',
                'key' => 'trial',
                'value' => NULL,
            ),
            89 =>
            array (
                'id' => 90,
                'package_subscription_id' => 1,
                'type' => '',
                'key' => 'usecaseCategory',
                'value' => '["1","2","3","4","5","6","8","7","9"]',
            ),
            90 =>
            array (
                'id' => 91,
                'package_subscription_id' => 1,
                'type' => '',
                'key' => 'usecaseTemplate',
                'value' => '["blog-ideas-outlines","blog-post-writing","story-writing","google-ad-copy","facebook-ad-copy","keyword-generator","keyword-extractor","seo-meta-title-details","marketing-copy-strategies","landing-page-website-copy","amazon-product-outlines","product-description","product-reviews-responders","linkedin-profile-copy","personal-bio","email-writing","call-to-action","business-ideas-strategies","brand-name","tagline-headline","content-improver","content-rephrase","text-summarizer","cv-resume-cover-letter","job-description","company-description","questions-answers","interview-questions","aida-framework","pas-framework","explain-it-to-a-child","sms-notifications","tweet-generator","video-scripts","youtube-descriptions","youtube-ideas-outlines","poetry"]',
            ),
        ));


    }
}
