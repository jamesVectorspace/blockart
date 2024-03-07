<?php

namespace Modules\DatabaseBackup\DataTables;

use App\DataTables\DataTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class DatabaseBackupDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function ajax(): JsonResponse
    {
        $backupList = $this->query();

        return datatables()
            ->of($backupList)
            ->addColumn('backup_list', function ($backupList) {
                return $backupList["backup_list"];
            })
            ->addColumn('action', function ($backupList) {

                $download = '<a title="' . __('Download') . '" href="' . route('database.manual.backup.download', ['file' =>  trim($backupList['backup_list'], "/")]) . '" class="btn btn-xs btn-primary"><i class="fas fa-arrow-alt-circle-down"></i></a>&nbsp;';

                $delete = '<form method="post" action="' . route('database.manual.backup.destroy', ['file' => trim($backupList['backup_list'], "/")]) .'" id="delete-database-'. str_replace([".zip", ".sql"], "", $backupList['backup_list']) . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        <button title="' . __('Delete') . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . str_replace([".zip", ".sql"], "", $backupList['backup_list']) . ' data-delete="database" data-label="Delete" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Backup File')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';

                return $download . $delete;
            })
            ->rawColumns(['backup_list', 'action'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DatabaseBackupDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $directory = config('backup.backup.name');
        $files = Storage::files($directory);
        $pattern = "/$directory\//i";
        $filesArray = preg_replace($pattern, '', $files);
        $formattedFiles = array_map(function ($file) {
            return ['backup_list' => $file];
        }, $filesArray);
        return array_reverse($formattedFiles);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'backup_list', 'name' => 'backup_list', 'title' => __('Backup List'), 'orderable' => false])
            ->addColumn([
                'data' => 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '12%',
                'orderable' => false, 'searchable' => false
            ])
            ->parameters(dataTableOptions());
    }
}
