<?php
/**
 * @package SubscriptionResource
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 26-07-2023
 */
namespace Modules\Subscription\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request = [])
    {
        return [
            "id" => $this->id,
            "code" => $this->code,
            "user_id" => $this->user_id,
            "user_name" => $this?->user?->name,
            "user_image" => $this?->user?->fileUrl(),
            "package_id" => $this->package_id,
            "package_name" => $this?->package?->name,
            "activation_date" => timeZoneFormatDate($this->activation_date),
            "billing_date" => timeZoneFormatDate($this->billing_date),
            "next_billing_date" => timeZoneFormatDate($this->next_billing_date),
            "billing_price" => formatNumber($this->billing_price),
            "billing_cycle" => ucfirst($this->billing_cycle),
            "duration" => $this->duration,
            "amount_billed" => formatNumber($this->amount_billed),
            "amount_received" => formatNumber($this->amount_received),
            "amount_due" => formatNumber($this->amount_due),
            "renewable" => boolval($this->renewable),
            "payment_status" => $this->payment_status,
            "status" => $this->status,
            "cancelable" => $this->status == 'Active',
            'useCase_template' => json_decode($this->usecaseTemplate)
        ];
    }
}
