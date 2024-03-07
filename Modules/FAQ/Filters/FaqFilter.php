<?php
/**
 * @package FaqFilter
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Khayeruzzaman <shakib.techvill@gmail.com>
 * @created 15-04-2023
 */

namespace Modules\FAQ\Filters;

use App\Filters\Filter;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class FaqFilter extends Filter
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
     * @return QueryBuilder
     */
    public function status($status)
    {
        return $this->query->where('status', $status);
    }

    /**
     * Filter by search query string
     *
     * @param  string  $value
     * @return EloquentBuilder|QueryBuilder
     */
    public function search($value)
    {
        if (gettype($value) == 'string') {
            $value = xss_clean($value);
        } else if (gettype($value) == 'array') {
            $value = xss_clean($value['value']);
        }

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('title', $value)
                ->OrWhereLike('status', $value);
        });
    }
}
