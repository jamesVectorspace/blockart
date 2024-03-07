<?php
/**
 * @package CreditDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 13-08-2023
 */

namespace Modules\Subscription\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Subscription\Entities\Credit;
use Yajra\DataTables\Facades\DataTables;

class CreditDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $credit = $this->query();
        return DataTables::eloquent($credit)

            ->editColumn('name', function ($credit) {
                return wrapIt($credit->name, 10, ['columns' => 2]);
            })
            ->editColumn('code', function ($credit) {
                return $credit->code;
            })->editColumn('price', function ($credit) {
                return formatNumber($credit->price);
            })->editColumn('status', function ($credit) {
                return statusBadges(lcfirst($credit->status));
            })->addColumn('action', function ($credit) {
                $edit = '<a title="' . __('Edit :x', ['x' => __('Credit')]) . '" href="' . route('credit.edit', ['id' => $credit->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';

                $delete = '<form method="post" action="' . route('credit.destroy', ['id' => $credit->id]) . '" id="delete-credit-'. $credit->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete :x', ['x' => __('Credit')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $credit->id . ' data-label="Delete" data-delete="credit" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Credit')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\CreditController@edit'])) {
                    $str .= $edit;
                }
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\CreditController@destroy'])) {
                    $str .= $delete;
                }
                return $str;
            })

            ->rawColumns(['name', 'code', 'price','status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $credits = Credit::whereNot('type', 'default')->filter();
        return $this->applyScopes($credits);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()

        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => __('Id'), 'visible' => false])
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Name')])
        ->addColumn(['data' => 'code', 'name' => 'code', 'title' => __('Code')])
        ->addColumn(['data' => 'price', 'name' => 'price', 'title' => __('Price')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])

        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\Subscription\Http\Controllers\CreditController@edit', 'Modules\Subscription\Http\Controllers\CreditController@destroy']),
        'orderable' => false, 'searchable' => false])

        ->parameters(dataTableOptions());
    }
}
