<?php
/**
 * @package PlanResource
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 26-07-2023
 */
namespace Modules\Subscription\Http\Resources;

use App\Services\SubscriptionService;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Subscription\Entities\Package;

class PlanResource extends JsonResource
{
    /**
     * Format SalePrice
     */
    function formatSalePrice($v): string
    {
        return formatNumber($v);
    }
    
    /**
     * Format Discount Price
     */
    function formatDiscountPrice($v): string|null
    {
        return !empty($v) ? formatNumber($v) : NULL;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request = [])
    {
        $plan = Package::find($this->id);

        return [
            "id" => $this->id,
            "creator_id" => $this->user_id,
            "creator_name" => $this?->user?->name,
            "creator_image" => $this->user ? $this->user->fileUrl() : null,
            "name" => $this->name,
            "code" => $this->code,
            "short_description" => $this->short_description,
            "sale_price" => array_map([$this, 'formatSalePrice'], $this->sale_price),
            "discount_price" => array_map([$this, 'formatDiscountPrice'], $this->discount_price),
            "billing_cycle" => $this->billing_cycle,
            "duration" => $this->duration,
            "sort_order" => $this->sort_order,
            "trial_day" => $this->trial_day,
            "renewable" => boolval($this->renewable),
            "status" => $this->status,
            "features" => SubscriptionService::getFeatures($plan, false)
        ];
    }
}
