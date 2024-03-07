<?php
namespace Modules\MenuBuilder\Http\Models;

use App\Models\Model;
use URL;

class AdminMenus extends Model
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get Url
     *
     * @return string
     */
    public function getUrl()
    {
        return URL::to('/');
    }
}
