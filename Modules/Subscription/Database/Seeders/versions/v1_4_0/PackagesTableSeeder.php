<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_4_0;

use Illuminate\Database\Seeder;

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
            if (str_contains($package->sale_price, 'lifetime')) {
                continue;
            }
            
            $salePrice = ['lifetime' => 0] + json_decode($package->sale_price, true);
            $discountPrice = ['lifetime' => 0] + json_decode($package->discount_price, true);
            $billingCycle = ['lifetime' => 0] + json_decode($package->billing_cycle, true);
            
            \DB::table('packages')->where('id', $package->id)->update([
                'billing_cycle' => $billingCycle,
                'sale_price' => $salePrice,
                'discount_price' => $discountPrice
            ]);
        }
    }
}
