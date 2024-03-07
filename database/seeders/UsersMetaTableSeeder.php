<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersMetaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users_meta')->delete();

        \DB::table('users_meta')->insert(array (
            0 =>
            array (
                'id' => 1,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'Entrepreneur',
            ),
            1 =>
            array (
                'id' => 2,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'description',
                'value' => 'Agatha Williams is a visionary entrepreneur, making waves in the business world with his innovative ideas and unwavering determination. With a keen eye for opportunities, he has successfully founded and led multiple ventures, leaving a significant impact on various industries. Agatha\'s passion for growth and empowerment drives him to inspire others to achieve greatness. A trailblazer and trendsetter, he continues to redefine success and shape the future of entrepreneurship.',
            ),
            2 =>
            array (
                'id' => 3,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com',
            ),
            3 =>
            array (
                'id' => 4,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'twitter',
                'value' => 'https://www.twitter.com',
            ),
            4 =>
            array (
                'id' => 5,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'instagram',
                'value' => 'https://www.instagram.com',
            ),
            5 =>
            array (
                'id' => 6,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 15,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'Teacher',
            ),
            6 =>
            array (
                'id' => 7,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 15,
                'type' => 'string',
                'key' => 'description',
                'value' => 'Henry Willium is a passionate teacher specializing in machine learning and AI education. With a wealth of expertise, he empowers students to explore the fascinating world of AI, sparking curiosity and nurturing innovative minds for the future.',
            ),
            7 =>
            array (
                'id' => 8,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 15,
                'type' => 'string',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com',
            ),
            8 =>
            array (
                'id' => 9,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 15,
                'type' => 'string',
                'key' => 'twitter',
                'value' => 'https://www.twitter.com',
            ),
            9 =>
            array (
                'id' => 10,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 15,
                'type' => 'string',
                'key' => 'instagram',
                'value' => 'https://www.instagram.com',
            ),
            10 =>
            array (
                'id' => 11,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 18,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'Student',
            ),
            11 =>
            array (
                'id' => 12,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 20,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'UX Designer',
            ),
            12 =>
            array (
                'id' => 13,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 21,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'Student',
            ),
        ));


    }
}
