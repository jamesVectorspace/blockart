<?php

namespace Modules\Reviews\Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('reviews')->delete();

        \DB::table('reviews')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Saves time researching.',
                'comments' => 'a great tool for anyone who needs help writing content for their website, social media posts, email newsletters, blogs or the like. I love that it saves time by streamlining my research process.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Better than competitors!',
                'comments' => 'I really like Jasper so far, its generating much better content than any of the competitors I have tried.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'An incredible tool from a great team collaboration',
                'comments' => 'An incredible tool from a great team of smart entrepreneurs. It\'s 5 out 5 stars. BUT the team behind Artifism, I\'ve had the privilege of watching from a distance, as they created and built incredible tools over the years. They do great things. And create value-based solutions that make life better for their customers.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'This AI is freaking incredible!',
                'comments' => 'Writing content for my company used to take hours and my brain would be mush at the end of each day. Thank you for developing such a time/life saving tool that removes the stress from content creation.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'So easy to use!',
                'comments' => 'My community will flip for how easy it is and copy is a huge piece of what keeps them stuck.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'the landing page creator is 10X outstanding.',
                'comments' => 'For my agency, Artifism has been a game changer. With the click of a button, I can create a complete landing page. I receive 5 different variations of content so that I can choose the one that I like best. Moreover, the content rewriting feature is top-notch. And the blog writer is outstanding,',
                'rating' => 3,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'Freed my mind to be more creative.',
                'comments' => 'Delegation has always been hard for me, but writing with Jasper has enhanced my process, letting me focus on the message and not the minutiae. This has freed my mind to be more creative with my content, and further raised the level of my own writing ability.',
                'rating' => 5,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'If you\'re a serious marketer, this will be your favorite tool.',
                'comments' => 'I think this is the software of the year, maybe the decade... This is THE tool we\'re using at Lurn every single day to write our ads.',
                'rating' => 3,
                'user_id' => $this->getRandomUserId(),
                'status' => 'Active',
            ),
        ));
    }

    /**
     * Get Random User Id
     *
     * @return int
     */
    private function getRandomUserId() {
        $user = User::inRandomOrder()->first();
        return $user->id;
    }
}
