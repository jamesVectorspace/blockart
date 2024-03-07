<?php

namespace Modules\CMS\Service;

use Illuminate\Support\Collection;
use Modules\Blog\Http\Models\Blog;
use Modules\CMS\Entities\Page;
use Modules\FAQ\Entities\Faq;
use Modules\Reviews\Entities\Review;
use Modules\Subscription\Services\PackageService;
use Modules\Subscription\Entities\{
    Package,
    PackageSubscription,
    Credit
};
use App\Models\User;



class HomepageService
{
    /**
     * Returns dynamic homepage components
     * @return mixed
     */
    public function home()
    {
        $page = Page::default()->with(['components' => function ($q) {
            $q->with(['properties', 'layout:id,file'])->orderBy('level', 'asc');
        }])->first();
        if ($page) {
            return $page;
        }
        return false;
    }

    /**
     * Get blogs collection depending on the blog type
     *
     * @param string $type
     * @param int $limit
     * @param mixed $return
     * @param array $ids
     *
     * @return mixed
     */
    public function getBlogs($type = 'latestBlogs', $limit = 10, $return = null, $ids = [])
    {

        try {
            if ($type == 'selectedBlogs') {
                return Blog::selectedBlogs($limit, $ids);
            }
            return Blog::latestBlogs($limit);
        } catch (\Exception $e) {
            return $return;
        }
    }

    /**
     * Get faqs collection depending on the faq type
     *
     * @param string $type
     * @param int $limit
     * @param mixed $return
     * @param array $ids
     *
     * @return mixed
     */
    public function getFaqs($type = 'latestFaqs', $limit = 8, $return = null, $ids = [])
    {
        try {
            if ($type == 'selectedFaqs') {
                return Faq::selectedFaqs($limit, $ids);
            }
            return Faq::latestFaqs($limit);
        } catch (\Exception $e) {
            return $return;
        }
    }

    /**
     * Get faqs collection depending on the reviews type
     *
     * @param string $type
     * @param int $limit
     * @param mixed $return
     * @param array $ids
     *
     * @return mixed
     */
    public function getReviews($type = 'latestReviews', $limit = 8, $return = null, $ids = [])
    {
        try {
            if ($type == 'selectedReviews') {
                return User::getUserReviews($type, $limit, $ids);
            }
            return User::getUserReviews($type, $limit, $ids = []);
        } catch (\Exception $e) {
            return $return;
        }
    }

    /**
     * Get Blogs type
     *
     * @return array
     */
    public static function blogsOptions()
    {
        return [
            'latestBlogs' => __('Latest Blogs'),
            'selectedBlogs' => __('Selected Blogs')
        ];
    }

    /**
     * Get Background type
     *
     * @return array
     */
    public static function backgroundOptions()
    {
        return [
            'backgroundImage' => __('Background Image'),
            'backgroundColor' => __('Background Color')
        ];
    }

    /**
     * Get Faqs type
     *
     * @return array
     */
    public static function faqsOptions()
    {
        return [
            'latestFaqs' => __('Latest Faqs'),
            'selectedFaqs' => __('Selected Faqs')
        ];
    }

    /**
     * Get Reviews type
     *
     * @return array
     */
    public static function reviewsOptions()
    {
        return [
            'latestReviews' => __('Latest Reviews'),
            'selectedReviews' => __('Selected Reviews')
        ];
    }

    /**
     * Get Plans type
     *
     * @return array
     */
    public static function planOptions()
    {
        return [
            'latestPlans' => __('Latest Plans'),
            'selectedPlans' => __('Selected Plans')
        ];
    }

    /**
     * Get Credits type
     *
     * @return array
     */
    public static function creditOptions()
    {
        return [
            'latestCredits' => __('Latest Credits'),
            'selectedCredits' => __('Selected Credits')
        ];
    }

    /**
     * Get the active brand list
     *
     * @return collection|array
     */
    public static function getBlogsList()
    {
        $blogs = Blog::getActiveBlogs();
        if ($blogs) {
            return $blogs->pluck("title", "id")->toArray();
        }
        return [];
    }

    /**
     * Get the active faq list
     *
     * @return collection|array
     */
    public static function getFaqList()
    {
        $faqs = Faq::getActiveFaqs();
        if ($faqs) {
            return $faqs->pluck("title", "id")->toArray();
        }
        return [];
    }

    /**
     * Get the active faq list
     *
     * @return collection|array
     */
    public static function getReviewList()
    {
        $reviews = Review::getActiveReviews();
        if ($reviews) {
            return $reviews->pluck("title", "id")->toArray();
        }
        return [];
    }

