<?php

namespace Modules\DatabaseBackup\Console;

use Illuminate\Console\Command;

class DatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->call('backup:run', ['--only-db' => true]);
            $this->info(__('Database backup completed successfully.'));
        } catch (\Exception $e) {
            $this->error(__('An error occurred during the database backup'). ': ' . $e->getMessage());
        }
    }
}
