<?php
/**
 * @package AffiliateUserFilter
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Filters;

use App\Filters\Filter;
use App\Filters\query;

class AffiliateUserFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive,Pending,Deleted',
        'role' => 'int'
    ];

    /**
     * filter status  query string
     *
     * @param string $status
     * @return query builder
     */
    public function status($status)
    {
        return $this->query->where('status', $status);
    }

    public function affiliateTag($value)
    {
        return $this->query->whereHas('affiliateTags', function ($query) use ($value) {
            $query->where('affiliate_tag_id', $value);
        });
    }

    public function search($value)
    {
        $value = xss_clean($value['value']);

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('created_at', $value)
                ->orWhereHas('user', function ($query) use ($value) {
                    $query->whereLike('name', $value);
                })
                ->OrWhereLike('status', $value);
        });
    }
}
