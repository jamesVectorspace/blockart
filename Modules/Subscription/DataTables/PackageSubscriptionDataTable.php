<?php
/**
 * @package PackageSubscriptionDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 20-02-2023
 */

namespace Modules\Subscription\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Subscription\Entities\PackageSubscription;

class PackageSubscriptionDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $subscription = $this->query();
        return datatables()
            ->of($subscription)

            ->editColumn('package', function ($subscription) {
                if (!is_null($subscription->package?->id)) {
                    return '<a target="_blank" href="' . route('package.edit', ['id' => $subscription->package->id]) . '">' . wrapIt($subscription->package->name, 10, ['columns' => 2]) . '</a>';
                }
                return wrapIt(__('Unknown'), 10, ['columns' => 2]);
            })
            ->editColumn('user', function ($subscription) {
                if (!is_null($subscription->user?->id)) {
                    return '<a target="_blank" href="' . route('users.edit', ['id' => $subscription->user->id]) . '">' . wrapIt($subscription->user->name, 10, ['columns' => 2]) . '</a>';
                }
                return wrapIt(__('Unknown'), 10, ['columns' => 2]);
            })
            ->editColumn('activation_date', function ($subscription) {
                return timeZoneFormatDate($subscription->activation_date);
            })
            ->editColumn('next_billing_date', function ($subscription) {
                if (!subscription('isTrialMode', $subscription->id) && $subscription->billing_cycle == 'lifetime') {
                    return __('Not Applicable');
                }
                return timeZoneFormatDate($subscription->next_billing_date);
            })
            ->editColumn('amount_billed', function ($subscription) {
                return formatNumber($subscription->amount_billed);
            })->editColumn('billing_cycle', function ($subscription) {
                return ucfirst($subscription->billing_cycle);
            })->editColumn('payment_status', function ($subscription) {
                return ucfirst($subscription->payment_status);
            })->editColumn('status', function ($subscription) {
                return statusBadges(lcfirst($subscription->status));
            })->addColumn('action', function ($subscription) {
                $payment = '<a title="' . __('Payment') . '" target="blank" href="' . route('package.subscription.payment', ['code' => $subscription->code]) . '" class="btn btn-xs btn-primary"><i class="feather icon-credit-card"></i></a>&nbsp';

                $edit = '<a title="' . __('Edit :x', ['x' => __('Subscription')]) . '" href="' . route('package.subscription.edit', ['id' => $subscription->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';

                $delete = '<form method="post" action="' . route('package.subscription.destroy', ['id' => $subscription->id]) . '" id="delete-package-subscription-'. $subscription->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete :x', ['x' => __('Subscription')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $subscription->id . ' data-label="Delete" data-delete="package-subscription" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Subscription')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';

                $str = $payment;
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\PackageSubscriptionController@edit'])) {
                    $str .= $edit;
                }
                if ($this->hasPermission(['Modules\Subscription\Http\Controllers\PackageSubscriptionController@destroy'])) {
                    $str .= $delete;
                }

                return $str;
            })

            ->rawColumns(['package', 'user', 'activation_date', 'next_billing_date', 'amount_billed', 'billing_cycle', 'payment_status', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $subscriptions = PackageSubscription::with('user', 'user.metas', 'package')->filter();
        return $this->applyScopes($subscriptions);
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
        ->addColumn(['data' => 'package', 'name' => 'package.name', 'title' => __('Package'), 'orderable' => false])
        ->addColumn(['data' => 'user', 'name' => 'user.name', 'title' => __('Customer')])
        ->addColumn(['data' => 'activation_date', 'name' => 'activation_date', 'title' => __('Activation Date')])
        ->addColumn(['data' => 'next_billing_date', 'name' => 'next_billing_date', 'title' => __('Next Billing')])
        ->addColumn(['data' => 'amount_billed', 'name' => 'amount_billed', 'title' => __('Price')])
        ->addColumn(['data' => 'billing_cycle', 'name' => 'billing_cycle', 'title' => __('Billing Cycle')])
        ->addColumn(['data' => 'payment_status', 'name' => 'payment_status', 'title' => __('Payment Status')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])

        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\Subscription\Http\Controllers\PackageSubscriptionController@edit', 'Modules\Subscription\Http\Controllers\PackageSubscriptionController@destroy']),
        'orderable' => false, 'searchable' => false])

        ->parameters(dataTableOptions());
    }
}
