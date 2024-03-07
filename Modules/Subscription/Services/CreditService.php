<?php

/**
 * @package CreditService
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 13-08-2023
 */

 namespace Modules\Subscription\Services;

use App\Models\User;
use App\Traits\MessageResponseTrait;
use Illuminate\Support\Facades\DB;
use Modules\Subscription\Entities\{
    Credit,
    PackageSubscriptionMeta
};

 class CreditService
 {
    use MessageResponseTrait;

    /**
     * service name
     * @var string
     */
    public string|null $service;

    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('Credit');
        }
    }

    /**
     * Store Credit
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        \DB::beginTransaction();

        try {
            $data['price'] = is_null($data['price']) ? 0 : validateNumbers($data['price']);

            if ($credit = Credit::create($data)) {
                \DB::commit();

                Credit::forgetCache();
                return $this->saveSuccessResponse() + ['credit' => $credit];
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Update Credit
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(array $data, int $id): array
    {
        $credit = Credit::find($id);
        $data['price'] = validateNumbers($data['price']);

        if (is_null($credit)) {
            return $this->notFoundResponse();
        }

        \DB::beginTransaction();

        try {
            if ($credit->update($data)) {
                \DB::commit();

                Credit::forgetCache();
                return $this->saveSuccessResponse();
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Delete Credit
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $credit = Credit::find($id);

        if (is_null($credit)) {
            return $this->notFoundResponse();
        }

        if ($credit->delete()) {
            Credit::forgetCache();

            return $this->deleteSuccessResponse();
        }

        return $this->deleteFailResponse();
    }
    
    /**
     * Manually paid by admin
     * 
     * @param SubscriptionDetails $history
     * 
     * @return array
     */
    public function manualPaid($history)
    {
        if ($history->billing_cycle) {
            return [
                'status' => 'fail',
                'message' => __('This plan is not a single plan')
            ];
        }
        
        $credit = Credit::find($history->package_id);
        
        if (!$credit) {
            return $this->notFoundResponse();
        }
        
        DB::beginTransaction();
        try {
            $user = User::find($history->user_id);
            $history->update([
                'amount_received' => $history->amount_billed,
                'payment_status' => 'Paid',
                'status' => 'Expired'
            ]);
            foreach ($credit->features as $key => $value) {                
                $oldValueLimit = intval($user->getMeta($key . '_limit'));
                $oldValueUsed = intval($user->getMeta($key . '_used'));
            
                $user->setMeta($key . '_used', $oldValueUsed);
                if ($oldValueLimit != -1) {
                    $user->setMeta($key . '_limit', $oldValueLimit + $value);
                }
                
                $user->save();
            }
            DB::commit();
            
            return [
                'status' => 'success',
                'message' => __('The payment has been successfully paid.')
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            
            return [
                'status' => 'fail',
                'message' => $e->getMessage()
            ];
        }
        
    }

    /**
     * Get default package
     *
     * @return array
     */
    static function defaultPackage()
    {
        $defaultCredit =  Credit::where('type', 'default')->first();
        if (!empty($defaultCredit)) {
            return $defaultCredit;
        }
    }

    /**
     * All Active Plan
     * 
     * @return array
     */
    public static function getActiveCredits()
    {
        return Credit::select('id', 'name')->active()->pluck("name", "id")->toArray();
    }
 }
