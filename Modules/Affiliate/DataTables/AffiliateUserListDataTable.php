<?php

/**
 * @package AffiliateUserListDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 06-07-2023
 */

namespace Modules\Affiliate\DataTables;
use App\DataTables\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\AffiliateUser;

class AffiliateUserListDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax() : JsonResponse
    {
        $users = $this->query();
        return DataTables::eloquent($users)

            ->addColumn('picture', function ($users) {
                return '<img src="' . $users->user->fileUrl() . '" alt="' . __('image') . '" width="50" height="50">';
            })
            ->editColumn('name', function ($users) {
                return '<a href="' . route('users.edit', ['id' => $users->user?->id]) . '">' . wrapIt($users->user?->name, 10) . '</a>';
            })
            ->editColumn('total_visitor', function ($users) {
                return $users->referral->sum('total_click');
            })
            ->editColumn('total_revenue', function ($users) {
                return formatCurrencyAmount($users->revenue);
            })
            ->editColumn('total_customer', function ($users) {
                return $users->referralAffiliateUsers?->count('user_id');
            })
            ->editColumn('net_commission', function ($users) {
                return formatCurrencyAmount($users->net_commission);
            })
            ->editColumn('affiliate_tag_id', function ($users) {
                return wrapIt($users->affiliateUserTag(), 10, ['column' => 2, 'trimLength' => 10]);
            })
            ->editColumn('status', function ($users) {
                return statusBadges(lcfirst($users->status));
            })
            ->editColumn('created_at', function ($users) {
                return $users->format_created_at;
            })
            ->addColumn('action', function ($users) {

                $str = '';
                if ($this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@profile']) &&
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@userProfileUpdate'])||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@referrals']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@topProducts']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@payouts']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@multiTier'])
                ) {
                    $str .= '<a title="' . __('View') . '" href="' . route('affiliate.users.referrals', ['id' => $users->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-eye neg-transition-scale-svg "></i></a>&nbsp;';
                }

                if ($this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@userDestroy'])) {
                    $str .= '<form method="post" action="' . route('affiliate.users.destroy', ['id' => $users->id]) . '" id="delete-user-' . $users->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        <button title="' . __('Delete') . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $users->id . ' data-delete="user" data-label="Delete" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('User')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                }

                return $str;
            })
            ->rawColumns(['picture', 'name', 'total_visitor', 'total_revenue', 'total_customer', 'net_commission', 'affiliate_tag_id', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query() : QueryBuilder
    {
        $users = AffiliateUser::query()->with(['user:id,name', 'user.metas', 'referralAffiliateUsers', 'affiliateTags','affiliateTags.tag', 'referral'])->filter();
        return $this->applyScopes($users);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => __('Id'), 'visible' => false])
            ->addColumn(['data' => 'picture', 'name' => 'picture', 'title' => __('Picture'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'name', 'name' => 'user_id', 'title' => __('Name')])
            ->addColumn(['data' => 'total_visitor', 'name' => 'total_visitor', 'title' => __('Visitor'), 'searchable' => false])
            ->addColumn(['data' => 'total_customer', 'name' => 'total_customer', 'title' => __('Total Customer'), 'searchable' => false])
            ->addColumn(['data' => 'total_revenue', 'name' => 'revenue', 'title' => __('Revenue')])
            ->addColumn(['data' => 'net_commission', 'name' => 'net_commission', 'title' => __('Commission')])
            ->addColumn(['data' => 'affiliate_tag_id', 'name' => 'affiliate_tag_id', 'title' => __('Tags'), 'searchable' => false])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at')])
            ->addColumn([
                'data' => 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
                'visible' => $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@profile']) &&
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@userProfileUpdate'])||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@referrals']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@topProducts']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@payouts']) ||
                    $this->hasPermission(['Modules\Affiliate\Http\Controllers\AffiliateController@multiTier']),
                'orderable' => false, 'searchable' => false
            ])
            ->parameters(dataTableOptions());
    }
}
