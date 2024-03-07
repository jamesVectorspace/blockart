<?php
/**
 * @package SubscriptionHistoryResource
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 27-07-2023
 */
namespace Modules\Subscription\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request = [])
    {
        if ($this->code == 'onetime') {
            $packageName = $this?->credit?->name ?? __('Unknown');
        } else {
            $packageName = $this?->package?->name ?? __('Unknown');
        }
        
        return [
            "id" => $this->id,
            "code" => $this->code,
            "unique_code" => $this->unique_code,
            "user_id" => $this->user_id,
            "user_name" => $this?->user?->name ?? __('Unknown'),
            "package_id" => $this->package_id,
            "package_name" => $packageName,
            "package_subscription_id" => $this->package_subscription_id,
            "activation_date" => timeZoneFormatDate($this->activation_date),
            "billing_date" => timeZoneFormatDate($this->billing_date),
            "next_billing_date" => timeZoneFormatDate($this->next_billing_date),
            "billing_price" => formatNumber($this->billing_price),
            "billing_cycle" => ucfirst($this->billing_cycle),
            "amount_billed" => formatNumber($this->amount_billed),
            "amount_received" => formatNumber($this->amount_received),
            "payment_method" => $this->payment_method,
            "duration" => $this->duration,
            "currency" => $this->currency,
            "is_trial" => boolval($this->is_trial),
            "renewable" => boolval($this->renewable),
            "payment_status" => $this->payment_status,
            "status" => $this->code == 'onetime' ? 'Active' : $this->status,
            "payable" => $this->payment_status == 'Unpaid'
        ];
    }
}
