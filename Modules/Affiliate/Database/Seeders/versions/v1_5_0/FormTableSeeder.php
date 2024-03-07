<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;
use Modules\Affiliate\Entities\Form;

class FormTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Form::insert([
            ['user_id' => 1, 'name' => 'Affiliate Registration Form', 'visibility' => 'PUBLIC', 'allows_edit' => 1, 'type' => 'affiliate', 'identifier' => '82433fCoGHKbPRDQeSEOpYB95l2FW1mhd', 'form_builder_json' => '[{"type":"text","required":true,"label":"Contact","placeholder":"Phone number/ Skype ID/ Best method to talk to you","className":"form-control","name":"text-1687597870497-0","subtype":"text"},{"type":"text","required":false,"label":"Website","placeholder":"website","className":"form-control","name":"text-1687598054216-0","subtype":"text"},{"type":"textarea","required":true,"label":"Introduce Yourself","placeholder":"Tell us more about yourself and why you had like to partner with us (please include your social media handles, experience promoting others, tell us about your audience etc)","className":"form-control","name":"textarea-1687598073485-0","subtype":"textarea","rows":2}]', 'custom_submit_url' => NULL, 'deleted_at' => NULL],
        ]);

    }
}
