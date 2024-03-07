<?php
/**
 * @package WithdrawalsDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 23-08-2023
 */
namespace Modules\Affiliate\DataTables;

use App\DataTables\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\WithdrawRequest;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class WithdrawalsDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $withdrawals = $this->query();
        return datatables()
            ->of($withdrawals)

            ->editColumn('name', function ($withdrawals) {
                return $withdrawals->affiliateUser?->user?->name;
            })

            ->editColumn('amount', function ($withdrawals) {
                return formatNumber($withdrawals->amount);
            })
            ->editColumn('status', function ($withdrawals) {
                return statusBadges($withdrawals->status);
            })
            ->editColumn('created_at', function ($withdrawals) {
                return $withdrawals->format_created_at;
            })
            ->addColumn('action', function ($withdrawals) {
                $str = '';
                if ($this->hasPermission(['Modules\Affiliate\Http\Controllers\WithdrawalsController@view'])) {
                    $str .= '<a title="' . __('View') . '" href="' . route('affiliate.users.withdrawals_view', $withdrawals->id) . '" class="btn btn-xs btn-primary"><i class="feather icon-eye neg-transition-scale-svg "></i></a>&nbsp;';
                }

                return $str;
            })
            ->rawColumns(['amount', 'note', 'status', 'created_at', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $withdrawals = WithdrawRequest::orderBy('id', 'DESC')->with('affiliateUser', 'affiliateUser.user')->get();

        return $this->applyScopes($withdrawals);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Name')])
            ->addColumn(['data' => 'amount', 'name' => 'amount', 'title' => __('Amount')])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created At')])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => __('Action'),
                'visible' => $this->hasPermission(['Modules\Affiliate\Http\Controllers\WithdrawalsController@view']),
                ])
            ->parameters(dataTableOptions());
    }
}
