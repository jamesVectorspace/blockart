<?php

namespace Modules\Affiliate\Entities;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawRequest extends Model
{
    use ModelTrait;
    protected $fillable = ['affiliate_user_id', 'withdrawal_method_id', 'amount', 'status', 'note'];

    public function affiliateUser()
    {
        return $this->belongsTo(AffiliateUser::class, 'affiliate_user_id', 'id');
    }

    public function withdrawalsMethod()
    {
        return $this->belongsTo(WithdrawalMethod::class, 'withdrawal_method_id', 'id');
    }

    /**
     * store
     *
     * @param $request
     * @return bool
     */
    public static function store($request)
    {
        if (parent::create($request)) {
            return true;
        }

        return false;
    }

    /**
     * update
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public static function withdrawRequestUpdate($data = [], $id)
    {
        $result = parent::where('id', $id);

        if ($result->exists()) {
            $result->update($data);
            return true;
        }

        return false;
    }
}
