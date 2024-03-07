<?php

namespace Modules\Affiliate\Entities;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateTag extends Model
{
    use ModelTrait;
    protected $fillable = ['name', 'slug', 'parent_id', 'summary'];

    /**
     * relation with parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentTag()
    {
        return $this->belongsTo(AffiliateTag::class, 'parent_id', 'id');
    }

    /**
     * tag store
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
     * update tag
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public static function updateTag($data, $id)
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
     * tag remove
     *
     * @param $id
     * @return array
     */
    public static function remove($id = null)
    {
        $data = ['type' => 'fail', 'message' => __('Something went wrong, please try again.')];
        $record = AffiliateUserTag::where('affiliate_tag_id', $id);

        if ($record->exists()) {
            return ['type' => 'fail', 'message' => __('Can not be deleted. This :x has records!', ['x' => __('Tag')])];
        }

        $tagInfo = parent::find($id);

        if (!empty($tagInfo)) {
            $tagInfo->delete();
            self::forgetCache();
            $data = ['type' => 'success', 'message' => __('The :x has been successfully deleted.', ['x' => __('Tag')])];
        }

        return $data;
    }
}
