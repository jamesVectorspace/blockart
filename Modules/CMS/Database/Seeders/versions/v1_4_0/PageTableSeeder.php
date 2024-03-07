<?php

namespace Modules\CMS\Database\Seeders\versions\v1_4_0;

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pages')->where('slug', 'privacy-policy')->update([
            'name' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'css' => '* { box-sizing: border-box; } body {margin: 0;}',
            'description' => '<body id="idnh"><section class="bdg-sect">
            <p class="paragraph"><br />
            <span>At Artifism, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, disclose, and protect the information you provide when using our project, Artifism, which utilizes OpenAI technology. By using Artifism, you consent to the practices described in this Privacy Policy.</span><br />
            <br />
            <strong><big>Information We Collect:</big></strong><br />
            <br />
            <strong>1.1.</strong> <span>Personal Information: When you interact with Artifism, we may collect certain personally identifiable information, including but not limited to your name, email address, and any additional information you voluntarily provide. We only collect personal information that is necessary to provide you with the services offered by Artifism. </span><br />
            <br />
            <strong>1.2.</strong> <span>Usage Information: We may also collect non-personally identifiable information about your usage of Artifism, such as your IP address, device information, browser type, and operating system. This information is collected automatically and is used to improve the functionality and performance of Artifism. </span><br />
            <br />
            <strong>2.1.</strong> <span>Personal Information: We use the personal information we collect to provide and improve the services offered by Artifism. This includes responding to your inquiries, providing customer support, and delivering personalized content. We may also use your personal information to send you important updates and notifications about Artifism or promotional materials if you have opted-in to receive them. </span><br />
            <br />
            <strong>2.2.</strong> <span>Usage Information: The non-personally identifiable information we collect is used for statistical purposes, to analyze trends, administer Artifism, and gather demographic information about our user base. This information helps us enhance the user experience, optimize Artifism&#39;s performance, and ensure the security of our systems. </span><br />
            <br />
            <big><strong>Information Sharing and Disclosure:</strong></big><br />
            <br />
            <strong>3.1. </strong><span>Third-Party Service Providers: We may share your personal information with trusted third-party service providers who assist us in operating Artifism, such as hosting providers, analytics providers, and customer support providers. These third parties are bound by confidentiality obligations and are only authorized to use your personal information as necessary to provide services to us. </span><br />
            <br />
            <strong>3.2. </strong><span>Legal Requirements: We may disclose your personal information if required by law, regulation, or legal process, or if we believe that such disclosure is necessary to protect our rights, enforce our Terms of Service, or respond to a legal request. </span><br />
            <br />
            <big><strong>Data Security:</strong></big><br />
            <br />
            <span>We take reasonable measures to protect your personal information from unauthorized access, loss, misuse, or alteration. However, please note that no method of transmission over the internet or electronic storage is 100% secure. Therefore, while we strive to protect your personal information, we cannot guarantee its absolute security.</span><br />
            <br />
            <strong><big>Your Rights and Choices:</big></strong><br />
            <br />
            <span>5.1. Access and Correction: You have the right to access, correct, or update your personal information held by us. You can do so by contacting us using the information provided at the end of this Privacy Policy. </span><br />
            <br />
            <span>5.2. Opt-Out: If you no longer wish to receive promotional communications from us, you can opt-out by following the unsubscribe instructions provided in those communications.</span><br />
            <br />
            <strong><big>Third-Party Links:</big></strong><br />
            <br />
            <span>Artifism may contain links to third-party websites or services that are not operated by us. This Privacy Policy does not apply to those third-party websites or services. We recommend reviewing the privacy policies of those third parties before interacting with them. </span><br />
            <br />
            <strong><big>Children&#39;s Privacy:</big></strong><br />
            <br />
            <span> is not intended for individuals under the age of 18. We do not knowingly collect personal information from individuals under 18 years of age. If you believe we may have inadvertently collected information from a child under 18, please contact us using the information provided below, and we will promptly delete that information. </span><br />
            <br />
            <big><strong>Changes to this Privacy Policy:</strong></big><br />
            <br />
            <span>We reserve the right to modify this Privacy Policy at any time. Any changes we make will be effective immediately upon posting the updated Privacy Policy on Artifism. We encourage you to review this Privacy Policy periodically to stay informed about our privacy practices. </span><br />
            <br />
            <big><strong>Contact Us:</strong></big><br />
            <br />
            <span>If you have any questions or concerns about this Privacy Policy or our privacy practices, please contact us at [Insert contact information].<br />
            By using Artifism, you acknowledge that you have read, understood, and agreed to the terms of this Privacy Policy.<br />
            End of Privacy Policy. </span></p></section></body>',
            'meta_title' => 'Privacy Policy',
            'meta_description' => 'Protecting your privacy is our top priority. Discover how Artifism, powered by OpenAI, safeguards your personal information while providing an exceptional user experience. Read our privacy policy for transparency on data collection, usage, and security measures.',
            'status' => 'Active',
            'type' => 'page',
            'layout' => 'default',
            'default' => 0,
        ]);
       

    }
}
