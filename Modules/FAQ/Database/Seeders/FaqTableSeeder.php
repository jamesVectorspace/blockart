<?php

namespace Modules\FAQ\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('faqs')->delete();

        \DB::table('faqs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Are there any hidden charges?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Are there any hidden charges?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Does Artifism read or write in other languages?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'Does Artifism read or write in other languages?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'Are there any hidden charges?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'Is the content from Artifism original?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'What are the available payment methods?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'Does Artifism read or write in other languages?',
                'layout_id' => 1,
                'description' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'status' => 'Active',
            ),
         ));
    }
}
