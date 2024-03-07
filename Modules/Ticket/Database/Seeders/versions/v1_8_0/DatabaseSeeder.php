<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_8_0;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(MenuItemsTableSeeder::class);
    }
}
