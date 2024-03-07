<?php
/**
 * @package ChatBotFilter
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Khayeruzzaman <shakib.techvill@gmail.com>
 * @created 29-07-2023
 */

namespace Modules\OpenAI\Filters;

use App\Filters\Filter;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ChatBotFilter extends Filter
{
   /**
     * Filter by usecase query string
     *
     * @param  string  $value
     * @return EloquentBuilder|QueryBuilder
     */
    public function chatCategory($value)
    {
        return $this->query->where('chat_category_id', $value);
    }

    /**
     * Filter by status query string
     *
     * @param  string  $value
     * @return EloquentBuilder|QueryBuilder
     */
    public function status($value)
    {
        return $this->query->where('status', $value);
    }

    /**
     * Filter by search query string
     *
     * @param  string  $value
     * @return EloquentBuilder|QueryBuilder
     */
    public function search($value)
    {
        $value = xss_clean($value['value']);

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('status', $value)
                ->orWhereHas('chatCategory', function($q) use ($value) {
                    $q->whereLike('name', $value);
                });
        });
      
    }
}
