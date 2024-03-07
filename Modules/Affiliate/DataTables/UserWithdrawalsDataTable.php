<?php
/**
 * @package UserWithdrawalsDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 23-08-2023
 */
namespace Modules\Affiliate\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\WithdrawRequest;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class UserWithdrawalsDataTable extends DataTable
{
    protected $userId = null;
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax() : JsonResponse
    {
        $withdrawals = $this->query();
        return datatables()
            ->of($withdrawals)

            ->editColumn('amount', function ($withdrawals) {
                return formatNumber($withdrawals->amount);
            })
            ->editColumn('note', function ($withdrawals) {
                return $withdrawals->note;
            })
            ->editColumn('status', function ($withdrawals) {
                return statusBadges($withdrawals->status);
            })
            ->editColumn('created_at', function ($withdrawals) {
                return $withdrawals->format_created_at;
            })
            ->rawColumns(['amount', 'note', 'status', 'created_at'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $userId = !is_null($this->getUserId()) ? $this->getUserId() : auth()->user()->affiliateUser()->first()->id;
        $withdrawals = WithdrawRequest::where('affiliate_user_id', $userId)->orderBy('id', 'DESC')->get();

        return $this->applyScopes($withdrawals);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => __('Id'), 'visible' => false])
            ->addColumn(['data' => 'amount', 'name' => 'amount', 'title' => __('Amount')])
            ->addColumn(['data' => 'note', 'name' => 'note', 'title' => __('Note')])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created At')])
            ->parameters(dataTableOptions());
    }

    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
