<?php

namespace Modules\Affiliate\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AjaxSelectAffiliteUserResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->user?->name
        ];
    }
}
