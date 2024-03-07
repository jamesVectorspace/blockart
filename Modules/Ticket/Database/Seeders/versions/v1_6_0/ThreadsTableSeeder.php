<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('threads')->delete();

        \DB::table('threads')->insert(array(
            0 =>
            array(
                'id' => 1,
                'receiver_id' => 2,
                'email' => 'user@techvill.net',
                'name' => 'Blaine Keller',
                'thread_type' => 'TICKET',
                'priority_id' => 2,
                'thread_status_id' => 6,
                'thread_key' => '',
                'subject' => 'Pellentesque in ipsum id orci porta dapibus.',
                'sender_id' => 1,
                'date' => randomDateBetween(-30, -50),
                'project_id' => NULL,
                'last_reply' => now(),
                'assigned_member_id' => 1,
            ),
            1 =>
            array(
                'id' => 2,
                'receiver_id' => 3,
                'email' => 'jamal@techvill.net',
                'name' => 'Jamal',
                'thread_type' => 'TICKET',
                'priority_id' => 1,
                'thread_status_id' => 6,
                'thread_key' => '',
                'subject' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',
                'sender_id' => 1,
                'date' => randomDateBetween(-30, -50),
                'project_id' => NULL,
                'last_reply' => now(),
                'assigned_member_id' => 1,
            ),
            2 =>
            array(
                'id' => 3,
                'receiver_id' => 4,
                'email' => 'henrywilliam@techvill.net',
                'name' => 'Henry William',
                'thread_type' => 'TICKET',
                'priority_id' => 3,
                'thread_status_id' => 6,
                'thread_key' => '',
                'subject' => 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.',
                'sender_id' => 1,
                'date' => randomDateBetween(-30, -50),
                'project_id' => NULL,
                'last_reply' => now(),
                'assigned_member_id' => 1,
            )
        ));
    }
}
