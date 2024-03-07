<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmailTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now();

        \DB::table('email_templates')->delete();
        
        \DB::table('email_templates')->insert(array (
            0 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'name' => 'User',
                'slug' => 'user',
                'subject' => 'Welcome to {company_name} as an user',
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
text-align: center; line-height: 24px;">A warm welcome to {company_name} family, please login to the <a
href="{company_url}" style="text-decoration: underline; cursor: pointer; color: #0060a9;">portal</a>
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
&copy; 2023, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

</html>',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'logo,user_name, company_url, company_name,support_mail',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'name' => 'Email Verification',
                'slug' => 'email-verification',
                'subject' => 'Active user information',
                'body' => '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>2.otp</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style type="text/css">
@media screen {
@font-face {
font-family: "DM Sans";
font-weight: 700;
src:   url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriASitCBimCw.woff2)
format("woff2");
}
@font-face {
font-family: "DM Sans";
font-weight: 500;
font-style: normal;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriAWCrCBimCw.woff2)
format("woff2");
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
.actives {
box-sizing: border-box;
text-decoration: none;
-webkit-text-size-adjust: none;
text-align: center;
border-radius: 2px;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-khtml-border-radius: 2px;
-o-border-radius: 2px;
-ms-border-radius: 2px;
padding: 10px 31px;
cursor: pointer;
background: #fcca19;
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
<div class="preheader" style="display: none; max-width: 0; max-height: 0; margin: 0px; overflow: hidden; color: #fff; opacity: 0;"></div>
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="center" bgcolor="#e9ecef">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px">
<tr>
<td align="center" valign="top" style="padding: 36px 24px"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; margin-top: 100px">
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
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#fff">
<p style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 26px 0px 20px 0px; line-height: 25px;
font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">account confirmation</p>
<p style="font-family: \'DM Sans\', sans-serif; font-weight: 500 !important; font-style: normal; margin: 0px; color: #2C2C2C; font-size: 14px; margin: 15px 54px 28px; text-align: center; line-height: 24px;"> You’re almost there! Please use the OTP code given or click on the button below to confirm your email address and enjoy exclusive services with us!
</p>
<p style="font-family: \'DM Sans\', sans-serif; font-weight: 500 !important; font-style: bold; margin: 0px; color: #2C2C2C; font-size: 14px; margin: 15px 54px 28px; text-align: center; line-height: 24px;"><b>Important notice:</b> The OTP code or link is set to expire within <b>{token_otp_expire} seconds</b>. To avoid any inconvenience, please enter it promptly. </p>
<p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 14px;line-height: 28px; text-align: center; color: #2C2C2C; margin-bottom: 8px; text-transform: uppercase; {otp_active}">otp code</p>
<p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 700;  font-size: 36px;
line-height: 28px; text-align: center; letter-spacing: 0.375em; color: #2C2C2C; margin-bottom: 15px; {otp_active}">{verification_otp}</p>
<p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500;font-size: 14px; line-height: 24px; text-align: center; color: #898989; margin-bottom: 32px; text-transform: uppercase; {token_otp_active}">or</p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#ffffff">
<div style="{token_active}">
<a href="{verification_url}" aria-pressed="true" class="actives anchor-tag">
<span style="text-decoration: none; color: #2C2C2C;">Confirm Account</span>
</a>
</div>
<div style="font-size: 14px; text-align: center; color: #898989; line-height: 22px; margin: 1px;">
<p style="margin-top: 54px"> If you have any queries, concerns or suggestions,</p>
<p style="margin: 0px; margin-top: 1px"> please email us:
<span style="text-decoration: underline; cursor: pointer; color: #0060a9;">{support_mail}</span>
</p>
</div>
<div style="margin-top: 25px; margin-bottom:14px;">
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://www.facebook.com/"><img src="https://i.ibb.co/fCZXxCC/Group-9380.png" alt=""/></a>
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZLgzjS0/twitter.png" alt=""/></a>
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://www.instagram.com/?hl=en"><img src="https://i.ibb.co/WKyFkYz/instagramm.png" alt="" /></a>
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://www.whatsapp.com/"><img src="https://i.ibb.co/6R7LWr1/watsapp.png" alt=""/></a>
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://www.pioneer.eu/"> <img style="margin: -2px;" src="https://i.ibb.co/wYT6Tmg/pinterest.png" alt="" /></a>
<a class="anchor-tag "style="margin-right: 9px; width: 32px; height:32px; display: inline-block;" href="https://www.youtube.com/"><img style="margin: 1px;" src="https://i.ibb.co/RT7Zns1/youtube.png" alt=""/></a>
</div>
<p style="border-top: 1px solid #dfdfdf; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table  class="tables" border="0" cellpadding="0" cellspacing="0"  width="100%"style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px; ">
<tr>
<td align="center" bgcolor="#ffffff">
<p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;" > &copy 2022, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'logo, verification_url, company_name,verification_otp,support_mail,otp_active,token_active,token_otp_active, token_otp_expire',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            2 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'name' => 'New Password Set',
                'slug' => 'new-password-set',
                'subject' => 'New Password Set',
                'body' => '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>1.Password Reset</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style type="text/css">
@media screen {
@font-face {
font-family: "DM Sans";
font-weight: 700;
src:   url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriASitCBimCw.woff2)
format("woff2");
}
@font-face {
font-family: "DM Sans";
font-weight: 500;
font-style: normal;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriAWCrCBimCw.woff2)
format("woff2");
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
.actives {
box-sizing: border-box;
text-decoration: none;
-webkit-text-size-adjust: none;
text-align: center;
border-radius: 2px;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-khtml-border-radius: 2px;
-o-border-radius: 2px;
-ms-border-radius: 2px;
padding: 10px 31px;
cursor: pointer;
background: #fcca19;
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
<div class="preheader" style="display: none; max-width: 0; max-height: 0; margin: 0px; overflow: hidden; color: #fff; opacity: 0;"></div>
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
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; margin-top: 100px">
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
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#fff">
<p style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 26px 0px; line-height: 25px;
font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;"> Updated Your Password</p>
<p style="margin: 0px; text-align: center; line-height: 24px; font-size: 16px; color: #2c2c2c;" > Dear {user_name}</p>
<p style="margin: 0px; color: #898989; font-size: 14px; margin: 15px 54px 42px; text-align: center; line-height: 24px;"> You have requested to reset the password of your {company_name} account. Your new password has been set. You can check the update going through the portal.
</p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#ffffff">

<div>
<p style="color: #2C2C2C;">Credentials:</p>
<p style="margin: 0px; color: #898989; font-size: 14px; text-align: center; line-height: 24px;">
<span style="color: #2c2c2c; padding-right: 2px;">Email:</span>{user_id}
</p>
<p style="margin: 0px; color: #898989; font-size: 14px; text-align: center; line-height: 24px;">
<span style="color: #2c2c2c; padding-right: 2px;">Password:</span>{user_pass}
</p>
</div>

<div style="font-size: 14px; text-align: center; color: #898989; line-height: 22px; margin: 1px;">
<p style="margin-top: 54px"> If you have any queries, concerns or suggestions,</p>
<p style="margin: 0px; margin-top: 1px"> please email us:
<span style="text-decoration: underline; cursor: pointer; color: #0060a9;">{support_mail}</span>
</p>
</div>
<div style=" margin-top: 32px; margin-bottom:31px;">
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.facebook.com/"><img src="https://i.ibb.co/fCZXxCC/Group-9380.png" alt=""/></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZLgzjS0/twitter.png" alt=""/> </a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.instagram.com/?hl=en"><img src="https://i.ibb.co/WKyFkYz/instagramm.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.whatsapp.com/"><img src="https://i.ibb.co/6R7LWr1/watsapp.png" alt=""/></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.pioneer.eu/"> <img src="https://i.ibb.co/wYT6Tmg/pinterest.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;"  href="https://www.youtube.com/"><img src="https://i.ibb.co/RT7Zns1/youtube.png" alt=""/></a>
</div>
<p style="border-top: 1px solid #dfdfdf; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px; ">
<tr>
<td align="center" bgcolor="#ffffff">
<p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;" > &copy; 2023, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'user_name, company_url, user_id, user_pass, company_name,logo,support_mail',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            3 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'name' => 'Reset Password',
                'slug' => 'reset-password',
                'subject' => 'Reset Password',
                'body' => '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>2.otp</title>
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

.actives {
box-sizing: border-box;
text-decoration: none;
-webkit-text-size-adjust: none;
text-align: center;
border-radius: 2px;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-khtml-border-radius: 2px;
-o-border-radius: 2px;
-ms-border-radius: 2px;
padding: 10px 31px;
cursor: pointer;
background: #fcca19;
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
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px">
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
<p
style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 26px 0px 20px 0px; line-height: 25px;
font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">
PASSWORD RECOVERY</p>
<p style="margin: 0px;text-align: center; line-height: 24px; font-size: 16px; color: #2c2c2c;">Dear
{user_name} </p>
<p
style="font-family: \'DM Sans\', sans-serif; font-weight: 500 !important; font-style: normal; margin: 0px; color: #2C2C2C; font-size: 14px; margin: 15px 54px 28px; text-align: center; line-height: 24px;">
You have requested to reset the password of your {company_name} account. If you did not request a password
reset, you can
disregard this email. No changes have been made to your account yet.
</p>
<p style="font-family: \'DM Sans\', sans-serif; font-weight: 500 !important; font-style: bold; margin: 0px; color: #2C2C2C; font-size: 14px; margin: 15px 54px 28px; text-align: center; line-height: 24px;"><b>Important notice:</b> The OTP code or link is set to expire within <b>{token_otp_expire} seconds</b>. To avoid any inconvenience, please enter it promptly. </p>
<p
style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 14px;line-height: 28px; text-align: center; color: #2C2C2C; margin-bottom: 8px; text-transform: uppercase; {otp_active}">
otp code</p>
<p
style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 700;  font-size: 36px;
line-height: 28px; text-align: center; letter-spacing: 0.375em; color: #2C2C2C; margin-bottom: 15px; {otp_active}">
{verification_otp}</p>
<p
style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500;font-size: 14px; line-height: 24px; text-align: center; color: #898989; margin-bottom: 32px; text-transform: uppercase; {token_otp_active}">
or</p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#ffffff">
<div style="{token_active}">
<a href="{verification_url}" aria-pressed="true" class="actives anchor-tag">
<span style="text-decoration: none; color: #2C2C2C;">Confirm Account</span>
</a>
</div>
<div style="font-size: 14px; text-align: center; color: #898989; line-height: 22px; margin: 1px;">
<p style="margin-top: 54px"> If you have any queries, concerns or suggestions,</p>
<p style="margin: 0px; margin-top: 1px"> please email us:
<span style="text-decoration: underline; cursor: pointer; color: #0060a9;">{support_mail}</span>
</p>
</div>
<div style="margin-top: 25px; margin-bottom:14px;">
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.facebook.com/"><img src="https://i.ibb.co/fCZXxCC/Group-9380.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZLgzjS0/twitter.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.instagram.com/?hl=en"><img src="https://i.ibb.co/WKyFkYz/instagramm.png"
alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.whatsapp.com/"><img src="https://i.ibb.co/6R7LWr1/watsapp.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.pioneer.eu/"> <img style="margin: -2px;"
src="https://i.ibb.co/wYT6Tmg/pinterest.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.youtube.com/"><img style="margin: 1px;" src="https://i.ibb.co/RT7Zns1/youtube.png"
alt="" /></a>
</div>
<p style="border-top: 1px solid #dfdfdf; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px; ">
<tr>
<td align="center" bgcolor="#ffffff">
<p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;">
&copy; 2023, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'logo, verification_url, company_name, verification_otp, support_mail, user_name, otp_active, token_otp_active, token_active, token_otp_expire',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            4 => 
            array (
                'id' => 21,
                'parent_id' => NULL,
                'name' => 'Subscription Invoice',
                'slug' => 'subscription-invoice',
                'subject' => 'Your Invoice from {company_name} has been created.',
                'body' => '<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>3.Invoice</title>
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

@font-face {
font-family: \'Roboto\';
font-style: normal;
font-weight: 500;
src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4.woff2) format(\'woff2\');
unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
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

.actives {
box-sizing: border-box;
text-decoration: none;
-webkit-text-size-adjust: none;
text-align: center;
border-radius: 2px;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-khtml-border-radius: 2px;
-o-border-radius: 2px;
-ms-border-radius: 2px;
padding: 10px 31px;
cursor: pointer;
background: #fcca19;
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
style="display: none; max-width: 0; max-height: 0; margin: 0px; overflow: hidden; color: #fff; opacity: 0;">
</div>
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
<p
style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 28px 0px 20px 0px; line-height: 25px; font-size:14px !important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">
Subscription Invoice</p>
<p
style="margin: 0px; font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 14px; line-height: 28px; text-align: center; color: #2C2C2C;">
SUBSCRIPTION CODE</p>
<p style="margin-top: 5px;font-family: \'DM Sans\', sans-serif;  font-style: normal; font-weight: 700;
font-size: 32px; line-height: 28px; text-align: center; color: #2C2C2C;">{subscription_code}
</p>
<p style="margin-top: 32px; padding:0px 30px 0px 37px; font-family: \'DM Sans\', sans-serif; text-align: left; font-style: normal; font-weight: 500; font-size: 14px; line-height: 24px; color: #898989;
"><span style="color: #2C2C2C;">Dear {user_name},</span>
<br> I hope you are well. Please see attached invoice number {subscription_code} for {plan}, which is due for payment on {next_billing_date}
<br>

For further information, login to
your account or call us: <span style="color: #2C2C2C;"> {contact_number}.</span></p>
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

<div style="clear: both;"></div>

<div>
<br>
<p
style="font-family:\'DM Sans\', sans-serif; font-style: normal; font-weight: 700; font-size: 18px;line-height: 21px; margin-top:1px ;text-align:center; text-transform: uppercase; color: #2C2C2C;">
Keep in touch</p>
</div>
<div
style="margin-top: 1px; font-size: 14px; text-align: center; color: #898989; line-height: 22px; margin: 1px;">
<p style="margin-top:14px"> If you have any queries, concerns or suggestions,</p>
<p style="margin:0px; margin-top:1px"> please email us: <span
style="cursor: pointer; color: #0060A9; text-decoration: underline;">{support_mail}</span>
</p>
</div>
<div style="margin-top: 25px; margin-bottom:14px;">
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.facebook.com/"><img src="https://i.ibb.co/fCZXxCC/Group-9380.png"
alt="" /></a>
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZLgzjS0/twitter.png"
alt="" /></a>
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.instagram.com/?hl=en"><img
src="https://i.ibb.co/WKyFkYz/instagramm.png" alt="" /></a>
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.whatsapp.com/"><img src="https://i.ibb.co/6R7LWr1/watsapp.png"
alt="" /></a>
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.pioneer.eu/"> <img style="margin: -2px;"
src="https://i.ibb.co/wYT6Tmg/pinterest.png" alt="" /></a>
<a class="anchor-tag"
style="margin-right: 9px; width: 32px; height:32px; display: inline-block;"
href="https://www.youtube.com/"><img style="margin: 1px;"
src="https://i.ibb.co/RT7Zns1/youtube.png" alt="" /></a>
</div>
<p style="border-top: 1px solid #dfdfdf; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"
style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px;">
<tr>
<td align="center" bgcolor="#ffffff">
<p
style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;">
&copy; 2023, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>

</html>',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'subscription_code, plan, next_billing_date, user_name, contact_number, support_mail, company_name, logo',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            5 => 
            array (
                'id' => 22,
                'parent_id' => NULL,
                'name' => 'Subscriber',
                'slug' => 'subscriber',
                'subject' => 'Subscription for newsletter',
                'body' => '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>4.Voucher</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style type="text/css">
@media screen {
@font-face {
font-family: "DM Sans";
font-weight: 700;
src:   url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriASitCBimCw.woff2)
format("woff2");
}
@font-face {
font-family: "DM Sans";
font-weight: 500;
font-style: normal;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Cp2ywxg089UriAWCrCBimCw.woff2)
format("woff2");
}
@font-face {
font-family: \'DM Sans\';
font-style: normal;
font-weight: 400;
src: url(https://fonts.gstatic.com/s/dmsans/v11/rP2Hp2ywxg089UriCZOIHQ.woff2) format(\'woff2\');
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
.actives {
box-sizing: border-box;
text-decoration: none;
-webkit-text-size-adjust: none;
text-align: center;
border-radius: 2px;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-khtml-border-radius: 2px;
-o-border-radius: 2px;
-ms-border-radius: 2px;
padding: 10px 31px;
cursor: pointer;
background: #fcca19;
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
.unsubscribe:hover {
color: #fff;
}
</style>
</head>
<body class="bodys" style="background-color: #e9ecef">
<div class="preheader" style="display: none; max-width: 0; max-height: 0; margin: 0px; overflow: hidden; color: #fff; opacity: 0;"></div>
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
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; margin-top: 100px">
<tr>
<td align="center" bgcolor="#2c2c2c">
<img class="logo-img" src="{logo}" alt="logo" />
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>

</tr>
<tr>
<td align="center" bgcolor="#ffffff">
<p style="font-family: \'DM Sans\', sans-serif;font-style: normal;font-weight: 400;font-size: 15px;line-height: 25px;text-align: center; color: #2C2C2C; margin: 40px 72px 44px;">You’ve been added to our mailing list and will now be among the first to hear about new arrivals, big events and special offers.</p>
<div style="margin-bottom: 58px;">
<a href="{home_url}" aria-pressed="true" class="actives anchor-tag">
<span style="text-decoration: none; color: #2C2C2C;">Visit Site</span>
</a>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%" style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500;">
<tr>
<td align="center" bgcolor="#2c2c2c">
<div style="font-size: 14px; text-align: center; color: #ffffff; line-height: 22px; margin: 1px;">
<p style="margin-top: 30px"> If you have any queries, concerns or suggestions,</p>
<p style="margin: 0px; margin-top: 1px"> please email us:
<span style="text-decoration: underline; cursor: pointer; color: #FCCA19;">{support_mail}</span>
</p>
</div>
<div style=" margin-top: 32px;">
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.facebook.com/"><img src="https://i.ibb.co/9T1qkwM/white-facebook.png" alt=""/></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://twitter.com/?lang=en"><img src="https://i.ibb.co/ZhPHPhp/white-twitter.png" alt=""/> </a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.instagram.com/?hl=en"><img src="https://i.ibb.co/Hnx1Cww/white-instagram.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.whatsapp.com/"><img src="https://i.ibb.co/X7Fhw6Q/white-whatsapp.png" alt=""/></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;" href="https://www.pioneer.eu/"> <img style="margin: -2px;" src="https://i.ibb.co/KwXSt44/white-pinterest.png" alt="" /></a>
<a class="anchor-tag" style="margin-right: 9px; width: 32px; display: inline-block;"  href="https://www.youtube.com/"><img src="https://i.ibb.co/s9gY8Mt/white-youtube.png" alt=""/></a>
</div>
<div style=" margin-bottom:31px;">
<a href="{unsubscribe}" class="unsubscribe" style="margin-right: 9px; display: inline-block; margin-top: 10px;" >Unsubscribe</a>
</div>
<p style="border-top: 1px solid #464646; margin: 1px 20px 0px 20px;"></p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center" bgcolor="#e9ecef">
<table class="tables" border="0" cellpadding="0" cellspacing="0" width="100%"style=" max-width: 640px; font-family: \'DM Sans\', sans-serif; font-weight: 500; margin-bottom: 200px; ">
<tr>
<td align="center" bgcolor="#2c2c2c">
<p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;" > &copy 2022, {company_name}. All rights reserved.</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'language_id' => 1,
                'status' => 'Active',
                'variables' => 'logo,company_name,supprot_mail, home_url,unsubscribe',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
        ));
        
        
    }
}