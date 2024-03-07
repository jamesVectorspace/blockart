<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_menus')->upsert([
            array (
                'name' => 'Tickets',
                'slug' => 'Ticket',
                'url' => 'ticket/list',
                'permission' => '{"permission":"Modules\\\\Ticket\\\\Http\\\\Controllers\\\\TicketController@index", "route_name":["admin.tickets", "admin.threadReply", "admin.threadEdit", "admin.threadPdf", "admin.threadCsv", "admin.threadAdd", "admin.changePriority"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            array (
                'name' => 'Add Ticket',
                'slug' => 'add-ticket',
                'url' => 'ticket/add',
                'permission' => '{"permission":"Modules\\\\Ticket\\\\Http\\\\Controllers\\\\TicketController@index", "route_name":["admin.threadAdd"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            array (
                'name' => 'All Ticket',
                'slug' => 'all-ticket',
                'url' => 'ticket/list',
                'permission' => '{"permission":"Modules\\\\Ticket\\\\Http\\\\Controllers\\\\TicketController@index", "route_name":["admin.tickets"], "menu_level":"1"}',
                'is_default' => 1,
            )
        ], 'slug');
    }
}
