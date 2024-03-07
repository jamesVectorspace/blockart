<?php

namespace Modules\DatabaseBackup\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factory;

class DatabaseBackupServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'DatabaseBackup';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'DatabaseBackup';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            \Modules\DatabaseBackup\Console\DatabaseBackupCommand::class,
            \Modules\DatabaseBackup\Console\ManualDatabaseBackupCommand::class,
        ]);

        $scheduleType = moduleConfig('databasebackup.schedule_type');
        $isDatabaseAutomatedBackup = moduleConfig('databasebackup.is_database_automated_backup');

        if ($isDatabaseAutomatedBackup) {
            $this->app->booted(function () use ($scheduleType) {
                $schedule = $this->app->make(Schedule::class);
                $schedule->command('database:backup')->{$scheduleType}();
            });
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
