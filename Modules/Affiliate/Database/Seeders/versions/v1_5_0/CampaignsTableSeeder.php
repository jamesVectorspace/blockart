<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('campaigns')->delete();

        \DB::table('campaigns')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Single Product Promotion',
                'slug' => 'single-product-promotion',
                'link' => 'https://www.google.com/',
                'visibility' => NULL,
                'summary' => 'Promoting a single product requires slightly different marketing material than a whole brand. As a matter of fact, individual products would be easier to promote because you can talk about specific benefits and how they relate to your target audience. Here are some resources to promote a single product.',
                'description' => '<section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">{Awesome Product} Promo</h2>
<p>You may use any of these marketing assets:</p>
<ul>
<li>Product Name: {Awesome Product}</li>
<li>Photos: {link to product\'s main image}, {link to product\'s other images}</li>
<li>Video: {link to product\'s promo video}</li>
<li>Description: {product description}</li>
<li>Price: {product price}</li>
<li>Offer Price: {product discounted price}</li>
<li>Coupon: {coupon code}</li>
</ul>
</section><p>
</p><section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">Want to promote another product?</h2>
<ul>
<li>You may use product name, photos, videos, description and other marketing resources from our sales pages in your own promotional material.</li>
<li>To take people directly to a product\'s page, append your affiliate tracking code to the URL, test it works, and then share with your people.</li>
<li>You can use any channel of your choice - email, social media, direct promotions...</li>
<li>If you would like to provide a coupon code, please contact us and we can work something out.</li>
</ul></section>',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Email Swipes',
                'slug' => 'email-swipes',
                'link' => 'https://www.google.com/',
                'visibility' => NULL,
            'summary' => 'Email marketing has very high conversion rates. Emailing your audience about our products can be one of the quickest ways to make money. Here are some ready emails you can use (and tweak as you like).',
                'description' => '<section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">New Product Launch</h2>
<p>SUBJECT: Just Launched - Awesome Product Name</p> <textarea class="form-textarea" cols="80" rows="20">Hi,

Want to {your product\'s main benefit}?

I\'ve just discovered the right solution - {your product\'s name}.

It works really well.

{affiliate link here}

Here\'s why I love this company and their products:

* Benefit 1
* Benefit 2
* Unique Feature 1
* Unique Feature 2
* Their attention to detail
+ They\'re just super nice to do business with

If you\'re looking to {another benefit + scarcity}, this is it!

Get it here:

{affiliate link here}

To your success,
{affiliate name}
</textarea></section>',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Start Here: Common Assets, Logo, Branding',
                'slug' => 'start-here-common-assets-logo-branding',
                'link' => 'https://www.google.com/',
                'visibility' => NULL,
                'summary' => 'We\'ve included the most important design assets for you here. Please follow style guide and respect the terms of the affiliate program.',
                'description' => '<section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">Logo &amp; Style Guide</h2>
<p>Our logo and logo variations are our own property and we retain all rights afforded by US and international Law.</p>
<p>As an affiliate partner, you can use our logo on your site to promote our products. But please ensure you follow the color, sizing and other branding guidelines.</p>
<div class="grid grid-cols-4 gap-8">
<div class="flex flex-col p-8 text-center bg-white border border-gray-200"><img class="h-10" src="https://www.storeapps.org/wp-content/uploads/2020/07/storeapps-logo.svg" alt="logo"> <span class="mt-1 text-xs text-gray-500">Dark on light background</span></div>
<div class="flex flex-col p-8 text-center bg-gray-900 border border-gray-200"><img class="h-10" src="https://www.storeapps.org/wp-content/uploads/2020/07/storeapps-logo-for-dark-bg.svg" alt="logo"> <span class="mt-1 text-xs text-gray-400">Light on dark background</span></div>
<div> </div>
<div> </div>
</div>
<p><a href="#"><strong>Download logo pack</strong></a><br><span class="text-sm text-gray-600">(contains .png and .svg versions, both on light and dark backgrounds)</span></p>
<p>Before using, please <a class="underline" href="https://woocommerce.com/style-guide/">read our detailed style guide</a>: what\'s allowed and what\'s not.</p>
</section><section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">Color Palette</h2>
<div class="grid grid-cols-4 gap-8">
<div class="p-8 text-white bg-indigo-600">Primary color (Indigo): #5850ec</div>
<div class="p-8 text-white bg-gray-900">Secondary color (Dark Gray): #1a202e</div>
<div> </div>
<div> </div>
</div>
</section><section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">Typography</h2>
<p>We use one primary typeface in all our marketing materials - Proxima Nova.</p>
<p>Proxima Nova is available from Adobe Typekit. If you do not have access to it, you may use another Sans Serif font.</p>
</section><p>


</p><section class="mt-8 space-y-2">
<h2 class="text-2xl text-gray-900">Banner Ads / Creatives</h2>
<p>Feel free to create your own banners and graphics to promote us. Something your audience will resonate with. We\'ve found that works best.</p>
<p>Here are some banners that you can use as-is, or as an inspiration.</p>
<div class="flex flex-wrap flex-auto space-x-8 space-y-8 text-xs text-gray-500">
<p class="mt-8">Google Small Square (200x200 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 200px; width: 200px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="200" height="200" border="1"></p>
<p>Google Vertical Rectangle (240×400 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 400px; width: 240px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="240" height="400" border="1"></p>
<p>Google Square (250×250 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 250px; width: 250px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="250" height="250" border="1"></p>
<p>Google Inline Rectangle (300×250 px)<br><img class="bg-gray-300 border border-gray-700" style="height: 250px; width: 300px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="300" height="250" border="1"></p>
<p>Google Skyscraper (120×600 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 600px; width: 120px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="120" height="600" border="1"></p>
<p>Google Wide Skyscraper (160×600 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 600px; width: 160px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="160" height="600" border="1"></p>
<p>Google HalfPage Ad (300×600 px)<br><img class="bg-gray-300 border border-gray-700" style="height: 600px; width: 300px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="300" height="600" border="1"></p>
<p>Google Banner (468×60 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 60px; width: 468px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="468" height="60" border="1"></p>
<p>Google Leaderboard (728×90 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 90px; width: 728px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="728" height="90" border="1"></p>
<p>Google Large Leaderboard (970×90 px)<br><img class="bg-gray-300 border border-gray-700" style="height: 90px; width: 970px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="970" height="90" border="1"></p>
<p>Google Billboard (970×250 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 250px; width: 970px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="970" height="250" border="1"></p>
<p>Google Mobile Banner (320×50 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 50px; width: 320px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="320" height="50" border="1"></p>
<p>Google Large Mobile Banner (320×100 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 100px; width: 320px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="320" height="100" border="1"></p>
<p>Facebook Ad (1200×628 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 628px; width: 1200px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="1200" height="628" border="1"></p>
<p>Twitter Lead Generation Card (800×200 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 200px; width: 800px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="800" height="200" border="1"></p>
<p>Twitter Image App Card (800×320 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 320px; width: 800px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="800" height="320" border="1"></p>
<p>Youtube Display Ad (300×60 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 60px; width: 300px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="300" height="60" border="1"></p>
<p>Youtube Display Ad (300×250 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 250px; width: 300px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="300" height="250" border="1"></p>
<p>Youtube Overlay Ad (480×70 px) <br><img class="bg-gray-300 border border-gray-700" style="height: 70px; width: 480px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="480" height="70" border="1"></p>
<p>Adroll Rectangle (180×150 px)<br><img class="bg-gray-300 border border-gray-700" style="height: 150px; width: 180px;" src="https://www.storeapps.org/wp-content/uploads/2013/01/spacer.gif" width="180" height="150" border="1"></p>
</div>
<p><a href="#"><strong>Download banner pack</strong></a><br><span class="text-sm text-gray-600">(contains optimized image formats)</span></p></section>',
            ),
        ));


    }
}
