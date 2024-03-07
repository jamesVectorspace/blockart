<?php

namespace Modules\CMS\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;

class ComponentPropertiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('component_properties')->delete();
        
        \DB::table('component_properties')->insert(array (
            0 => 
            array (
                'component_id' => 1,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            1 => 
            array (
                'component_id' => 1,
                'name' => 'bg_image_light',
                'type' => 'string',
                'value' => '20231206/6d5f7e134dcccb2d24bf9c1bdfe50390.png',
            ),
            2 => 
            array (
                'component_id' => 1,
                'name' => 'bg_image_dark',
                'type' => 'string',
                'value' => '20231206/e08dc47dbcfae42066aef937ae4c4bbb.png',
            ),
            3 => 
            array (
                'component_id' => 1,
                'name' => 'bg_image_light_mob',
                'type' => 'string',
                'value' => '20231206/530c02dad9d3e967990552078c9e804a.png',
            ),
            4 => 
            array (
                'component_id' => 1,
                'name' => 'bg_image_dark_mob',
                'type' => 'string',
                'value' => '20231206/a2fc369a55f48ae3b0c524b0e73c19e5.png',
            ),
            5 => 
            array (
                'component_id' => 1,
                'name' => 'bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            6 => 
            array (
                'component_id' => 1,
                'name' => 'bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            7 => 
            array (
                'component_id' => 1,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'Create Better Content with Less Effort.',
            ),
            8 => 
            array (
                'component_id' => 1,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'AI Powered',
            ),
            9 => 
            array (
                'component_id' => 1,
                'name' => 'slider',
                'type' => 'array',
                'value' => '[{"title":"Social Media Marketing"},{"title":"Content Improver"},{"title":"Video Script Writing"},{"title":"Landing Page Copy"},{"title":"Business Strategies"},{"title":"Blog & Email Writing"},{"title":"And So Much More"}]',
            ),
            10 => 
            array (
                'component_id' => 1,
                'name' => 'body',
                'type' => 'string',
                'value' => 'Write 10x faster, engage your audience & never struggle with the blank page again. The number 1 AI collaborative software you ever need.',
            ),
            11 => 
            array (
                'component_id' => 1,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            12 => 
            array (
                'component_id' => 1,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            13 => 
            array (
                'component_id' => 1,
                'name' => 'first_button',
                'type' => 'string',
                'value' => '1',
            ),
            14 => 
            array (
                'component_id' => 1,
                'name' => 'btn_name1',
                'type' => 'string',
                'value' => 'Get Started for Free',
            ),
            15 => 
            array (
                'component_id' => 1,
                'name' => 'btn_link1',
                'type' => 'string',
                'value' => 'registration',
            ),
            16 => 
            array (
                'component_id' => 1,
                'name' => 'btn_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            17 => 
            array (
                'component_id' => 1,
                'name' => 'btn_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            18 => 
            array (
                'component_id' => 1,
                'name' => 'btn_text_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            19 => 
            array (
                'component_id' => 1,
                'name' => 'btn_text_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            20 => 
            array (
                'component_id' => 1,
                'name' => 'basic_link',
                'type' => 'string',
                'value' => '1',
            ),
            21 => 
            array (
                'component_id' => 1,
                'name' => 'btn_name2',
                'type' => 'string',
                'value' => 'Learn More',
            ),
            22 => 
            array (
                'component_id' => 1,
                'name' => 'btn_link2',
                'type' => 'string',
                'value' => 'page/about-us',
            ),
            23 => 
            array (
                'component_id' => 1,
                'name' => 'btn_text_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            24 => 
            array (
                'component_id' => 1,
                'name' => 'btn_text_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            25 => 
            array (
                'component_id' => 1,
                'name' => 'float_image',
                'type' => 'string',
                'value' => '1',
            ),
            26 => 
            array (
                'component_id' => 1,
                'name' => 'image',
                'type' => 'string',
                'value' => '20231206/1fa6596b55f481a903717d1d3ab7353b.png',
            ),
            27 => 
            array (
                'component_id' => 1,
                'name' => 'mob_image',
                'type' => 'string',
                'value' => '20231206/4c2d7dfae083fcd93701806ae8fdb775.png',
            ),
            28 => 
            array (
                'component_id' => 1,
                'name' => 'display_icon',
                'type' => 'string',
                'value' => '1',
            ),
            29 => 
            array (
                'component_id' => 2,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            30 => 
            array (
                'component_id' => 2,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '20231206/a94420f73c6d5a063572ef63dda3517e.png',
            ),
            31 => 
            array (
                'component_id' => 2,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '20231206/a94420f73c6d5a063572ef63dda3517e.png',
            ),
            32 => 
            array (
                'component_id' => 2,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            33 => 
            array (
                'component_id' => 2,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            34 => 
            array (
                'component_id' => 2,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'ARTIFICIAL INTELLIGENCE',
            ),
            35 => 
            array (
                'component_id' => 2,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Generate Quality Content Effortlessly',
            ),
            36 => 
            array (
                'component_id' => 2,
                'name' => 'body',
                'type' => 'string',
                'value' => 'Artifism is the ultimate AI-powered content-generating tool to help you quickly create high-quality content that requires minimal effort, time, and cost.',
            ),
            37 => 
            array (
                'component_id' => 2,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            38 => 
            array (
                'component_id' => 2,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            39 => 
            array (
                'component_id' => 2,
                'name' => 'first_block',
                'type' => 'string',
                'value' => '1',
            ),
            40 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            41 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            42 => 
            array (
                'component_id' => 2,
                'name' => 'first_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            43 => 
            array (
                'component_id' => 2,
                'name' => 'first_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            44 => 
            array (
                'component_id' => 2,
                'name' => 'border_width',
                'type' => 'string',
                'value' => '',
            ),
            45 => 
            array (
                'component_id' => 2,
                'name' => 'border_style',
                'type' => 'string',
                'value' => '',
            ),
            46 => 
            array (
                'component_id' => 2,
                'name' => 'border_color',
                'type' => 'string',
                'value' => '',
            ),
            47 => 
            array (
                'component_id' => 2,
                'name' => 'block1_heading',
                'type' => 'string',
                'value' => 'Let AI do all the magic for you',
            ),
            48 => 
            array (
                'component_id' => 2,
                'name' => 'block1_body',
                'type' => 'string',
                'value' => 'Unlock the power of AI with our cutting-edge technology that help you generate well-crafted and joyfully original content effortlessly.',
            ),
            49 => 
            array (
                'component_id' => 2,
                'name' => 'block1_second_body',
                'type' => 'string',
                'value' => ' Our AI knows what converts and how to create content that resonates with your audience.',
            ),
            50 => 
            array (
                'component_id' => 2,
                'name' => 'image_light_mode',
                'type' => 'string',
                'value' => '20231206/f74a2b62c65012b6d5ab5d2b0ad316c7.png',
            ),
            51 => 
            array (
                'component_id' => 2,
                'name' => 'second_block',
                'type' => 'string',
                'value' => '1',
            ),
            52 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            53 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            54 => 
            array (
                'component_id' => 2,
                'name' => 'second_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            55 => 
            array (
                'component_id' => 2,
                'name' => 'second_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            56 => 
            array (
                'component_id' => 2,
                'name' => 'border_width2',
                'type' => 'string',
                'value' => '',
            ),
            57 => 
            array (
                'component_id' => 2,
                'name' => 'border_style2',
                'type' => 'string',
                'value' => '',
            ),
            58 => 
            array (
                'component_id' => 2,
                'name' => 'border_color2',
                'type' => 'string',
                'value' => '',
            ),
            59 => 
            array (
                'component_id' => 2,
                'name' => 'block2_heading',
                'type' => 'string',
                'value' => 'Save Time and Money',
            ),
            60 => 
            array (
                'component_id' => 2,
                'name' => 'block2_body',
                'type' => 'string',
                'value' => 'Save time and money with our automated system that empowers you to cut down your expenses while still getting great results.',
            ),
            61 => 
            array (
                'component_id' => 2,
                'name' => 'third_block',
                'type' => 'string',
                'value' => '1',
            ),
            62 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_light3',
                'type' => 'string',
                'value' => '',
            ),
            63 => 
            array (
                'component_id' => 2,
                'name' => 'bg_color_dark3',
                'type' => 'string',
                'value' => '',
            ),
            64 => 
            array (
                'component_id' => 2,
                'name' => 'third_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            65 => 
            array (
                'component_id' => 2,
                'name' => 'third_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            66 => 
            array (
                'component_id' => 2,
                'name' => 'border_width3',
                'type' => 'string',
                'value' => '',
            ),
            67 => 
            array (
                'component_id' => 2,
                'name' => 'border_style3',
                'type' => 'string',
                'value' => '',
            ),
            68 => 
            array (
                'component_id' => 2,
                'name' => 'border_color3',
                'type' => 'string',
                'value' => '',
            ),
            69 => 
            array (
                'component_id' => 2,
                'name' => 'image_light_mode3',
                'type' => 'string',
                'value' => '20231206/f0393e53ce18ff73add04126b8a22270.png',
            ),
            70 => 
            array (
                'component_id' => 2,
                'name' => 'block3_heading',
                'type' => 'string',
                'value' => 'The <span style="color:#E22861;">Only</span> Artificial Intelligence Service you ever need',
            ),
            71 => 
            array (
                'component_id' => 2,
                'name' => 'block3_body',
                'type' => 'string',
                'value' => 'Intuitive interface and minimal learning curve make Artifism the ideal choice for anyone who needs to write content quickly without sacrificing quality and reach your milestones 10X faster!',
            ),
            72 => 
            array (
                'component_id' => 2,
                'name' => 'block3_second_body',
                'type' => 'string',
                'value' => ' Artifism is built to focus and create human-like content that helps you generate engaging content and ideas for blogs, applications, social media, videos, digital art, SEO, and much more.',
            ),
            73 => 
            array (
                'component_id' => 2,
                'name' => 'btn_name',
                'type' => 'string',
                'value' => 'Learn more about us',
            ),
            74 => 
            array (
                'component_id' => 2,
                'name' => 'btn_link',
                'type' => 'string',
                'value' => 'page/about-us',
            ),
            75 => 
            array (
                'component_id' => 2,
                'name' => 'btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            76 => 
            array (
                'component_id' => 2,
                'name' => 'btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            77 => 
            array (
                'component_id' => 2,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            78 => 
            array (
                'component_id' => 3,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            79 => 
            array (
                'component_id' => 3,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '',
            ),
            80 => 
            array (
                'component_id' => 3,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '',
            ),
            81 => 
            array (
                'component_id' => 3,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            82 => 
            array (
                'component_id' => 3,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            83 => 
            array (
                'component_id' => 3,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'READY MADE TEMPLATES',
            ),
            84 => 
            array (
                'component_id' => 3,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Think Less. Save Time. Use Cases.',
            ),
            85 => 
            array (
                'component_id' => 3,
                'name' => 'body',
                'type' => 'string',
                'value' => ' Our use case templates save up your time and make your work much more easier.',
            ),
            86 => 
            array (
                'component_id' => 3,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            87 => 
            array (
                'component_id' => 3,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            88 => 
            array (
                'component_id' => 3,
                'name' => 'first_block',
                'type' => 'string',
                'value' => '1',
            ),
            89 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            90 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            91 => 
            array (
                'component_id' => 3,
                'name' => 'first_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            92 => 
            array (
                'component_id' => 3,
                'name' => 'first_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            93 => 
            array (
                'component_id' => 3,
                'name' => 'border_width',
                'type' => 'string',
                'value' => '',
            ),
            94 => 
            array (
                'component_id' => 3,
                'name' => 'border_style',
                'type' => 'string',
                'value' => '',
            ),
            95 => 
            array (
                'component_id' => 3,
                'name' => 'border_color',
                'type' => 'string',
                'value' => '',
            ),
            96 => 
            array (
                'component_id' => 3,
                'name' => 'block1_heading',
                'type' => 'string',
                'value' => 'Over <span style="color:#E22861;">38</span> Use Case Templates',
            ),
            97 => 
            array (
                'component_id' => 3,
                'name' => 'block1_body',
                'type' => 'string',
                'value' => 'Our Use Cases help you quickly and easily create high-efficiency, human-friendly content for applications and social media, scripts for videos, boost SEO, and generate digital art – all at a fraction of the cost and in one place!',
            ),
            98 => 
            array (
                'component_id' => 3,
                'name' => 'image_light_mode',
                'type' => 'string',
                'value' => '20231206/d79a61654674c81e0dc1501a97e23372.png',
            ),
            99 => 
            array (
                'component_id' => 3,
                'name' => 'image_dark_mode',
                'type' => 'string',
                'value' => '20231206/d53b3e3df2b5786d65564a61acd732ad.png',
            ),
            100 => 
            array (
                'component_id' => 3,
                'name' => 'floating_image_light_mode',
                'type' => 'string',
                'value' => '20231206/2634ae316f3414077b0aed1c2439e136.png',
            ),
            101 => 
            array (
                'component_id' => 3,
                'name' => 'floating_image_dark_mode',
                'type' => 'string',
                'value' => '20231206/aa19d13e9bbc81b3145bf1f3f5609c2e.png',
            ),
            102 => 
            array (
                'component_id' => 3,
                'name' => 'block1_btn_name',
                'type' => 'string',
                'value' => 'See all use cases',
            ),
            103 => 
            array (
                'component_id' => 3,
                'name' => 'block1_btn_link',
                'type' => 'string',
                'value' => 'use-cases',
            ),
            104 => 
            array (
                'component_id' => 3,
                'name' => 'block1_btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            105 => 
            array (
                'component_id' => 3,
                'name' => 'block1_btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            106 => 
            array (
                'component_id' => 3,
                'name' => 'second_block',
                'type' => 'string',
                'value' => '1',
            ),
            107 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            108 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            109 => 
            array (
                'component_id' => 3,
                'name' => 'second_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            110 => 
            array (
                'component_id' => 3,
                'name' => 'second_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            111 => 
            array (
                'component_id' => 3,
                'name' => 'border_width2',
                'type' => 'string',
                'value' => '',
            ),
            112 => 
            array (
                'component_id' => 3,
                'name' => 'border_style2',
                'type' => 'string',
                'value' => '',
            ),
            113 => 
            array (
                'component_id' => 3,
                'name' => 'border_color2',
                'type' => 'string',
                'value' => '',
            ),
            114 => 
            array (
                'component_id' => 3,
                'name' => 'block2_heading',
                'type' => 'string',
                'value' => 'Be the King of Content.',
            ),
            115 => 
            array (
                'component_id' => 3,
                'name' => 'block2_body',
                'type' => 'string',
                'value' => ' You give a few instructions and our trained AI will do all the hassle for you.',
            ),
            116 => 
            array (
                'component_id' => 3,
                'name' => 'image_light_mode2',
                'type' => 'string',
                'value' => '20231206/d1410b52fed9fd0f05d8938d35f1819e.png',
            ),
            117 => 
            array (
                'component_id' => 3,
                'name' => 'third_block',
                'type' => 'string',
                'value' => '1',
            ),
            118 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_light3',
                'type' => 'string',
                'value' => '',
            ),
            119 => 
            array (
                'component_id' => 3,
                'name' => 'bg_color_dark3',
                'type' => 'string',
                'value' => '',
            ),
            120 => 
            array (
                'component_id' => 3,
                'name' => 'third_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            121 => 
            array (
                'component_id' => 3,
                'name' => 'third_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            122 => 
            array (
                'component_id' => 3,
                'name' => 'border_width3',
                'type' => 'string',
                'value' => '',
            ),
            123 => 
            array (
                'component_id' => 3,
                'name' => 'border_style3',
                'type' => 'string',
                'value' => '',
            ),
            124 => 
            array (
                'component_id' => 3,
                'name' => 'border_color3',
                'type' => 'string',
                'value' => '',
            ),
            125 => 
            array (
                'component_id' => 3,
                'name' => 'step',
                'type' => 'array',
                'value' => '[{"title":"STEP 1","description":"Select Use Case Template"},{"title":"STEP 2","description":"Enter specific keywords and see the magic!"},{"title":"STEP 3","description":"Content is ready! You can create, edit or update."}]',
            ),
            126 => 
            array (
                'component_id' => 3,
                'name' => 'image_light_mode3',
                'type' => 'string',
                'value' => '20231206/7e2983395853e80fc241d39587a814e8.png',
            ),
            127 => 
            array (
                'component_id' => 3,
                'name' => 'forth_block',
                'type' => 'string',
                'value' => '1',
            ),
            128 => 
            array (
                'component_id' => 3,
                'name' => 'content',
                'type' => 'array',
                'value' => '[{"icon_light":"20231206/5f3d473fb049f7f6045bf6811cb00ec1.svg","title":"No more human error"},{"icon_light":"20231206/1abc1c43fdc1125632c0405d89ebbd75.svg","title":"Publish content 10X faster"},{"icon_light":"20231206/c9425cf2b8fd125b11e515d63e02c804.svg","title":"Boost sales with better copy"}]',
            ),
            129 => 
            array (
                'component_id' => 3,
                'name' => 'block4_heading',
                'type' => 'string',
                'value' => 'Start your free trial today and witness the magic!',
            ),
            130 => 
            array (
                'component_id' => 3,
                'name' => 'block4_body',
                'type' => 'string',
                'value' => ' No credit card is required.',
            ),
            131 => 
            array (
                'component_id' => 3,
                'name' => 'forth_block_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            132 => 
            array (
                'component_id' => 3,
                'name' => 'forth_block_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            133 => 
            array (
                'component_id' => 3,
                'name' => 'btn_name',
                'type' => 'string',
                'value' => 'Get Started for Free',
            ),
            134 => 
            array (
                'component_id' => 3,
                'name' => 'btn_link',
                'type' => 'string',
                'value' => 'registration',
            ),
            135 => 
            array (
                'component_id' => 3,
                'name' => 'btn_color_light',
                'type' => 'string',
                'value' => '',
            ),
            136 => 
            array (
                'component_id' => 3,
                'name' => 'btn_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            137 => 
            array (
                'component_id' => 3,
                'name' => 'btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            138 => 
            array (
                'component_id' => 3,
                'name' => 'btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            139 => 
            array (
                'component_id' => 3,
                'name' => 'border_width4',
                'type' => 'string',
                'value' => '',
            ),
            140 => 
            array (
                'component_id' => 3,
                'name' => 'border_style4',
                'type' => 'string',
                'value' => '',
            ),
            141 => 
            array (
                'component_id' => 3,
                'name' => 'border_color4',
                'type' => 'string',
                'value' => '',
            ),
            142 => 
            array (
                'component_id' => 3,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            143 => 
            array (
                'component_id' => 4,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            144 => 
            array (
                'component_id' => 4,
                'name' => 'bg_image_light',
                'type' => 'string',
                'value' => '20231206/0a8a47f13ec69c1ec1bcac39ac343773.png',
            ),
            145 => 
            array (
                'component_id' => 4,
                'name' => 'bg_image_dark',
                'type' => 'string',
                'value' => '20231206/b75521158893bdeec4ed5897175a9a92.png',
            ),
            146 => 
            array (
                'component_id' => 4,
                'name' => 'mob_bg_image_light',
                'type' => 'string',
                'value' => '20231206/ba09136613027ea56404986b2901f967.png',
            ),
            147 => 
            array (
                'component_id' => 4,
                'name' => 'mob_bg_image_dark',
                'type' => 'string',
                'value' => '20231206/4c7cb0c9b8e582dd8f88082e71dd263b.png',
            ),
            148 => 
            array (
                'component_id' => 4,
                'name' => 'bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            149 => 
            array (
                'component_id' => 4,
                'name' => 'bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            150 => 
            array (
                'component_id' => 4,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'IMAGE GENERATOR',
            ),
            151 => 
            array (
                'component_id' => 4,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Generate Digital Arts Like Never Before',
            ),
            152 => 
            array (
                'component_id' => 4,
                'name' => 'body',
                'type' => 'string',
                'value' => 'Create AI art or images from text that turns your imagination into unique images in seconds. Finally, you\'ll have the perfect picture to match your message.',
            ),
            153 => 
            array (
                'component_id' => 4,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            154 => 
            array (
                'component_id' => 4,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            155 => 
            array (
                'component_id' => 4,
                'name' => 'outline',
                'type' => 'array',
                'value' => '[{"title":"Various Resulation"},{"title":"Royality-free commercial use"},{"title":"No watermark"}]',
            ),
            156 => 
            array (
                'component_id' => 4,
                'name' => 'feature_slider_block',
                'type' => 'string',
                'value' => '1',
            ),
            157 => 
            array (
                'component_id' => 4,
                'name' => 'feature_slider',
                'type' => 'array',
                'value' => '[{"image":"20231206/9678b04cf2a8f2acab8218849b4c86a3.png"},{"image":"20231206/5f57072d18b1ef5eb6944ce21894e9d2.png"},{"image":"20231206/ef503ae5c2b4ef9f2fa2e4549aff9584.png"},{"image":"20231206/7a31006bdfd11434a3cc6d2264607d5b.png"},{"image":"20231206/9e2794e13e5a84bc4746e3d3e74251ae.png"}]',
            ),
            158 => 
            array (
                'component_id' => 4,
                'name' => 'default_slider_block',
                'type' => 'string',
                'value' => '1',
            ),
            159 => 
            array (
                'component_id' => 4,
                'name' => 'default_slider',
                'type' => 'array',
                'value' => '[{"image":"20231206/5415e032da3c25d121bad2011043cff7.png"},{"image":"20231206/4ed0c8417b3d1e5a2dae389a3456b334.png"},{"image":"20231206/706834b54dd60510c2b3578e1ed08bfc.png"},{"image":"20231206/eec361e16599c8301c84c065b75fe010.png"},{"image":"20231206/c666b9e6ed564ae7ccf01bbebf899f2e.png"},{"image":"20231206/c2cf9d978aaabc534f078d235fa14139.png"},{"image":"20231206/e48e4e02cbb94d424f2de0f7abba7db7.png"},{"image":"20231206/6dbb9fed6c5d243c196a98601a75585d.png"},{"image":"20231206/e30a4408f3463ec6629ba5e17a2fc552.png"}]',
            ),
            160 => 
            array (
                'component_id' => 4,
                'name' => 'first_button',
                'type' => 'string',
                'value' => '1',
            ),
            161 => 
            array (
                'component_id' => 4,
                'name' => 'btn_name1',
                'type' => 'string',
                'value' => 'Watch Demo',
            ),
            162 => 
            array (
                'component_id' => 4,
                'name' => 'btn_link1',
                'type' => 'string',
                'value' => 'https:/www.youtube.com/watch?v=qTgPSKKjfVg',
            ),
            163 => 
            array (
                'component_id' => 4,
                'name' => 'btn_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            164 => 
            array (
                'component_id' => 4,
                'name' => 'btn_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            165 => 
            array (
                'component_id' => 4,
                'name' => 'btn_text_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            166 => 
            array (
                'component_id' => 4,
                'name' => 'btn_text_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            167 => 
            array (
                'component_id' => 4,
                'name' => 'second_button',
                'type' => 'string',
                'value' => '1',
            ),
            168 => 
            array (
                'component_id' => 4,
                'name' => 'btn_name2',
                'type' => 'string',
                'value' => 'Learn More',
            ),
            169 => 
            array (
                'component_id' => 4,
                'name' => 'btn_link2',
                'type' => 'string',
                'value' => 'page/about-us',
            ),
            170 => 
            array (
                'component_id' => 4,
                'name' => 'btn_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            171 => 
            array (
                'component_id' => 4,
                'name' => 'btn_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            172 => 
            array (
                'component_id' => 4,
                'name' => 'btn_text_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            173 => 
            array (
                'component_id' => 4,
                'name' => 'btn_text_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            174 => 
            array (
                'component_id' => 4,
                'name' => 'border_width2',
                'type' => 'string',
                'value' => '',
            ),
            175 => 
            array (
                'component_id' => 4,
                'name' => 'border_style2',
                'type' => 'string',
                'value' => '',
            ),
            176 => 
            array (
                'component_id' => 4,
                'name' => 'border_color2',
                'type' => 'string',
                'value' => '',
            ),
            177 => 
            array (
                'component_id' => 4,
                'name' => 'mt',
                'type' => 'string',
                'value' => '',
            ),
            178 => 
            array (
                'component_id' => 4,
                'name' => 'mb',
                'type' => 'string',
                'value' => '',
            ),
            179 => 
            array (
                'component_id' => 5,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            180 => 
            array (
                'component_id' => 5,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '20231206/1f9b9fe55d960b0854fce0757b4d9639.png',
            ),
            181 => 
            array (
                'component_id' => 5,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '20231206/1f9b9fe55d960b0854fce0757b4d9639.png',
            ),
            182 => 
            array (
                'component_id' => 5,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            183 => 
            array (
                'component_id' => 5,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            184 => 
            array (
                'component_id' => 5,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Collaborated With Industry Leaders',
            ),
            185 => 
            array (
                'component_id' => 5,
                'name' => 'body',
                'type' => 'string',
                'value' => ' Thousands of marketers, agencies, and entrepreneurs choose Artifism to automate and simplify their content marketing.',
            ),
            186 => 
            array (
                'component_id' => 5,
                'name' => 'brand',
                'type' => 'array',
                'value' => '[{"light_logo":"20231206/780eabea4d52188a109ca419a2efa503.svg","dark_logo":"20231206/7bf15bba56e2917093707576728be604.svg"},{"light_logo":"20231206/25ac749aaaf607179d97f0bc700f70da.svg","dark_logo":"20231206/e27dc78dd9b87c189c330ae92c0339f3.svg"},{"light_logo":"20231206/23c5ac6d472eec3e9dcc5bea6f100b08.svg","dark_logo":"20231206/2af1fcb36ddf02941a64f7b2d698aca3.svg"},{"light_logo":"20231206/ab65d2d9f3835024ee9a110327c8b452.svg","dark_logo":"20231206/cfcbaeb9421b0c639e017fe16c136c40.svg"},{"light_logo":"20231206/26095ea6d2b67e714112c5c681cfa581.svg","dark_logo":"20231206/f2e1f483961ad25daa1048b605b605f6.svg"}]',
            ),
            187 => 
            array (
                'component_id' => 5,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            188 => 
            array (
                'component_id' => 5,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            189 => 
            array (
                'component_id' => 5,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            190 => 
            array (
                'component_id' => 6,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            191 => 
            array (
                'component_id' => 6,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '',
            ),
            192 => 
            array (
                'component_id' => 6,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '',
            ),
            193 => 
            array (
                'component_id' => 6,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            194 => 
            array (
                'component_id' => 6,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            195 => 
            array (
                'component_id' => 6,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'PRICING',
            ),
            196 => 
            array (
                'component_id' => 6,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Subscription Plans',
            ),
            197 => 
            array (
                'component_id' => 6,
                'name' => 'body',
                'type' => 'string',
                'value' => 'We offer flexible pricing plans so everyone can find one that suits their needs. Check out our pricing table for more information about our features and services.',
            ),
            198 => 
            array (
                'component_id' => 6,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            199 => 
            array (
                'component_id' => 6,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            200 => 
            array (
                'component_id' => 6,
                'name' => 'plan_btn_name',
                'type' => 'string',
                'value' => 'Subscription',
            ),
            201 => 
            array (
                'component_id' => 6,
                'name' => 'credit_btn_name',
                'type' => 'string',
                'value' => 'Credit',
            ),
            202 => 
            array (
                'component_id' => 6,
                'name' => 'btn_color_light',
                'type' => 'string',
                'value' => '',
            ),
            203 => 
            array (
                'component_id' => 6,
                'name' => 'btn_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            204 => 
            array (
                'component_id' => 6,
                'name' => 'btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            205 => 
            array (
                'component_id' => 6,
                'name' => 'btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            206 => 
            array (
                'component_id' => 6,
                'name' => 'plan_type',
                'type' => 'string',
                'value' => 'latestPlans',
            ),
            207 => 
            array (
                'component_id' => 6,
                'name' => 'plan_limit',
                'type' => 'string',
                'value' => '3',
            ),
            208 => 
            array (
                'component_id' => 6,
                'name' => 'plan_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            209 => 
            array (
                'component_id' => 6,
                'name' => 'plan_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            210 => 
            array (
                'component_id' => 6,
                'name' => 'plan_btn_color_light',
                'type' => 'string',
                'value' => '',
            ),
            211 => 
            array (
                'component_id' => 6,
                'name' => 'plan_btn_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            212 => 
            array (
                'component_id' => 6,
                'name' => 'plan_btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            213 => 
            array (
                'component_id' => 6,
                'name' => 'plan_btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            214 => 
            array (
                'component_id' => 6,
                'name' => 'credit_type',
                'type' => 'string',
                'value' => 'latestCredits',
            ),
            215 => 
            array (
                'component_id' => 6,
                'name' => 'credit_limit',
                'type' => 'string',
                'value' => '3',
            ),
            216 => 
            array (
                'component_id' => 6,
                'name' => 'credit_text_color_light_head',
                'type' => 'string',
                'value' => '',
            ),
            217 => 
            array (
                'component_id' => 6,
                'name' => 'credit_text_color_dark_head',
                'type' => 'string',
                'value' => '',
            ),
            218 => 
            array (
                'component_id' => 6,
                'name' => 'credit_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            219 => 
            array (
                'component_id' => 6,
                'name' => 'credit_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            220 => 
            array (
                'component_id' => 6,
                'name' => 'credit_btn_color_light',
                'type' => 'string',
                'value' => '',
            ),
            221 => 
            array (
                'component_id' => 6,
                'name' => 'credit_btn_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            222 => 
            array (
                'component_id' => 6,
                'name' => 'credit_btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            223 => 
            array (
                'component_id' => 6,
                'name' => 'credit_btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            224 => 
            array (
                'component_id' => 6,
                'name' => 'mt',
                'type' => 'string',
                'value' => '',
            ),
            225 => 
            array (
                'component_id' => 6,
                'name' => 'mb',
                'type' => 'string',
                'value' => '',
            ),
            226 => 
            array (
                'component_id' => 7,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            227 => 
            array (
                'component_id' => 7,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '',
            ),
            228 => 
            array (
                'component_id' => 7,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '',
            ),
            229 => 
            array (
                'component_id' => 7,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            230 => 
            array (
                'component_id' => 7,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            231 => 
            array (
                'component_id' => 7,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'CUSTOMER REVIEWS',
            ),
            232 => 
            array (
                'component_id' => 7,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Used By Millions Around The Globe',
            ),
            233 => 
            array (
                'component_id' => 7,
                'name' => 'body',
                'type' => 'string',
                'value' => ' See what other people are saying about Artifism and be a part of it.',
            ),
            234 => 
            array (
                'component_id' => 7,
                'name' => 'review_type',
                'type' => 'string',
                'value' => 'latestReviews',
            ),
            235 => 
            array (
                'component_id' => 7,
                'name' => 'reviews',
                'type' => 'array',
                'value' => '["1"]',
            ),
            236 => 
            array (
                'component_id' => 7,
                'name' => 'review_limit',
                'type' => 'string',
                'value' => '8',
            ),
            237 => 
            array (
                'component_id' => 7,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            238 => 
            array (
                'component_id' => 7,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            239 => 
            array (
                'component_id' => 7,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            240 => 
            array (
                'component_id' => 8,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            241 => 
            array (
                'component_id' => 8,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '20231206/249342f82d4838a1f550384dce163518.png',
            ),
            242 => 
            array (
                'component_id' => 8,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '20231206/249342f82d4838a1f550384dce163518.png',
            ),
            243 => 
            array (
                'component_id' => 8,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            244 => 
            array (
                'component_id' => 8,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            245 => 
            array (
                'component_id' => 8,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'BEFORE YOU BEGIN',
            ),
            246 => 
            array (
                'component_id' => 8,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Frequently Asked Questions',
            ),
            247 => 
            array (
                'component_id' => 8,
                'name' => 'body',
                'type' => 'string',
                'value' => ' See what other people are asking about Artifism and be a part of it.',
            ),
            248 => 
            array (
                'component_id' => 8,
                'name' => 'faq_type',
                'type' => 'string',
                'value' => 'latestFaqs',
            ),
            249 => 
            array (
                'component_id' => 8,
                'name' => 'faq_limit',
                'type' => 'string',
                'value' => '8',
            ),
            250 => 
            array (
                'component_id' => 8,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            251 => 
            array (
                'component_id' => 8,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            252 => 
            array (
                'component_id' => 8,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            253 => 
            array (
                'component_id' => 9,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            254 => 
            array (
                'component_id' => 9,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '',
            ),
            255 => 
            array (
                'component_id' => 9,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '',
            ),
            256 => 
            array (
                'component_id' => 9,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            257 => 
            array (
                'component_id' => 9,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            258 => 
            array (
                'component_id' => 9,
                'name' => 'overline',
                'type' => 'string',
                'value' => 'LATEST NEWS',
            ),
            259 => 
            array (
                'component_id' => 9,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Stay Updated With Our Activities',
            ),
            260 => 
            array (
                'component_id' => 9,
                'name' => 'blog_button',
                'type' => 'string',
                'value' => '1',
            ),
            261 => 
            array (
                'component_id' => 9,
                'name' => 'btn_name',
                'type' => 'string',
                'value' => 'Head to all blogs',
            ),
            262 => 
            array (
                'component_id' => 9,
                'name' => 'btn_link',
                'type' => 'string',
                'value' => 'blogs',
            ),
            263 => 
            array (
                'component_id' => 9,
                'name' => 'btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            264 => 
            array (
                'component_id' => 9,
                'name' => 'btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            265 => 
            array (
                'component_id' => 9,
                'name' => 'blog_type',
                'type' => 'string',
                'value' => 'latestBlogs',
            ),
            266 => 
            array (
                'component_id' => 9,
                'name' => 'blog_limit',
                'type' => 'string',
                'value' => '10',
            ),
            267 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_body',
                'type' => 'string',
                'value' => 'Subscribe to our newsletters and stay updated about our activities and much more. No spam, we promise.',
            ),
            268 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_button',
                'type' => 'string',
                'value' => '1',
            ),
            269 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_btn_name',
                'type' => 'string',
                'value' => 'Subscribe',
            ),
            270 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_btn_color_light',
                'type' => 'string',
                'value' => '',
            ),
            271 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_btn_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            272 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_btn_text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            273 => 
            array (
                'component_id' => 9,
                'name' => 'newsletter_btn_text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            274 => 
            array (
                'component_id' => 9,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            275 => 
            array (
                'component_id' => 9,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            276 => 
            array (
                'component_id' => 9,
                'name' => 'pt_y',
                'type' => 'string',
                'value' => '',
            ),
            277 => 
            array (
                'component_id' => 10,
                'name' => 'background_type',
                'type' => 'string',
                'value' => 'backgroundImage',
            ),
            278 => 
            array (
                'component_id' => 10,
                'name' => 'main_bg_image_light',
                'type' => 'string',
                'value' => '20231206/80d11c9b6687bfefa68b236d8a5665a7.png',
            ),
            279 => 
            array (
                'component_id' => 10,
                'name' => 'main_bg_image_dark',
                'type' => 'string',
                'value' => '20231206/80d11c9b6687bfefa68b236d8a5665a7.png',
            ),
            280 => 
            array (
                'component_id' => 10,
                'name' => 'main_bg_color_light',
                'type' => 'string',
                'value' => '',
            ),
            281 => 
            array (
                'component_id' => 10,
                'name' => 'main_bg_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            282 => 
            array (
                'component_id' => 10,
                'name' => 'heading',
                'type' => 'string',
                'value' => 'Harmony with machines beyond <span style="color:#E22861;"> imagination.</span>',
            ),
            283 => 
            array (
                'component_id' => 10,
                'name' => 'body',
                'type' => 'string',
                'value' => 'Explore Artifism for free to see the potential and how it can help to autopilot the content creation process.',
            ),
            284 => 
            array (
                'component_id' => 10,
                'name' => 'image',
                'type' => 'string',
                'value' => '20231206/f4ecc96b70f326e8d042a44a0f4ff5a9.png',
            ),
            285 => 
            array (
                'component_id' => 10,
                'name' => 'text_color_light',
                'type' => 'string',
                'value' => '',
            ),
            286 => 
            array (
                'component_id' => 10,
                'name' => 'text_color_dark',
                'type' => 'string',
                'value' => '',
            ),
            287 => 
            array (
                'component_id' => 10,
                'name' => 'first_button',
                'type' => 'string',
                'value' => '1',
            ),
            288 => 
            array (
                'component_id' => 10,
                'name' => 'btn_name1',
                'type' => 'string',
                'value' => 'Register Now',
            ),
            289 => 
            array (
                'component_id' => 10,
                'name' => 'btn_link1',
                'type' => 'string',
                'value' => 'registration',
            ),
            290 => 
            array (
                'component_id' => 10,
                'name' => 'btn_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            291 => 
            array (
                'component_id' => 10,
                'name' => 'btn_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            292 => 
            array (
                'component_id' => 10,
                'name' => 'btn_text_color_light1',
                'type' => 'string',
                'value' => '',
            ),
            293 => 
            array (
                'component_id' => 10,
                'name' => 'btn_text_color_dark1',
                'type' => 'string',
                'value' => '',
            ),
            294 => 
            array (
                'component_id' => 10,
                'name' => 'second_button',
                'type' => 'string',
                'value' => '1',
            ),
            295 => 
            array (
                'component_id' => 10,
                'name' => 'btn_name2',
                'type' => 'string',
                'value' => 'See Princing',
            ),
            296 => 
            array (
                'component_id' => 10,
                'name' => 'btn_link2',
                'type' => 'string',
                'value' => 'pricing',
            ),
            297 => 
            array (
                'component_id' => 10,
                'name' => 'btn_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            298 => 
            array (
                'component_id' => 10,
                'name' => 'btn_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            299 => 
            array (
                'component_id' => 10,
                'name' => 'btn_text_color_light2',
                'type' => 'string',
                'value' => '',
            ),
            300 => 
            array (
                'component_id' => 10,
                'name' => 'btn_text_color_dark2',
                'type' => 'string',
                'value' => '',
            ),
            301 => 
            array (
                'component_id' => 10,
                'name' => 'mt',
                'type' => 'string',
                'value' => '',
            ),
            302 => 
            array (
                'component_id' => 10,
                'name' => 'mb',
                'type' => 'string',
                'value' => '',
            ),
            303 => 
            array (
                'component_id' => 3,
                'name' => 'block1_second_body',
                'type' => 'string',
                'value' => 'You can also create a custom use case of your preferences and save it for future use.',
            ),
        ));
    }
}