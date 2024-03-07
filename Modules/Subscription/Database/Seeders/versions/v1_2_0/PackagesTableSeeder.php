<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;
use Modules\Subscription\Entities\Package;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $packages = \DB::table('packages')->get();
        
        foreach ($packages as $package) {
            $data = [
                'yearly' => 0,
                'monthly' => 0,
                'weekly' => 0,
                'days' => 0
            ];
            
            $billingCycle = $data;
            $billingCycle[$package->billing_cycle] = 1;
            
            $salePrice = $data;
            $salePrice[$package->billing_cycle] = $package->sale_price;
            
            $discountPrice = $data;
            $discountPrice[$package->billing_cycle] = $package->discount_price;
            
            \DB::table('packages')->where('id', $package->id)->update([
                'billing_cycle' => $billingCycle,
                'sale_price' => $salePrice,
                'discount_price' => $discountPrice
            ]);
        }
    }
}
