<?php
/**
 * @package Report Model
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 20-03-2022
 */

namespace Modules\Report\Http\Models;

use App\Models\Model;
use Modules\Subscription\Entities\{PackageSubscription, SubscriptionDetails};
use Modules\OpenAI\Entities\{Image, Content};
use DB;

class Report extends Model
{
    /**
     * Report Class
     *
     * @return array
     */
    public function reportType()
    {
        return [
            'SubscriptionReport' => __('Subscriptions Report'),
            'ImageGenerateReport' => __('Image Generate Report'),
            'WordGenerateReport' => __('Word Generate Report'),
            'TransactionReport' => __('Transaction Report'),
            'MinuteGenerateReport' => __('Minute Generate Report'),
            'CharacterGenerateReport' => __('Character Generate Report'),
        ];

    }

    /**
     * Column Name
     *
     * @return array
     */
    public function tableRow()
    {
        return [
            'SubscriptionReport' => array(__('Plan Name'), __('Code'), __('Order'), __('Total')),
            'ImageGenerateReport' => array(__('Name'), __('Email'), __('Total'), __('Usage'), __('Remaining')),
            'WordGenerateReport' => array(__('Name'), __('Email'), __('Total'), __('Usage'), __('Remaining')),
            'TransactionReport' => array(__('Name'), __('Package Name'), __('Code'), __('Type'), __('Total')),
            'MinuteGenerateReport' => array(__('Name'), __('Email'), __('Total'), __('Usage'), __('Remaining')),
            'CharacterGenerateReport' => array(__('Name'), __('Email'), __('Total'), __('Usage'), __('Remaining')),
        ];

    }

    /**
     * Subscription Report
     *
     * @param null $from
     * @param null $to
     * @param null $subscriptionCode
     * @return [type]
     */
    public function getSubscriptionReport($from = null, $to = null, $subscriptionCode = null)
    {
        $subscription = SubscriptionDetails::join('packages', 'packages.id', 'subscription_details.package_id')
                        ->whereIn('subscription_details.status', ['Active', 'Expired']);

        if (!empty($from)) {
            $subscription->whereDate('subscription_details.billing_date', '>=', DbDateFormat($from));
        }

        if (!empty($to)) {
            $subscription->whereDate('subscription_details.billing_date', '<=', DbDateFormat($to));
        }

        if (!empty($subscriptionCode)) {
            $subscription->where('packages.code', $subscriptionCode);
        }

        return $subscription->select('packages.name as name', 'packages.code as code', DB::raw('count(subscription_details.package_id) as package_count'), DB::raw('sum(subscription_details.billing_price) as package_bill'))->groupBy('subscription_details.package_id')->get();
    }

    /**
     * Image report
     * @param null $customerName
     * @param null $customerEmail
     * @return [type]
     */
    public function getImageGenerateReport($customerName = null, $customerEmail = null)
    {
        $subscription = PackageSubscription::whereHas('user', function($query) use($customerName, $customerEmail) {
            if (!empty($customerName)) {
                $query->where('name','like', '%'. $customerName . '%');
            }

            if (!empty($customerEmail)) {
                $query->where('email', 'like', '%'. $customerEmail . '%');
            }
        })->with(['user', 'user.metas', 'metadata' => function($query) {
            $query->where('type', 'feature_image')->whereIn('key', ['usage', 'value']);
        }]);

        return $subscription->get();
    }

    /**
     * Word report
     * @param null $customerName
     * @param null $customerEmail
     * @return [type]
     */
    public function getWordGenerateReport($customerName = null, $customerEmail = null)
    {
        $subscription = PackageSubscription::whereHas('user', function($query) use($customerName, $customerEmail) {
            if (!empty($customerName)) {
                $query->where('name','like', '%'. $customerName . '%');
            }

            if (!empty($customerEmail)) {
                $query->where('email', 'like', '%'. $customerEmail . '%');
            }
        })->with(['user', 'user.metas', 'metadata' => function($query) {
            $query->where('type', 'feature_word')->whereIn('key', ['usage', 'value']);
        }]);

        return $subscription->get();
    }

    /**
     * Transaction Report
     * @param null $from
     * @param null $to
     * @return [type]
     */
    public function getTransactionReport($from = null, $to = null, $customerName= null,  $subscriptionCode = null)
    {
        $transaction = SubscriptionDetails::with(['user' => function ($q){
            $q->select('id', 'name');
        }, 'package' => function($q) {
            $q->select('id', 'code', 'name as packageName');
        }, 'credit' => function($q) {
            $q->select('id', 'code', 'name as packageName');
        }])->whereIn('subscription_details.status', ['Active', 'Expired', 'Cancel']);

        if (!empty($customerName)) {
            $transaction->WhereHas('user', function ($query) use ($customerName) {
                $query->WhereLike('name', $customerName);
            });
        }
        if (!empty($from)) {
            $transaction->whereDate('subscription_details.billing_date', '>=', DbDateFormat($from));
        }

        if (!empty($to)) {
            $transaction->whereDate('subscription_details.billing_date', '<=', DbDateFormat($to));
        }

        if (!empty($subscriptionCode)) {
            $transaction->WhereHas('package', function ($query) use ($subscriptionCode) {
                $query->WhereLike('code', $subscriptionCode);
            })->orWhereHas('credit', function ($query) use ($subscriptionCode) {
                $query->WhereLike('code', $subscriptionCode);
            });
        }

        return $transaction->select('subscription_details.user_id', 'subscription_details.package_id', 'subscription_details.billing_cycle as billing_cycle', 'subscription_details.billing_price as totalPrice')->get();
    }

    /**
     * Minute report
     * @param null $customerName
     * @param null $customerEmail
     * @return [type]
     */
    public function getMinuteGenerateReport($customerName = null, $customerEmail = null)
    {
        $subscription = PackageSubscription::whereHas('user', function($query) use($customerName, $customerEmail) {
            if (!empty($customerName)) {
                $query->where('name','like', '%'. $customerName . '%');
            }

            if (!empty($customerEmail)) {
                $query->where('email', 'like', '%'. $customerEmail . '%');
            }
        })->with(['user', 'user.metas', 'metadata' => function($query) {
            $query->where('type', 'feature_minute')->whereIn('key', ['usage', 'value']);
        }]);

        return $subscription->get();
    }

    /**
     * Character report
     * @param null $customerName
     * @param null $customerEmail
     * @return [type]
     */
    public function getCharacterGenerateReport($customerName = null, $customerEmail = null)
    {
        $subscription = PackageSubscription::whereHas('user', function($query) use($customerName, $customerEmail) {
            if (!empty($customerName)) {
                $query->where('name','like', '%'. $customerName . '%');
            }

            if (!empty($customerEmail)) {
                $query->where('email', 'like', '%'. $customerEmail . '%');
            }
        })->with(['user', 'user.metas', 'metadata' => function($query) {
            $query->where('type', 'feature_character')->whereIn('key', ['usage', 'value']);
        }]);

        return $subscription->get();
    }


}
