<?php

namespace Modules\FAQ\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTraits\{Filterable};
use App\Traits\ModelTrait;
use Cache;

class Faq extends Model
{
    use ModelTrait, Filterable;

    /**
     * Default number of faqs to fetch from database
     */
    private static $limit = 8;

    /**
     * Table
     * @var string
     */
    protected $table = 'faqs';

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'layout_id',
        'description',
        'status'
    ];

    /**
     * Get all use cases
     * @return [type]
     */
    public static function getAll()
    {
        $data = Cache::get(config('cache.prefix') . '.faq');
        if (is_null($data) || $data->isEmpty()) {
            $data = parent::all();
            Cache::put(config('cache.prefix') . '.faq', $data, 604800);
        }
        return $data;
    }

    /**
     * Get the latest blogs
     * @param int $limit
     *
     * @return collection
     */
    public static function latestFaqs($limit = null)
    {
        return parent::take(self::getLimit($limit))->latest()->get();
    }

    /**
     * Get the selected blogs
     *
     * @param int $limit
     * @param array $ids
     *
     * @return collection
     */
    public static function selectedFaqs($limit = null, $ids = [])
    {
        return parent::whereIn('id', $ids)
            ->limit(self::getLimit($limit))
            ->orderByRaw('FIELD(id, ' . implode(',', $ids) . ')')
            ->get();
    }

    /**
     * Query and get active faqs
     *
     * @return Collection|null
     */
    public static function getActiveFaqs()
    {
        return static::select('id', 'title')->active()->get();
    }

    /**
     * Return the maximum limit
     * @param int|null $limit
     * @return int
     */
    public static function getLimit($limit = null)
    {
        return $limit && $limit > 0 ? $limit : self::$limit;
    }

}
