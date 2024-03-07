<?php
/**
 * @package Theme Option Model
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 29-01-2022
 */

namespace Modules\CMS\Http\Models;

use App\Models\Model;
use App\Traits\ModelTrait;
use App\Traits\ModelTraits\hasFiles;
use Modules\MediaManager\Http\Models\ObjectFile;

class ThemeOption extends Model
{
    /**
     * Incrementing
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'value'];

    /**
     * Timestamp
     *
     * @var bool
     */
    public $timestamps = false;

    use ModelTrait, hasFiles;

    /**
     * Relation with Object File Model
     *
     * @var boolean
     */
    public function image()
    {
        return $this->hasOne('Modules\MediaManager\Http\Models\ObjectFile', 'object_id')->where('object_type', 'theme_options');
    }

    /**
     * Store theme data
     *
     * @param array $data
     * @return bool
     */
    public function store($data = [], $layout = 'default')
    {
        $deletedObjectIds = [];
        if (isset($data['delete_file_ids'])) {
            $deletedObjectIds = $data['delete_file_ids'];
            unset($data['delete_file_id']);
        }

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = json_encode($value);
            }
            parent::updateOrInsert(['name' => $key], ['value' => $value]);
            ObjectFile::whereIn('id', $deletedObjectIds)->delete();
        }

        $images = ['footer_logo_light', 'footer_logo_dark', 'header_logo_light', 'header_logo_dark'];
        foreach ($images as &$image) {
            $image = $layout . '_template_' . $image;
        }

        if (!empty($data['file_id']) && is_array($data['file_id'])) {
            foreach ($images as $key => $value) {
                if (!in_array($data[$value], $data['file_id'])) {
                    continue;
                }

                $result = parent::where('name', $value);

                request()->file_id = [$data[$value]];
                if (!is_null($result)) {
                    $result->first()->updateFiles(['isUploaded' => false, 'isOriginalNameRequired' => true, 'thumbnail' => true]);
                }
            }
        }
        self::forgetCache();
        return true;
    }

    /**
     * Get attribute
     *
     * @return array $this->value
     */
    public function getKeyValueAttribute()
    {
        if ($this->isJson($this->value)) {
            return json_decode($this->value, true);
        }

        return $this->value;
    }

    /**
     * Check Json
     *
     * @param string $string
     * @return boolean
     */
    public function isJson($string) {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

    /**
     * Get faq layout name
     *
     * @return array
     */
    public static function faqLayout()
    {
        $layouts = parent::where('name', 'layout_faq')->value('value');
        $layout = json_decode($layouts, true);
        return $layout;
    }

    /**
     * Get all layout name
     *
     * @return array
     */
    public static function layouts()
    {
        $layouts = parent::where('name', 'like', '%_template_%')->get()->toArray();

        $layoutName = [];
        foreach ($layouts as $key => $value) {
            $layout = explode('_template_', $value['name'])[0];
            if (!in_array($layout, $layoutName)) {
                $layoutName[] = $layout;
            }
        }
        return $layoutName;
    }
}
