<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateUserTag extends Model
{

    protected $fillable = ['affiliate_user_id', 'affiliate_tag_id'];
    public $timestamps = false;

    public function tag()
    {
        return $this->belongsTo(AffiliateTag::class, 'affiliate_tag_id', 'id');
    }

    /**
     * preference data store or update if exists
     *
     * @param $preference
     * @return bool
     */
    public static function store($data = [])
    {
        if (is_array($data)) {
            parent::insert($data);

            return true;
        }

        return false;
    }

    /**
     * remove
     *
     * @param $id
     * @return bool
     */
    public static function remove($id)
    {
        $data = parent::where('affiliate_user_id', $id);

        if ($data->exists()) {
            $data->delete();

            return true;
        }

        return false;
    }
}
