<?php
/**
 * @package CreditFilter
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 13-08-2023
 */

namespace Modules\Subscription\Filters;

use App\Filters\Filter;

class CreditFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive'
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

    /**
     * filter by search query string
     *
     * @param string $value
     * @return query builder
     */
    public function search($value)
    {
        $value = $value['value'];
        if (!empty($value)) {
            return $this->query->where(function ($query) use ($value) {
                $query->WhereLike('name', $value)
                ->OrWhereLike('code', $value)
                ->OrWhereLike('price', $value)
                ->OrWhereLike('status', $value);
            });
        }

    }
}
