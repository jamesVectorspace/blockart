<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
      $id = DB::table('menu_items')->insertGetId([
                'label' => 'Tickets',
                'link' => NULL,
                'params' => NULL,
                'is_default' => 1,
                'icon' => 'fas fa-ticket-alt',
                'parent' => 0,
                'sort' => 44,
                'class' => NULL,
                'menu' => 1,
                'depth' => 0,
                'is_custom_menu' => 0,
            ]);

      DB::table('menu_items')->insert([
            [
                'label' => 'Add Ticket', 
                'link' => 'ticket/add', 
                'params' => '{"permission":"Modules\\\\Ticket\\\\Http\\\\Controllers\\\\TicketController@add", "route_name":["admin.threadAdd"]}', 
                'is_default' => 1, 
                'icon' => NULL, 
                'parent' => $id,
                'sort' => 45, 
                'class' => NULL, 
                'menu' => 1, 
                'depth' => 1,
            ],
            
            [ 
                'label' => 'All Tickets', 
                'link' => 'ticket/list', 
                'params' => '{"permission":"Modules\\\\Ticket\\\\Http\\\\Controllers\\\\TicketController@index", "route_name":["admin.tickets", "admin.threadReply", "admin.threadEdit", "admin.threadPdf", "admin.changePriority"]}', 
                'is_default' => 1, 
                'icon' => NULL, 
                'parent' => $id, 
                'sort' => 46, 
                'class' => NULL, 
                'menu' => 1, 
                'depth' => 1,
            ],

        ]);

    }
}
