<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_4_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Subscription\Entities\{
    Package,
    PackageMeta
};

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

        $packages = Package::pluck('id');
        
        foreach ($packages as $packageId) {
            $meta = PackageMeta::where(['package_id' => $packageId, 'key' => 'chatCategory'])->first();
            if (!$meta) {
                DB::table('packages_meta')->insert([
                    [
                        'package_id' => $packageId,
                        'feature' => '',
                        'key' => 'chatCategory',
                        'value' => '["1","5","4","3","2"]',
                    ],
                    [
                        'package_id' => $packageId,
                        'feature' => '',
                        'key' => 'chatAssistants',
                        'value' => '["HJREY","HJREY-2","HJREY-3","ZXCVB-7","MNBVC-6","QWERT-2","QWERT-3","LKJHG-9","MNOPQ-2","ZXCVB-5","ASDFG-1","ZXCVB-4","HJREY-4","PLKDS-2","RTYUI-6","ZXCVB-7","MNBVC-2","LKJHG-2","ZXCVB-8","PLKJH-4","MNBVC-8","HJREW-7","ZXCVB-9","LKJHG-3","QWERT-6"]',
                    ]
                ]);
            }
        }

        $packages = [
            'p-starter' => 200000,
            'p-premium' => 400000,
            'p-platinum' => 500000
        ];
        
        foreach ($packages as $key => $value) {
            $package = Package::where('code', $key)->first();
            
            if ($package) {
                DB::table('packages_meta')->insert([
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'type',
                        'value' => 'number',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'is_value_fixed',
                        'value' => '0',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'title',
                        'value' => 'Character limit',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'title_position',
                        'value' => 'before',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'value',
                        'value' => $value,
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'description',
                        'value' => 'Character description will be here',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'is_visible',
                        'value' => '1',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'status',
                        'value' => 'Active',
                    ]
                ]);
            }
        }
        
        $allPackages = Package::get();
        
        foreach ($allPackages as $package) {
            $meta = PackageMeta::where(['package_id' => $package->id, 'feature' => 'character'])->first();
            if (!$meta) {
                DB::table('packages_meta')->insert([
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'type',
                        'value' => 'number',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'is_value_fixed',
                        'value' => '0',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'title',
                        'value' => 'Character limit',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'title_position',
                        'value' => 'before',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'value',
                        'value' => '0',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'description',
                        'value' => 'Character description will be here',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'is_visible',
                        'value' => '1',
                    ],
                    [
                        'package_id' => $package->id,
                        'feature' => 'character',
                        'key' => 'status',
                        'value' => 'Active',
                    ]
                ]);
            }
        }
    }
}
