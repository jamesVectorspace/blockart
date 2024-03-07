<?php

/**
 * @package FaqService
 * @author TechVillage <support@techvill.org>
 * @contributor Md Khayeruzzaman <[shakib.techvill@gmail.com]>
 * @created 12-04-2023
 */

 namespace Modules\FAQ\Services;

use Modules\FAQ\Traits\FaqTrait;
use Modules\FAQ\Entities\Faq;

 class FaqService
 {
    use FaqTrait;

    /**
     * Set the variable to Public
     *
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
        $this->service = $service ?? __('Faq');
    }

    /**
     * Store Faq
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        try {
            \DB::beginTransaction();

            $faq = Faq::create($data);
            \DB::commit();

            if ($faq) {
                \Cache::forget(config('cache.prefix') . '.faq');
                return $this->saveSuccessResponse();
            }

        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Update Faq
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(array $data, int $id): array
    {
        $faq = Faq::find($id);

        if (is_null($faq)) {
            return $this->notFoundResponse();
        }

        try {
            \DB::beginTransaction();

            $faq = $faq->update($data);
            \DB::commit();

            if ($faq) {
                \Cache::forget(config('cache.prefix') . '.faq');
                return $this->saveSuccessResponse();
            }

        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Delete Faq
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $faq = Faq::find($id);

        if (is_null($faq)) {
            return $this->notFoundResponse();
        }

        if ($faq->delete()) {
            \Cache::forget(config('cache.prefix') . '.faq');
            return $this->deleteSuccessResponse();
        }

        return $this->deleteFailResponse();
    }

 }

