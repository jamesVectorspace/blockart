<?php
/**
 * @package Object File Model
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 02-07-2022
 */

namespace Modules\MediaManager\Http\Models;

use App\Models\Model;
use App\Traits\ModelTraits\hasFiles;

class ObjectFile extends Model
{
    use hasFiles;

    /**
     * Timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Store In Object Files
     *
     * @param string|null $objectType
     * @param int|null $objectId
     * @param array|null $fileIds
     * @return bool
     */
	public static function storeInObjectFiles($objectType = null, $objectId = null, $fileIds = null)
    {
        $objectFiles = [];
		if (sizeof($fileIds) > 0) {
			foreach ($fileIds as $data) {
				$objectFiles[] = [
					'object_type' => $objectType,
					'object_id' => $objectId,
					'file_id' => $data,
				];
			}
			return parent::insert($objectFiles);
		}

    }

    /**
     * Delete Files
     *
     * @param string|null $objectType
     * @param int|null $objectId
     * @param array $options
     * @param string|null $path
     * @return string|false
     */
    public function deleteFiles($objectType = null, $objectId = null, $options = [], $path = null)
	{
		$result['status'] = 0;
		$result['fileStatus'] = __(':x does not exist.', ['x' => __('Attachment')]);
		$files = $this->getFiles($objectType, $objectId, $options);
		if (!empty($files)) {
			foreach ($files as $key => $value) {
				if ($this->where('id', $value->id)->delete()) {
					$result['status'] = 1;
				}
			}
		}
		return json_encode($result);
	}

    /**
     * Unlink File
     *
     * @param string $file
     * @return array
     */
    public function unlinkFile($file)
	{
		$result['status'] = 0;
		$result['fileStatus'] = __(':x does not exist.', ['x' => __('Attachment')]);
		if (isExistFile($file)) {
			objectStorage()->delete($file);
			$result['status'] = 1;
			$result['fileStatus'] = __("Attachment deleted");
		}
		return $result;
	}

    /**
     * GEt Files
     *
     * @param string|null $objectType
     * @param int|null $objectId
     * @param array $options
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getFiles($objectType = null, $objectId = null,	$options = [])
	{
		$options = array_merge(['ids' => [], 'isExcept' => false, 'limit' => null], $options);
		if (empty($objectType) && empty($objectId) && empty($options['ids'])) {
			return [];
		}
		$query = $this->whereNotNull('object_id')->select();
		if (!empty($objectType) && !empty($objectId)) {
			$objectId = !is_array($objectId) ? [$objectId] : $objectId;
			$query->where('object_type', $objectType)->whereIn('object_id', $objectId);
		}
		if (!empty($options['ids'])) {
			if ($options['isExcept']) {
				$query->whereNotIn('id', $options['ids']);
			} else {
				$query->whereIn('id', $options['ids']);
			}
		}
		if (!empty($options['limit'])) {
			$query->limit($options['limit']);
		}

		return $query->get();
	}
}
