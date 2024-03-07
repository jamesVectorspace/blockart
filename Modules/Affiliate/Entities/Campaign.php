<?php

namespace Modules\Affiliate\Entities;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use ModelTrait;
    protected $fillable = ['name', 'slug', 'link', 'visibility', 'summary', 'description'];

    protected function visibility(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    /**
     * campaign store
     *
     * @param $request
     * @return bool
     */
    public static function store($request)
    {
        if (parent::create($request)) {
            self::forgetCache();
            return true;
        }

        return false;
    }

    /**
     * update campaign
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public static function updateCampaign($data, $id)
    {
        $result = parent::where('id', $id);

        if ($result->exists()) {
            $result->update($data);
            self::forgetCache();
            return true;
        }

        return false;
    }

    /**
     * campaign remove
     *
     * @param $id
     * @return array
     */
    public static function remove($id = null)
    {
        $data = ['type' => 'fail', 'message' => __('Something went wrong, please try again.')];
        $campaignInfo = parent::find($id);

        if (!empty($campaignInfo)) {
            $campaignInfo->delete();
            self::forgetCache();
            $data = ['type' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Campaign')])];
        }

        return $data;
    }
}
