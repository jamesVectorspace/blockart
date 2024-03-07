<?php

/**
 * @package PackageService
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 16-02-2023
 */

 namespace Modules\Subscription\Services;

use Modules\Subscription\Traits\SubscriptionTrait;
use Modules\Subscription\Entities\{
    Package, PackageMeta,
    PackageSubscription,
    PackageSubscriptionMeta,
    SubscriptionDetails
};

 class PackageService
 {
    use SubscriptionTrait;

    /**
     * service name
     * @var string
     */
    public string|null $service;

    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('Package');
        }
    }

    /**
     * Store Package
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        try {
            \DB::beginTransaction();

            if ($package = Package::create($data)) {
                $this->storeMeta($data['meta'], $package->id);
                \DB::commit();

                Package::forgetCache();
                return $this->saveSuccessResponse() + ['package' => $package];
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Update Package
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(array $data, int $id): array
    {
        $package = Package::find($id);

        if (is_null($package)) {
            return $this->notFoundResponse();
        }

        try {
            \DB::beginTransaction();

            if ($package->update($data)) {
                $package->metaData()->delete();

                $this->storeMeta($data['meta'], $package->id);
                $this->updateSubscriptionUseCase($data['meta'], $package->id);
                $this->updateSubscriptionChat($data['meta'], $package->id);
                $this->updateSubscriptionImageResolution($data['meta'], $package->id);
                \DB::commit();

                Package::forgetCache();
                return $this->saveSuccessResponse();
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Delete Package
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $package = Package::find($id);

        if (is_null($package)) {
            return $this->notFoundResponse();
        }

        if ($package->delete()) {
            Package::forgetCache();

            return $this->deleteSuccessResponse();
        }

        return $this->deleteFailResponse();
    }

    /**
     * Package Features
     *
     * @return array
     */
    public static function features(): array
    {
        /**
         * Type will be bool, number, string
         * title_position will be before, after
         * When added new key and value it will need to add in blade file
         */
        return [
            "word" => [
                "type" => "number",
                "value" => preference('demo_word_limit', 1000),
                "is_value_fixed" => 0,
                "title" => "Word limit",
                "description" => __("Word description will be here"),
                "title_position" => "before",
                "is_visible" => 1,
                "usage" => 0,
            ],
            "image" => [
                "type" => "number",
                "value" => preference('demo_img_limit', 50),
                "is_value_fixed" => 0,
                "title" => "Image limit",
                "description" => __("Image description will be here"),
                "title_position" => "before",
                "is_visible" => 1,
                "usage" => 0,
            ],
            "minute" => [
                "type" => "number",
                "value" => "1000",
                "is_value_fixed" => 0,
                "title" => "Audio Limit",
                "description" => __("Audio description will be here"),
                "title_position" => "before",
                "is_visible" => 1,
                "usage" => 0,
            ],
            "character" => [
                "type" => "number",
                "value" => "200000",
                "is_value_fixed" => 0,
                "title" => "Character limit",
                "description" => __("Character description will be here"),
                "title_position" => "before",
                "is_visible" => 1,
                "usage" => 0,
            ],
            "image-resolution" => [
                "type" => "number",
                "value" => "1024",
                "is_value_fixed" => 1,
                "title" => "Max Image Resolution",
                "description" => __("Image description will be here"),
                "title_position" => "before",
                "is_visible" => 1,
                "usage" => 0,
            ]
        ];
    }

    /**
     * Edit Feature
     *
     * @param Package $package
     * @param bool $option
     * @return \App\Lib\MiniCollection
     */
    public static function editFeature(Package $package, $option = true)
    {
        $features = $package->metaData()->whereNot('feature', '')->get();
        $formatFeature = [];

        foreach ($features as $data) {
            $formatFeature[$data->feature][$data->key] = $data->value;
        }

        if (!$option) {
            return $formatFeature;
        }

        return miniCollection($formatFeature, true);
    }

    /**
     * Store meta data
     *
     * @param array $data
     * @param int $package_id
     * @return void
     */
    private function storeMeta($data, $package_id): void
    {
        $meta = [];
        foreach ($data as $key => $metaData) {
            foreach ($metaData as $k => $value) {
                $value = !is_array($value) ? $value : json_encode($value);

                $meta[] = [
                    'package_id' => $package_id,
                    'feature' => is_int($key) ? null : $key,
                    'key' => $k,
                    'value' => $value == 0 || !empty($value) ? $value : static::features()[$key][$k]
                ];
            }
        }

        PackageMeta::upsert($meta, ['package_id', 'features', 'key']);
    }
    
    /**
     * Update Subscription Use Case
     *
     * @param array $data
     * @param int $package_id
     * @return void
     */
    private function updateSubscriptionUseCase($data, $package_id): void
    {
        if (isset($data[0]['usecaseTemplate']) && isset($data[0]['usecaseCategory'])) {
            $subscriptionIds = PackageSubscription::where('package_id', $package_id)->pluck('id')->toArray();
            
            PackageSubscriptionMeta::whereIn('package_subscription_id', $subscriptionIds)
                ->where('key', 'usecaseTemplate')->update(['value' => $data[0]['usecaseTemplate']]);
                
            PackageSubscriptionMeta::whereIn('package_subscription_id', $subscriptionIds)
                ->where('key', 'usecaseCategory')->update(['value' => $data[0]['usecaseCategory']]);
        }
    }
    
    /**
     * Update Subscription Chat
     *
     * @param array $data
     * @param int $package_id
     * @return void
     */
    private function updateSubscriptionChat($data, $package_id): void
    {
        if (isset($data[0]['chatAssistants']) && isset($data[0]['chatCategory'])) {
            $subscriptionIds = PackageSubscription::where('package_id', $package_id)->pluck('id')->toArray();
            
            PackageSubscriptionMeta::whereIn('package_subscription_id', $subscriptionIds)
                ->where('key', 'chatAssistants')->update(['value' => $data[0]['chatAssistants']]);
                
            PackageSubscriptionMeta::whereIn('package_subscription_id', $subscriptionIds)
                ->where('key', 'chatCategory')->update(['value' => $data[0]['chatCategory']]);
        }
    }

    /**
     * Update Subscription Image Resolution
     *
     * @param array $data
     * @param int $package_id
     * @return void
     */
    private function updateSubscriptionImageResolution($data, $package_id): void
    {
        if (isset($data['image-resolution'])) {
            $subscriptionIds = PackageSubscription::where('package_id', $package_id)->pluck('id')->toArray();
            foreach ($data['image-resolution'] as $key => $resolution){
                PackageSubscriptionMeta::whereIn('package_subscription_id', $subscriptionIds)
                    ->where('type', 'feature_image-resolution')->where('key', $key)->update(['value' => $resolution]);
            }
        }
    }

    /**
     * Package status list
     *
     * @return array
     */
    public static function getStatuses()
    {
        return [
            'Active', 'Pending', 'Inactive', 'Expired', 'Cancel'
        ];
    }

    /**
     * Change Subscription Status
     *
     * @param int $planId
     * @param string $statusFrom
     * @param string $statusTo
     * @return void
     */
    public function changeSubscriptionStatus($planId, $statusFrom = 'Pending', $statusTo = 'Expired')
    {
        PackageSubscription::where(['package_id' => $planId, 'status' => $statusFrom])->update(['status' => $statusTo]);
        SubscriptionDetails::where(['package_id' => $planId, 'status' => $statusFrom])->update(['status' => $statusTo]);
    }
 }
