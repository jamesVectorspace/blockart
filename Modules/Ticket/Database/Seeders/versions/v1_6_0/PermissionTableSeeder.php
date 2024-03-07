<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $parentId = Permission::insertGetId([
            'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@index',
            'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
            'controller_name' => 'TicketController',
            'method_name' => 'index',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 1,
        ]);

        $parentId = Permission::insertGetId([
            'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@store',
            'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
            'controller_name' => 'TicketController',
            'method_name' => 'store',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 1,
        ]);

        $parentId = Permission::insertGetId([
            'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@view',
            'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
            'controller_name' => 'TicketController',
            'method_name' => 'view',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 1,
        ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@replyStore',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'replyStore',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@edit',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'edit',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@update',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'update',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@pdf',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'pdf',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@delete',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'delete',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@add',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'add',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@changePriority',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'changePriority',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@changeAssignee',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'changeAssignee',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@updateReply',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'updateReply',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);
            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@messages',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'messages',
            ]);

                \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);
            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@storeMessage',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'storeMessage',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@search',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'search',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@editMessage',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'editMessage',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@updateMessage',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'updateMessage',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@destroyMessage',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'destroyMessage',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@links',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'links',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@storeLink',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'storeLink',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@editLink',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'editLink',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@updateLink',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'updateLink',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);
            
            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\CannedController@destroyLink',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\CannedController',
                'controller_name' => 'CannedController',
                'method_name' => 'destroyLink',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@index',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'index',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@create',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'create',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@store',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'store',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@view',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'view',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@update',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'update',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@replyStore',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'replyStore',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController@pdf',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'pdf',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);
            
            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@changeStatus',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'changeStatus',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\TicketController@csv',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\TicketController',
                'controller_name' => 'TicketController',
                'method_name' => 'csv',
            ]);

            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 1,
            ]);

            $parentId = Permission::insertGetId([
                'name' => 'Modules\\Ticket\\Http\\Controllers\\User\\FilesController@downloadAttachment',
                'controller_path' => 'Modules\\Ticket\\Http\\Controllers\\User\\FilesController',
                'controller_name' => 'FilesController',
                'method_name' => 'downloadAttachment',
            ]);
            \DB::table('permission_roles')->insert([
                'permission_id' => $parentId,
                'role_id' => 2,
            ]);
    }
}
