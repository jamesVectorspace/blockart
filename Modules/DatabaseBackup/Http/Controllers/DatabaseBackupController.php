<?php

namespace Modules\DatabaseBackup\Http\Controllers;

use App\Lib\Env;
use Illuminate\Contracts\Support\Renderable;
use Modules\DatabaseBackup\DataTables\DatabaseBackupDataTable;
use Modules\DatabaseBackup\Http\Requests\DatabaseAutoBackupSettingRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\{
    Artisan,
    File,
    Log,
    Response,
    Storage
};

class DatabaseBackupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('databasebackup::autobackup');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function automatedDatabaseBackupForm()
    {
        $data['disks'] = moduleConfig('databasebackup.available_storage');
        return view('databasebackup::auto_backup_setting', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param DatabaseAutoBackupSettingRequest $request
     * @return Renderable
     */
    public function store(DatabaseAutoBackupSettingRequest $request)
    {
        try {
            Env::set('DATABASE_SCHEDULE_TYPE', $request->schedule_type);
            Env::set('IS_DATABASE_AUTOMATED_BACKUP', $request->is_database_automated_backup ? true : false);
            Env::set('DATABASE_STORAGE', $request->storage);
            $response = $this->messageArray(__('Auto backup setting setup successfully'), 'success');
            $this->setSessionValue($response);
            return to_route('database.automated.backup')->with($response);
        } catch (\Throwable $th) {

            $response = $this->messageArray(__('Auto backup setting setup Failed'), 'fail');
            return to_route('database.automated.backup')->with($response);
        }
    }

    /**
     * Show database backup list
     *
     * @param DatabaseBackupDataTable $dataTable
     * @return Renderable
     */
    public function list(DatabaseBackupDataTable $dataTable)
    {
        $directory = config('backup.backup.name');
        
        if (!Storage::exists($directory) && File::isWritable(storage_path())) {
            Storage::makeDirectory($directory);
        }

        return $dataTable->render('databasebackup::list');
    }

    /**
     * Download a database backup file.
     *
     * @param string $file
     * @return response
     */
    public function download($file)
    {
        try {
            $directory = config('backup.backup.name');
            $link = $directory . "/" . $file;
            return Storage::download($link);
        } catch (\Exception $e) {

            $response = $this->messageArray(__('An error occurred while downloading the backup file.'), 'fail');
            $this->setSessionValue($response);
            return to_route('database.manual.backup.list');
        }
    }
    /**
     * Download a database backup file.
     *
     * @param string $file
     * @return response
     */
    public function destroy($file)
    {
        try {
            $directory = config('backup.backup.name');
            $link = $directory . "/" . $file;
            Storage::delete($link);
            $response = $this->messageArray(__('Database backup file deleted successfully'), 'success');
            $this->setSessionValue($response);

            return to_route('database.manual.backup.list');
        } catch (\Exception $e) {

            $response = $this->messageArray(__('An error occurred while deleting the backup file.'), 'fail');
            $this->setSessionValue($response);
            return to_route('database.manual.backup.list');
        }
    }

    /**
     * Manually database backup
     *
     * @return redirect
     */
    public function manualDatabaseBackup()
    {
        try {
            $process = new Process(['mysqldump', '--version']);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new \Exception(__("mysqldump is not available."));
            }

            Artisan::call('techvill-database:backup');
            $response = $this->messageArray(__('Database backup successfully'), 'success');
            $this->setSessionValue($response);
            
            return to_route('database.manual.backup.list')->with($response);
        } catch (\Exception $e) {

            Log::error($e);
            $response = $this->messageArray($e->getMessage(), 'fail');
            $this->setSessionValue($response);
            return to_route('database.manual.backup.list')->with($response);
        }
    }
}
