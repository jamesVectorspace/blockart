<?php

namespace Modules\Ticket\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Ticket\Database\Seeders\versions\v1_6_0\{
    PrioritiesTableSeeder,
    ThreadStatusesTableSeeder,
    AdminMenusTableSeeder,
    MenuItemsTableSeeder,
    ThreadsTableSeeder,
    ThreadRepliesTableSeeder,
    PermissionTableSeeder
};
use Modules\Ticket\Database\Seeders\versions\v1_8_0\DatabaseSeeder;

class TicketDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            PrioritiesTableSeeder::class,
            ThreadStatusesTableSeeder::class,
            AdminMenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            ThreadsTableSeeder::class,
            ThreadRepliesTableSeeder::class,
            PermissionTableSeeder::class,
            DatabaseSeeder::class,
        ]);
    }
}
