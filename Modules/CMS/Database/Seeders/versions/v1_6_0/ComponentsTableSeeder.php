<?php

namespace Modules\CMS\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        $id = \DB::table('pages')->insertGetId(
            [
                'name' => 'Homepage',
                'slug' => 'homepage',
                'css' => NULL,
                'description' => '',
                'meta_title' => '',
                'meta_description' => '',
                'status' => 'Active',
                'type' => 'home',
                'layout' => 'default',
                'default' => 1,
            ]
        );

        \DB::table('components')->delete();
        
        \DB::table('components')->insert(array (
            0 => 
            array (
                'page_id' => $id,
                'layout_id' => 18,
                'level' => 1,
            ),
            1 => 
            array (
                'page_id' => $id,
                'layout_id' => 16,
                'level' => 2,
            ),
            2 => 
            array (
                'page_id' => $id,
                'layout_id' => 17,
                'level' => 3,
            ),
            3 => 
            array (
                'page_id' => $id,
                'layout_id' => 15,
                'level' => 4,
            ),
            4 => 
            array (
                'page_id' => $id,
                'layout_id' => 7,
                'level' => 5,
            ),
            5 => 
            array (
                'page_id' => $id,
                'layout_id' => 14,
                'level' => 6,
            ),
            6 => 
            array (
                'page_id' => $id,
                'layout_id' => 5,
                'level' => 7,
            ),
            7 => 
            array (
                'page_id' => $id,
                'layout_id' => 6,
                'level' => 8,
            ),
            8 => 
            array (
                'page_id' => $id,
                'layout_id' => 8,
                'level' => 9,
            ),
            9 => 
            array (
                'page_id' => $id,
                'layout_id' => 12,
                'level' => 10,
            ),
        ));
        
        
    }
}