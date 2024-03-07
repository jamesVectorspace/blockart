<?php
/**
 * @package PackageDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 20-02-2023
 */

namespace Modules\Subscription\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;
use Modules\Subscription\Entities\Package;

class PackageDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $package = $this->query();
        return DataTables::eloquent($package)

            ->addColumn('user', function ($package) {
                if (!is_null($package->user?->id)) {
                    return '<a target="_blank" href="' . route('users.edit', ['id' => $package->user->id]) . '">' . wrapIt($package->user->name, 10, ['columns' => 2]) . '</a>';
                }
                return wrapIt(__('Guest'), 10, ['columns' => 2]);
            })
            ->editColumn('name', function ($package) {
                return wrapIt($package->name, 10, ['columns' => 2]);
            })
            ->editColumn('code', function ($package) {
                return $package->code;
            })->editColumn('sale_price', function ($package) {
                $price = '<div>';
                foreach ($package->sale_price as $key => $value) {
                    if ($package->billing_cycle[$key]) {
                        $price .= "<p>" . formatNumber($value) . "</p>";
                    }
                }
                $price .= '</div>';
                return $price;
            })
            ->editColumn('discount_price', function ($package) {
                $price = '<div>';
                foreach ($package->discount_price as $key => $value) {
                    if ($package->billing_cycle[$key]) {
                        $price .= "<p>" . ($value ? formatNumber($value) : __('Unavailable')) . "</p>";
                    }
                }
                $price .= '</div>';
                return $price;
            })->editColumn('billing_cycle', function ($package) {
                $cycle = '<div>';
                foreach ($package->billing_cycle as $key => $value) {
                    if ($value) {
                        $cycle .= "<p><span>" . ucfirst($key) . "</span></p>";
                    }
                }
                $cycle .= '</div>';
                return $cycle;
            })
            ->editColumn('status', function ($package) {
                return statusBadges(lcfirst($package->status));
            })->addColumn('action', function ($package) {
                $edit = '<a title="' . __('Edit :x', ['x' => __('Package')]) . '" href="' . route('package.edit', ['id' => $package->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';

                $delete = '<form method="post" action="' . route('package.destroy', ['id' => $package->id]) . '" id="delete-package-'. $package->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete :x', ['x' => __('Package')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $package->id . ' data-label="Delete" data-delete="package" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Package')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\PackageController@edit'])) {
                    $str .= $edit;
                }
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\PackageController@destroy'])) {
                    $str .= $delete;
                }
                return $str;
            })

            ->rawColumns(['name', 'code', 'user', 'sale_price', 'discount_price', 'billing_cycle', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $packages = Package::with('user')->filter();
        return $this->applyScopes($packages);
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
        ->addColumn(['data' => 'user', 'name' => 'user.name', 'title' => __('Author'), 'sortable' => false])
        ->addColumn(['data' => 'code', 'name' => 'code', 'title' => __('Code')])
        ->addColumn(['data' => 'sale_price', 'name' => 'sale_price', 'title' => __('Sale Price')])
        ->addColumn(['data' => 'discount_price', 'name' => 'discount_price', 'title' => __('Discount Price')])
        ->addColumn(['data' => 'billing_cycle', 'name' => 'billing_cycle', 'title' => __('Billing Cycle')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])

        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\Subscription\Http\Controllers\PackageController@edit', 'Modules\Subscription\Http\Controllers\PackageController@show', 'Modules\Subscription\Http\Controllers\PackageController@destroy']),
        'orderable' => false, 'searchable' => false])

        ->parameters(dataTableOptions());
    }
}
