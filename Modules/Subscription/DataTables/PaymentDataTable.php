<?php
/**
 * @package PaymentDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 04-03-2023
 */

namespace Modules\Subscription\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Subscription\Entities\SubscriptionDetails;

class PaymentDataTable extends DataTable
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
            ->editColumn('code', function ($subscription) {
                return $subscription->code;
            })
            ->editColumn('package', function ($subscription) {
                if ($subscription->billing_cycle) {
                    if (!is_null($subscription->package?->id)) {
                        return '<a target="_blank" href="' . route('package.edit', ['id' => $subscription->package->id]) . '">' .$subscription->package->name . '</a>';
                    }
                } else {
                    if (!is_null($subscription->credit?->id)) {
                        return '<a target="_blank" href="' . route('credit.edit', ['id' => $subscription->credit->id]) . '">' .$subscription->credit->name . '</a>';
                    }
                }

                return __('Unknown');
            })

            ->editColumn('activation_date', function ($subscription) {
                return timeZoneFormatDate($subscription->activation_date);
            })
            ->editColumn('next_billing_date', function ($subscription) {
                if ($subscription->is_trial == 0 && in_array($subscription->billing_cycle, ['lifetime', ''])) {
                    return __('Not Applicable');
                }
                return timeZoneFormatDate($subscription->next_billing_date);
            })
            ->editColumn('amount_billed', function ($subscription) {
                return formatNumber($subscription->amount_billed);
            })->editColumn('billing_cycle', function ($subscription) {
                return ucfirst($subscription->billing_cycle ?? __('One time'));
            })->editColumn('payment_status', function ($subscription) {
                return ucfirst($subscription->payment_status);
            })->editColumn('status', function ($subscription) {
                if (!$subscription->billing_cycle) {
                    $subscription->status = $subscription->status == 'Expired' ? 'Active' : $subscription->status; 
                }
                return statusBadges(lcfirst($subscription->status));
            })->addColumn('action', function ($subscription) {
                return '<a title="' . __('Invoice') . '" href="' . route('package.subscription.invoice', ['id' => $subscription->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-eye"></i></a>&nbsp';
             })
            ->rawColumns(['package', 'code', 'activation_date', 'next_billing_date', 'amount_billed', 'billing_cycle', 'payment_status', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $subscriptionPayments = SubscriptionDetails::select('subscription_details.*')->with(['package:id,name', 'credit:id,name'])->filter();

        if (isset(request()->code)) {
            $subscriptionPayments->where('code', request()->code);
        }

        return $this->applyScopes($subscriptionPayments);
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
        ->addColumn(['data' => 'code', 'name' => 'code', 'title' => __('Subscription Code')])
        ->addColumn(['data' => 'package', 'name' => 'package.name', 'title' => __('Plan')])
        ->addColumn(['data' => 'activation_date', 'name' => 'activation_date', 'title' => __('Activation Date')])
        ->addColumn(['data' => 'next_billing_date', 'name' => 'next_billing_date', 'title' => __('Next Billing')])
        ->addColumn(['data' => 'amount_billed', 'name' => 'amount_billed', 'title' => __('Price')])
        ->addColumn(['data' => 'billing_cycle', 'name' => 'billing_cycle', 'title' => __('Billing Cycle')])
        ->addColumn(['data' => 'payment_status', 'name' => 'payment_status', 'title' => __('Payment Status')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '5%',
        'visible' => $this->hasPermission(['Modules\Subscription\Http\Controllers\PackageSubscriptionController@invoice']),
        'orderable' => false, 'searchable' => false])
        ->parameters(dataTableOptions());
    }
}