    /**
     * Get column count
     *
     * @param Model $component
     * @param int $total
     *
     * @return int
     */
    public function getColumnCount($component, $total = 10)
    {
        $row = intval($component->row);
        $col = intval($component->column);

        if ($col > 0 && $col <= 12) {
            return $col;
        }

        if ($row > 0) {
            $col = intval(ceil($total / $row));
            return $col == 0 ? 1 : $col;
        }

        return $total > 12 ? intval($total / 12) : $total;
    }


    /**
     * Get filterable data
     *
     * @param string $type
     * @param string $type
     *
     * @return mixed
     */
    public function getFilterableData($type, $values)
    {

        $request = request();
        $request['column'] = $type . 'ById';
        $request['q'] = $values;

        $data = (new AjaxResourceService($request))->get();

        if (!$data) {
            return [];
        }
        return $data;
    }


    /**
     * Subscription plan with their feature info
     *
     * @return array
     */

    public function getPackages($type = 'latestPlans', $limit = 3, $return = null, $ids = []) {

        $packages = [];

        if ($type == 'latestPlans') {
            $packages = Package::getAll()->where('status', 'Active')->take($limit)->sortBy('sort_order');
        } else {
            $packages = Package::getAll()->whereIn('id', $ids)->where('status', 'Active')->sortBy('sort_order');
        }
        
        $prices = [];

        foreach ($packages as $package) {
            $prices[] = $package->sale_price;
        }

        /* border color  */
        $parentClass1 = "h-max lg:w-[30.33%] pricing-width w-full";
        $parentClass2 = "h-max lg:w-[30.33%] pricing-width w-full bg-white dark:bg-color-14 rounded-[30px] card-border";
        $childClass1 = "rounded-[30px] border border-color-89 dark:border-color-47 bg-white dark:bg-color-14 6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";
        $childClass2 = "6xl:py-9 py-8 6xl:px-11 lg:px-5 px-8 sub-plan-rtl";

        /* button color  */
        $buttonClass = "mt-[34px] text-16 font-semibold py-[13px] px-8 rounded-lg font-Figtree";

        /* button name  */
        $priceColor1= "text-48 font-bold break-all";
        $priceColor2= "text-48 font-bold heading-1 break-all";

        $allPackages= [];

        foreach( $packages as $package) {

            $allPackages[] = [
                'id' => $package->id,
                'name' => $package->name,
                'trial_day' => $package->trial_day,
                'sort_order' => $package->sort_order,
                'parent_class' => max($prices) == $package->sale_price ?  $parentClass2 : $parentClass1,
                'child_class' => max($prices) == $package->sale_price ?  $childClass2 : $childClass1,
                'price_color' => max($prices) == $package->sale_price ?  $priceColor2 : $priceColor1,
                'discount_price' => $package->discount_price,
                'sale_price' => $package->sale_price,
                'billing_cycle' => $package->billing_cycle,
                'duration' => $package->duration,
                'button' =>  $buttonClass,
                'features' => PackageService::editFeature($package, false),
            ];
        }

        $subscription = PackageSubscription::where('user_id', auth()->user()->id ?? 0)->first();

        return [
            'packages' => $allPackages, 
            'subscription' => $subscription
        ];
    }

    /**
     * Available Billing Cycle 
     */
    public function billingCycle($packages)
    {
        $cycleList = [
            'lifetime' => __('Lifetime'),
            'yearly' => __('Yearly'),
            'monthly' => __('Monthly'),
            'weekly' => __('Weekly'),
            'days' => __('Days'),
        ];
        
        $cycles = [];
        
        foreach ($packages as $key => $package) {
            foreach ($package['billing_cycle'] as $billingKey => $value) {
                if ($value == 1) {
                    $cycles[$billingKey] = $cycleList[$billingKey];
                }
            }
        }
        
        // Sort the $cycles array based on the order of $cycle array
        uksort($cycles, function ($a, $b) use ($cycleList) {
            return array_search($a, array_keys($cycleList)) - array_search($b, array_keys($cycleList));
        });
        
        return $cycles;
    }

    /**
     * Subscription plan with their feature info
     *
     * @return array
     */
    public function getCredits($type = 'latestCredits', $limit = 3, $return = null, $ids = []) {
        $credits = [];

        if ($type == 'latestCredits') {
            $credits = Credit::whereNot('type', 'default')->activeStatus()->sortOrder()->take($limit)->get();

        } else {
            $credits = Credit::whereNot('type', 'default')->whereIn('id', $ids)->activeStatus()->sortOrder()->take($limit)->get();
        }

        return $credits;
    }
}
