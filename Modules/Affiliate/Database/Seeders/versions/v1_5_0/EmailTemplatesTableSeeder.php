<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class EmailTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('email_templates')->insert(array (
        1 =>
            array (
                'body' => '<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>10.NEW COUPON ADDED</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style type="text/css">
@media screen {
@font-face {
font-family: "DM Sans";
font-weight: 700;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriASitCBimCw.woff2) format("woff2");
}

@font-face {
font-family: "DM Sans";
font-weight: 500;
font-style: normal;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriAWCrCBimCw.woff2) format("woff2");
}
}

.bodys,
.tables,
td,
.anchor-tag a {
-ms-text-size-adjust: 100%;
-webkit-text-size-adjust: 100%;
}

.tables,
td {
mso-table-rspace: 0pt;
mso-table-lspace: 0pt;
}

.anchor-tag a {
padding: 1px;
margin: 1px;
}

.anchor-tag a[x-apple-data-detectors] {
font-family: inherit !important;
font-size: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
color: inherit !important;
text-decoration: none !important;
}

.bodys {
width: 100% !important;
height: 100% !important;
padding: 0 !important;
margin: 0 !important;
}

.tables {
border-collapse: collapse !important;
}

.logo-img {
margin: 26px 0px 19px 0px;
padding: 0px;
width: 207.98px;
height: 56px;
}

.anchor-tag a:focus,
.anchor-tag a:hover {
text-decoration: underline;
text-decoration-color: #fcca19;
}

.anchor-tag a:-webkit-any-link {
color: -webkit-link;
cursor: pointer;
text-decoration: underline;
text-decoration-color: #fcca19;
}

.anchor-tag a:-webkit-any-link {
color: -webkit-link;
cursor: pointer;
text-decoration: none;
text-decoration-color: #fcca19;
}
</style>
</head>

<body class="bodys" style="background-color: #e9ecef">
<div class="preheader"
style="display: none; max-width: 0; max-height: 0; margin: 0px; overflow: hidden; color: #fff; opacity: 0;"></div>
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px">
<tr>
<td align="center" valign="top" style="padding: 36px 24px"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style="max-width: 640px; margin-top: 100px">
<tr>
<td align="center" bgcolor="#ffffff">
<img class="logo-img" src="{logo}" alt="logo" />
<p style="border-top: 1px solid #dfdfdf; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#fff">
<p style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 26px 0px;
line-height: 25px; font-size: 0.8em !important; color: rgb(44, 44, 44); font-weight: 500 !important;
cursor: default !important;"></p>
<p style="margin: 0px;text-align: center; line-height: 24px; font-size: 16px;
color: #2c2c2c;"> Dear {user_name} </p>
<p style="margin: 0px; color: #898989; font-size: 14px; margin: 3px 50px 31px;
text-align: center; line-height: 24px;">The Commission is created for {ref_user}. <br>Commission amount is {com_amount}<br><a
href="{affiliate_panel}" style="text-decoration: underline; cursor: pointer; color: #0060a9;">portal</a>
to see the details of your account.</p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#ffffff">
<div>
<p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 700;
font-size: 18px; line-height: 21px; margin-top: 37px; text-align: center;
text-transform: uppercase; color: #2c2c2c;"> Keep in touch</p>
</div>
<div style="font-size: 14px; text-align: center; color: #898989;line-height: 22px; margin: 1px;">
<div style="font-size: 14px; text-align: center; color: #898989;line-height: 22px; margin: 1px;">
<p style="margin-top: 14px">If you have any queries, concerns or suggestions,
</p>
<p style="margin: 0px; margin-top: 1px">please email us:
<span style="text-decoration: underline; cursor: pointer; color: #0060a9;">{support_mail}</span>
</p>
</div>
</div>
<div style="margin-top: 32px; margin-bottom: 31px">
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block; "
href="https://www.facebook.com/"><img src="https://i.ibb.co/fCZXxCC/Group-9380.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;"
href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZLgzjS0/twitter.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px;display: inline-block; "
href="https://www.instagram.com/?hl=en"><img src="https://i.ibb.co/WKyFkYz/instagramm.png"
alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block; "
href="https://www.whatsapp.com/"><img src="https://i.ibb.co/6R7LWr1/watsapp.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;"
href="https://www.pioneer.eu/"><img src="https://i.ibb.co/wYT6Tmg/pinterest.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block; "
href="https://www.youtube.com/"><img src="https://i.ibb.co/RT7Zns1/youtube.png" alt="" /></a>
</div>
<p style="border-top: 1px solid #dfdfdf;margin: 1px 20px 0px 20px; "></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px; ">
<tr>
<td align="center" bgcolor="#ffffff">
<p style=" text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px; ">
&copy 2022, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

</html>',
                'language_id' => 1,
                'name' => 'Referral',
                'parent_id' => NULL,
                'slug' => 'referral',
                'status' => 'Active',
                'subject' => 'Referral Details',
                'variables' => 'logo,user_name, company_url, company_name,support_mail,affiliate_panel,ref_user,com_amount',
            ),
      ));
    }
}
