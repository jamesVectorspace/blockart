<?php

namespace Modules\CMS\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;
use Modules\CMS\Entities\Layout;
use Modules\CMS\Entities\LayoutType;

class TemplateAndLayoutSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('layout_types')->delete();
        LayoutType::insert([

            [
                'id' => 3,
                'name' => 'Categories',
                'description' => 'Categories',
            ],
            [
                'id' => 4,
                'name' => 'Brands',
                'description' => 'Product Brands',
            ],
            [
                'id' => 5,
                'name' => 'Blogs',
                'description' => 'Blogs Layout',
            ],
            [
                'id' => 6,
                'name' => 'Extras',
                'description' => 'Information Box',
            ],
            [
                'id' => 7,
                'name' => 'Subscription Blocks',
                'description' => 'Different Blocks',
            ],
            [
                'id' => 8,
                'name' => 'Hero Blocks',
                'description' => 'Different Hero Sections',
            ]
        ]);

        \DB::table('layouts')->delete();
        Layout::insert([
            [
                'id' => 5,
                'layout_type_id' => 3,
                'name' => 'Review Block V1',
                'description' => 'Categories Block',
                'file' => 'review-template-v1',
                'image' => 'review-template-v1.png'
            ],
            [
                'id' => 6,
                'layout_type_id' => 3,
                'name' => 'FAQ Block V1',
                'description' => 'Categories Block',
                'file' => 'faq-template-v1',
                'image' => 'faq-template-v1.png'
            ],
            [
                'id' => 7,
                'layout_type_id' => 4,
                'name' => 'Brand Block',
                'description' => 'Brand Block',
                'file' => 'brands-template-v1',
                'image' => 'brands-template-v1.png'
            ],
            [
                'id' => 8,
                'layout_type_id' => 5,
                'name' => 'Blogs Grid',
                'description' => 'Blogs Grid',
                'file' => 'blogs-template-v1',
                'image' => 'blogs-template-v1.png'
            ],
            [
                'id' => 12,
                'layout_type_id' => 6,
                'name' => 'Footer Banner',
                'description' => 'Footer Banner',
                'file' => 'footer-banner-template-v1',
                'image' => 'footer-banner-template-v1.png'
            ],
            [
                'id' => 14,
                'layout_type_id' => 7,
                'name' => 'Subscription Plan',
                'description' => 'Subscription Plan',
                'file' => 'subscription-plan-template-v1',
                'image' => 'subscription-plan-template-v1.png'
            ],
            [
                'id' => 15,
                'layout_type_id' => 6,
                'name' => 'Image Generator',
                'description' => 'Image Generator',
                'file' => 'image-generator-template-v1',
                'image' => 'image-generator-template-v1.png'
            ],
            [
                'id' => 16,
                'layout_type_id' => 6,
                'name' => 'AI Template',
                'description' => 'AI Template',
                'file' => 'ai-template-v1',
                'image' => 'ai-template-v1.png'
            ],
            [
                'id' => 17,
                'layout_type_id' => 6,
                'name' => 'Ready Made Template',
                'description' => 'Ready Made Template',
                'file' => 'ready-made-template-v1',
                'image' => 'ready-made-template-v1.png'
            ],
            [
                'id' => 18,
                'layout_type_id' => 8,
                'name' => 'Hero Section',
                'description' => 'Hero Section',
                'file' => 'hero-template-v1',
                'image' => 'hero-template-v1.png'
            ],
            [
                'id' => 19,
                'layout_type_id' => 6,
                'name' => 'Custom Block',
                'description' => 'Custom Block',
                'file' => 'custom-block-template-v1',
                'image' => 'custom-block-template-v1.png'
            ],
        ]);
    }
}
