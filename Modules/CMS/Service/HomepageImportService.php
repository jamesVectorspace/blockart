<?php

/**
 * @package HomepageExportService
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Al Mamun <[almamun.techvill@gmail.com]>
 * @created 05-09-2023
 */

namespace Modules\CMS\Service;

use App\Models\File;

use Modules\CMS\Entities\{
    Component,
    ComponentProperty,
    Page
};
use Modules\CMS\Http\Models\{
    Slide,
    Slider
};
use Modules\CMS\Http\Models\ThemeOption;
use Modules\MediaManager\Http\Models\ObjectFile;

use ZipArchive;

use Illuminate\Support\Facades\{
    Artisan,
    DB,
    File as FacadeFile
};

class HomepageImportService
{
    /**
     * Slug
     *
     * @var string
     */
    private $slug;

    /**
     * Success Message
     *
     * @var string
     */
    private $successMessage = '';

    /**
     * Error Message
     *
     * @var string
     */
    private $errorMessage = '';

    /**
     * Page
     *
     * @var object
     */
    private $page;

    /**
     * Themes
     *
     * @var object
     */
    private $themes;

    /**
     * Home Resource
     *
     * @var array
     */
    private $homeResource;

    /**
     * Import
     *
     * @return $this
     */
    public function import()
    {
        DB::beginTransaction();
        try {
            $this
                ->upload()
                ->setSlug()
                ->checkValidity()
                ->refactorResource()
                ->storePage()
                ->storeThemes()
                ->storeImages()
                ->finished();

            DB::commit();
        } catch (\Exception $e) {
            $this->errorMessage = $e->getMessage();
            FacadeFile::deleteDirectory(storage_path('homepage/unzipped'));
            DB::rollBack();
        }

        return $this;
    }

    /**
     * Upload in storage
     *
     * @return $this
     */
    private function upload()
    {
        if (!class_exists('ZipArchive')) {
            $this->errorMessage = __('Please install ZipArchive.');

            return $this;
        }

        $zip = new ZipArchive;
        $res = $zip->open(request()->attachment);

        $storagePath = storage_path('homepage/unzipped');

        if (is_dir($storagePath)) {
            FacadeFile::deleteDirectory($storagePath);
        }

        if ($res === true) {
            $res = $zip->extractTo($storagePath);
            $zip->close();
        }

        return $this;
    }

    /**
     * Set Slug
     *
     * @return $this;
     */
    private function setSlug()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $files = FacadeFile::files(storage_path('homepage/unzipped'));

        $jsonFiles = array_filter($files, function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'json';
        });

        if (!isset($jsonFiles[0])) {
            $this->errorMessage = __('Trying to import invalid homepage.');

            return $this;
        }

        $this->slug = pathinfo($jsonFiles[0], PATHINFO_FILENAME);

        return $this;
    }

    /**
     * Check homepage validity
     *
     * @return $this
     */
    private function checkValidity()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $resourcePath = storage_path('homepage/unzipped/' . $this->slug . '.json');

        if (!FacadeFile::exists($resourcePath)) {
            $this->errorMessage = __('Trying to import invalid homepage.');
        }

        return $this;
    }

    /**
     * Merge Resource
     *
     * @return $this
     */
    private function refactorResource()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $jsonFilePath = storage_path('homepage/unzipped/' . $this->slug . '.json');

        // Read the JSON file as a string
        $jsonString = FacadeFile::get($jsonFilePath);

        // Decode the JSON string into an array
        $this->homeResource = json_decode($jsonString, true);

        $this->replaceLinks();

        $this->page = $this->homeResource['page'];
        $this->themes = $this->homeResource['themes'];

        return $this;
    }

    /**
     * Replace Link
     *
     * @return $this
     */
    private function replaceLinks()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $replaceFrom = [
            'https:\\/\\/demo.artifism.techvill.net\\',
            'https://demo.artifism.techvill.net',
            str_replace('"', '', json_encode($this->homeResource['base_url']))
        ];

        $replaceTo = url('/');

        array_walk_recursive($this->homeResource, function (&$value) use ($replaceFrom, $replaceTo) {
            $value = str_replace($replaceFrom, $replaceTo, $value);
        });

        return $this;
    }

    /**
     * Store Page
     *
     * @return $this
     */
    private function storePage()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $page = Page::where('slug', $this->slug)->first();

        if ($page) {
            $this->errorMessage = __('The :x already exists.', ['x' => __('Homepage')]);

            return $this;
        }

        $page = Page::create($this->page);

        if ($page->default == '1') {
            $page->update(['default' => '0']);
        }

        $componentProperties = [];

        foreach ($this->page['components'] as $component) {
            $componentId = Component::insertGetId([
                "page_id" => $page->id,
                "layout_id" => $component['layout_id'],
                "level" => $component['level']
            ]);

            foreach ($component['properties'] as $property) {
                $componentProperties[] = [
                    "component_id" => $componentId,
                    "name" => $property['name'],
                    "type" => $property['type'],
                    "value" => is_array($property['value']) ? json_encode($property['value']) : $property['value']
                ];
            }
        }

        ComponentProperty::insert($componentProperties);

        return $this;
    }

    /**
     * Store Themes
     *
     * @return $this;
     */
    private function storeThemes()
    {
        if ($this->errorMessage) {
            return $this;
        }

        $themes = ThemeOption::where('name', 'like', $this->page['layout'] . '_template%')->get();

        if ($themes->count()) {
            return $this;
        }

        foreach ($this->themes as $theme) {
            $themeId = ThemeOption::insertGetId([
                "name" => $theme['name'],
                "value" => $theme['value']
            ]);

            if ($theme['file']) {
                $fileId = File::insertGetId([
                    "params" => json_encode($theme['file']['params']),
                    "object_type" => $theme['file']['object_type'],
                    "object_id" => $theme['file']['object_id'],
                    "uploaded_by" => $theme['file']['uploaded_by'],
                    "file_name" => $theme['file']['file_name'],
                    "file_size" => $theme['file']['file_size'],
                    "original_file_name" => $theme['file']['original_file_name']
                ]);

                ObjectFile::insert([
                    "object_type" => $theme['object_file']['object_type'],
                    "object_id" => $themeId,
                    "file_id" => $fileId
                ]);
            }
        }

        return $this;
    }

    /**
     * Store Images
     *
     * @return $this
     */
    private function storeImages()
    {
        if ($this->errorMessage) {
            return $this;
        }

        FacadeFile::copyDirectory(storage_path('homepage/unzipped/images') , public_path('uploads/'));

        $this->successMessage = __('Images successfully copied.');

        return $this;
    }

    /**
     * Finished
     *
     * @return $this
     */
    private function finished()
    {
        if (!$this->errorMessage) {
            $this->successMessage = __('Homepage successfully imported');
        }

        FacadeFile::deleteDirectory(storage_path('homepage/unzipped'));

        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');

        return $this;
    }

    /**
     * Get Boolean Response
     *
     * @return bool
     */
    public function getBoolResponse()
    {
        return !boolval($this->errorMessage);
    }

    /**
     * Get Array Response
     *
     * @return array
     */
    public function getArrayResponse()
    {
        if ($this->getBoolResponse()) {
            return [
                'status' => 'success',
                'message' => $this->successMessage
            ];
        }

        return [
            'status' => 'fail',
            'message' => $this->errorMessage
        ];
    }
}
