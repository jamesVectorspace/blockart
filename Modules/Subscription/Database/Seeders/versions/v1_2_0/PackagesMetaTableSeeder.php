<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Subscription\Entities\Package;

class PackagesMetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $packages = ['p-starter' => 1000, 'p-premium' => 5000, 'p-platinum' => 10000];
        
        foreach ($packages as $key => $value) {
            $package = Package::where('code', $key)->first();
            
            if ($package) {
                DB::table('packages_meta')->insert([
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'type',
                        'value' => 'number',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'is_value_fixed',
                        'value' => '0',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'title',
                        'value' => 'Minute limit',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'title_position',
                        'value' => 'before',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'value',
                        'value' => $value,
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'description',
                        'value' => 'Minute description will be here',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'is_visible',
                        'value' => '1',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'minute',
                        'key' => 'status',
                        'value' => 'Active',
                    ]
                ]);
            }
        }
    }
}
