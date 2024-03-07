<?php
/**
 * @package ReviewFilter
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Khayeruzzaman <shakib.techvill@gmail.com>
 * @created 18-04-2023
 */

namespace Modules\Reviews\Filters;

use App\Filters\Filter;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ReviewFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive',
        'rating' => 'int'
    ];

    /**
     * filter status  query string
     *
     * @param string $status
     * @return QueryBuilder
     */
    public function status($status)
    {
        return $this->query->where('reviews.status', $status);
    }

    /**
     * filter by rating query string
     *
     * @param int $value
     * @return QueryBuilder
     */
    public function rating($value)
    {
        return $this->query->where('rating', $value);
    }

    /**
     * filter by rating query string
     *
     * @param string $value
     * @return QueryBuilder
     */
    public function userId($value)
    {
        return $this->query->whereHas('user', function ($query)use($value) {
            $query->Where('id', $value);
        });
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
                ->orWhereLike('reviews.status', $value)
                ->orWhereHas('user', function ($query) use ($value) {
                    $query->WhereLike('name', $value);
                });
        });
    }
}
