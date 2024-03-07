<?php

/**
 * @package ReviewService
 * @author TechVillage <support@techvill.org>
 * @contributor Md Khayeruzzaman <[shakib.techvill@gmail.com]>
 * @created 19-04-2023
 */

namespace Modules\Reviews\Services;

use Modules\Reviews\Traits\ReviewTrait;
use Modules\Reviews\Entities\Review;

 class ReviewService
 {
    use ReviewTrait;

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
        $this->service = $service ?? __('Review');
    }

    /**
     * Store Review
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        try {
            \DB::beginTransaction();

            $review = Review::create($data);
            \DB::commit();

            if ($review) {
                return $this->saveSuccessResponse();
            }

        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Update Review
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(array $data, int $id): array
    {
        $review = Review::find($id);

        if (is_null($review)) {
            return $this->notFoundResponse();
        }

        try {
            \DB::beginTransaction();

            $review = $review->update($data);
            \DB::commit();

            if ($review) {
                return $this->saveSuccessResponse();
            }

        } catch (\Exception $e) {
            \DB::rollback();

            return ['status' => $this->failStatus, 'message' => $e->getMessage()];
        }

        return $this->saveFailResponse();
    }

    /**
     * Find Review
     *
     * @param int $id
     * @return [type]
     */
    public function find(int $id)
    {
        $review = Review::find($id);
        return $review;
    }

    /**
     * Delete Faq
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $review = Review::find($id);

        if (is_null($review)) {
            return $this->notFoundResponse();
        }

        if ($review->delete()) {
            return $this->deleteSuccessResponse();
        }

        return $this->deleteFailResponse();
    }

 }

