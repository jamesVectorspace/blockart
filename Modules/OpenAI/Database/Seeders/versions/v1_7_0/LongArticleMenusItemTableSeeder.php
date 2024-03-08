<?php

namespace Modules\OpenAI\Database\Seeders\versions\v1_7_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\MenuBuilder\Http\Models\MenuItems;

class LongArticleMenusItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resetDbMenu = MenuItems::where(['link' => 'articles', 'label' => 'Long Article', 'menu' => 1])->first();
        if ($resetDbMenu) {
            $resetDbMenu->update([
                'label' => 'Long Article',
                'link' => 'articles',
                'params' => '{"permission":"Modules\\\\OpenAI\\\\Http\\\\Controllers\\\\Admin\\\\LongArticleController@index","route_name":["admin.long_article.index", "admin.long_article.edit"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => 143,
                'sort' => 12,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0
         ]);
        } else {
            DB::table('menu_items')->insert([
                    'label' => 'Long Article',
                    'link' => 'articles',
                    'params' => '{"permission":"Modules\\\\OpenAI\\\\Http\\\\Controllers\\\\Admin\\\\LongArticleController@index","route_name":["admin.long_article.index", "admin.long_article.edit"]}',
                    'is_default' => 1,
                    'icon' => NULL,
                    'parent' => 143,
                    'sort' => 12,
                    'class' => NULL,
                    'menu' => 1,
                    'depth' => 1,
                    'is_custom_menu' => 0
                ]);
        }

    }
}
