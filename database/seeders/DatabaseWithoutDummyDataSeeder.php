<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\versions\v1_2_0\PermissionTableSeeder as PermissionV12TableSeeder;
use Database\Seeders\versions\v1_2_0\LanguagesTableSeeder as LanguagesV12TableSeeder;

use Database\Seeders\versions\v1_4_0\DatabaseSeeder as DatabaseSeederV14;
use Database\Seeders\versions\v1_5_0\DatabaseSeeder as DatabaseSeederV15;
use Database\Seeders\versions\v1_6_0\DatabaseSeeder as DatabaseSeederV16;

class DatabaseWithoutDummyDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrenciesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(EmailTemplatesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PreferencesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableWithoutDummyDataSeeder::class);

        $this->call(RoleUsersTableWithoutDummyDataSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(FilesTableWithoutDummyDataSeeder::class);
        $this->call(ObjectFilesTableWithoutDummyDataSeeder::class);
        
        $this->call(PermissionV12TableSeeder::class);
        $this->call(LanguagesV12TableSeeder::class);

        $this->call(DatabaseSeederV14::class);

        $this->call(DatabaseSeederV15::class);

        $this->call(DatabaseSeederV16::class);
    }
}
