<?php

namespace Modules\DatabaseBackup\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManualDatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'techvill-database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TechVillage database backup.';

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
            $dbUserName = config('database.connections.mysql.username');
            $dbPassword = config('database.connections.mysql.password');
            $dbHost = config('database.connections.mysql.host');
            $dbDatabase = config('database.connections.mysql.database');
            $filename = date('Y-m-d-H-i-s') . ".sql";
            $path = storage_path("app/" . config('backup.backup.name'));

            if (!Storage::exists(config('backup.backup.name')) && is_writable(storage_path())) {
                mkdir($path, config('app.filePermission'), true);
            }

            $command = "mysqldump --user=" .  $dbUserName . " --password=" . $dbPassword . " --host=" . $dbHost . " " .  $dbDatabase . " > " . $path . "/" . $filename;

            $returnVar = NULL;
            $output  = NULL;
            exec($command, $output, $returnVar);

            if ($returnVar !== 0) {
                throw new \Exception(__("An error occurred while executing the command. Return code") . ': ' . $returnVar);
            }

            $this->info(__('Database backup completed successfully.'));

        } catch (\Exception $e) {

            Log::error('An error occurred: ' . $e->getMessage());
            $this->error(__('An error occurred during the database backup') . ': ' . $e->getMessage());
        }

    }
}
