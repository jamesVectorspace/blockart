<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use App\Models\Preference;
use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    public function run()
    {
        Preference::insert([
            ['category' => 'affiliate', 'field' => 'automatic_approve', 'value' => 0],
            ['category' => 'affiliate', 'field' => 'affiliate_roles', 'value' => '["1"]'],
            ['category' => 'affiliate', 'field' => 'exclude_packages', 'value' => null],
            ['category' => 'affiliate', 'field' => 'track_param', 'value' => 'ref'],
            ['category' => 'affiliate', 'field' => 'affiliate_identifier', 'value' => 1],
            ['category' => 'affiliate', 'field' => 'coupon_referral', 'value' => 0],
            ['category' => 'affiliate', 'field' => 'cookie_duration', 'value' => 0],
            ['category' => 'affiliate', 'field' => 'lifetime_commission', 'value' => 1],
            ['category' => 'affiliate', 'field' => 'lifetime_exclude_tags', 'value' => null],
            ['category' => 'affiliate', 'field' => 'lifetime_exclude_user', 'value' => null],
            ['category' => 'affiliate', 'field' => 'self_refer', 'value' => 1],
        ]);
    }
}
