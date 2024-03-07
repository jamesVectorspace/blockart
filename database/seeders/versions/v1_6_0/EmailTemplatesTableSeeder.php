<?php

namespace Database\seeders\versions\v1_6_0;


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
        
        \DB::table('email_templates')->insert(array (
            
            6 => 
            array (
                'id' => 24,
                'parent_id' => NULL,
                'name' => 'Member Invitation',
                'slug' => 'member-invitation',
                'subject' => 'Invitation From {company_name}',
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
<p style="font-family: \'DM Sans\', sans-serif;font-style: normal;font-weight: 400;font-size: 15px;line-height: 25px;text-align: center; color: #2C2C2C; margin: 40px 72px 44px;">
Achive something new and generate somthing out of the box. Let\'s start with us.</p>
<div style="margin-bottom: 58px;">
<a href="{member_invitation_url}" aria-pressed="true" class="actives anchor-tag">
<span style="text-decoration: none; color: #2C2C2C;">Join Our Team</span>
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
<div style="font-size: 14px; text-align: center; color: #ffffff; line-height: 22px; margin: 1px;margin-bottom: 20px;">
<p style="margin-top: 30px"> If you have any queries, concerns or suggestions,</p>
<p style="margin: 0px; margin-top: 1px"> please email us:
<span style="text-decoration: underline; cursor: pointer; color: #FCCA19;">{support_mail}</span>
</p>
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
                'variables' => 'logo,company_name,supprot_mail, member_invitation_url',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            9 =>
            array (
                'id' => 25,
                'parent_id' => NULL,
                'name' => 'Ticket User',
                'slug' => 'ticket-user',
                'subject' => '{ticket_subject} #Ticket ID: {ticket_no}',
                'body' => '<!DOCTYPE html>
                <html>
                <head>
                <meta charset="utf-8" />
                <meta http-equiv="x-ua-compatible" content="ie=edge" />
                <title>Ticket-template-design</title>
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
                padding: 10px 38px;
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
                font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">Ticket Module</p>
                <p style="margin: 0px; text-align: center; line-height: 24px; font-size: 16px; color: #2c2c2c;" > Hello {assignee_name}</p>
                <p style="margin: 0px; color: #898989; font-size: 14px; margin: 7px 54px 0px; text-align: center; line-height: 24px;">A new support ticket has been assigned to you.
                </p>
                <div style="background-color: #F3F3F3; border-radius:4px ; margin: 25px 78px">
                <p style="font-family: \'DM Sans\', sans-serif; font-style: italic; font-weight: 500; font-size: 13px; line-height: 24px;text-align: center; color: #2C2C2C; padding: 24px 26px;">‘{ticket_message}’</p>
                </div>
                <div style="margin: 20px 78px 58px; background: #FFFFFF; border: 1px solid #DFDFDF; border-radius: 4px; display: flex;padding: 16px;">
                <div style=" margin-right:60px; text-align: left;">
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;"><span style="color: #2c2c2c; padding-right: 2px;">Ticket ID:</span>{ticket_no}</p>
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;margin-bottom: 0px;"><span style="color: #2c2c2c; padding-right: 2px;">Status:</span>{ticket_status}</p>
                </div>
                <div class=" text-align: left;">
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; text-align: left; word-break: break-all;"><span style="color: #2c2c2c; padding-right: 2px;">Customer ID:</span>{customer_id}</p>
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal;  text-align: left; font-weight: 500; margin-bottom: 0px; font-size: 13px; line-height: 17px; color:#898989; word-break: break-all;"><span style="color: #2c2c2c; padding-right: 2px;">Subject:</span>{ticket_subject}</p>
                </div>
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
                <td align="center" bgcolor="#ffffff">
                <div>
                <a href="{details}" aria-pressed="true" class="actives anchor-tag">
                <span style="text-decoration: none; color: #2C2C2C;">View Tickets</span>
                </a>
                </div>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 13px; line-height: 17px; text-align: center; color: #2C2C2C; margin-top: 62px;">Thank You,</p>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; margin:0; font-weight: 500; font-size: 13px;line-height: 17px; text-align: center;color: #898989;">{assigned_by_whom}</p>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500;padding-top: 2px; font-size: 13px;line-height: 17px; text-align: center;color: #898989;margin:0; margin-top: 12px; margin-bottom: 20px;">{company_name}</p>
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
                <p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;" > &copy 2022, {company_name}. All rights reserved.</p>
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
                'variables' => 'company_name, email, company_url, ticket_message, ticket_subject, ticket_status,ticket_no,assignee_name,assigned_by_whom,logo',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            10 =>
            array (
                'id' => 26,
                'parent_id' => NULL,
                'name' => 'Ticket Assignee',
                'slug' => 'ticket-assignee',
                'subject' => '{ticket_subject} #Ticket ID: {ticket_no}',
                'body' => '<!DOCTYPE html>
                <html>

                <head>
                <meta charset="utf-8" />
                <meta http-equiv="x-ua-compatible" content="ie=edge" />
                <title>Ticket-template-design</title>
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
                padding: 10px 38px;
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
                <p style="font-family: \'DM Sans\', sans-serif; letter-spacing: 0.255em; text-transform: uppercase; margin: 26px 0px; line-height: 25px;
                font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">Ticket
                Module</p>
                <p
                style="margin: 0px; text-align: center; line-height: 24px; font-size: 16px; color: #2c2c2c;">
                Hello {assignee_name}</p>
                <p
                style="margin: 0px; color: #898989; font-size: 14px; margin: 7px 54px 0px; text-align: center; line-height: 24px;">
                A new support ticket has been assigned to you.
                </p>
                <div style="background-color: #F3F3F3; border-radius:4px ; margin: 25px 78px">
                <p
                style="font-family: \'DM Sans\', sans-serif; font-style: italic; font-weight: 500; font-size: 13px; line-height: 24px;text-align: center; color: #2C2C2C; padding: 24px 26px;">
                ‘{ticket_message}’</p>
                </div>
                <div
                style="margin: 20px 78px 58px; background: #FFFFFF; border: 1px solid #DFDFDF; border-radius: 4px; display: flex;padding: 16px;">
                <div style=" margin-right:60px; text-align: left;">
                <p
                style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;">
                <span style="color: #2c2c2c; padding-right: 2px;">Ticket ID:</span>{ticket_no}
                </p>
                <p
                style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;margin-bottom: 0px;">
                <span style="color: #2c2c2c; padding-right: 2px;">Status:</span>{ticket_status}
                </p>
                </div>
                <div class=" text-align: left;">
                <p
                style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; text-align: left; word-break: break-all;">
                <span style="color: #2c2c2c; padding-right: 2px;">Customer
                ID:</span>{customer_id}
                </p>
                <p
                style="font-family: \'DM Sans\', sans-serif;font-style: normal;  text-align: left; font-weight: 500; margin-bottom: 0px; font-size: 13px; line-height: 17px; color:#898989; word-break: break-all;">
                <span
                style="color: #2c2c2c; padding-right: 2px;">Subject:</span>{ticket_subject}
                </p>
                </div>
                </div>

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
                <div>
                <a href="{details}" aria-pressed="true" class="actives anchor-tag">
                <span style="text-decoration: none; color: #2C2C2C;">View Tickets</span>
                </a>
                </div>
                <p
                style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 13px; line-height: 17px; text-align: center; color: #2C2C2C; margin-top: 62px;">
                Thank You,</p>
                <p
                style="font-family: \'DM Sans\', sans-serif; font-style: normal; margin:0; font-weight: 500; font-size: 13px;line-height: 17px; text-align: center;color: #898989;">
                {assigned_by_whom}</p>
                <p
                style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500;padding-top: 2px; font-size: 13px;line-height: 17px; text-align: center;color: #898989;margin:0; margin-top: 12px; margin-bottom: 20px;">
                {company_name}</p>
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
                <p
                style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;">
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
                'status' => 'Active',
                'variables' => 'ticket_subject,ticket_no,customer_name,ticket_message,company_name,details,ticket_status,logo,project_name,logo',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
            ),
            11 =>
            array (
                'id' => 28,
                'parent_id' => NULL,
                'name' => 'ticket reply',
                'slug' => 'ticket-reply',
                'subject' => 'Ticket reply',
                'body' => '<!DOCTYPE html>
                <html>
                <head>
                <meta charset="utf-8" />
                <meta http-equiv="x-ua-compatible" content="ie=edge" />
                <title>Ticket-template-design</title>
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
                padding: 10px 38px;
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
                font-size:0.80em!important; color: rgb(44, 44, 44); font-weight: 500 !important; cursor: default !important;">Ticket Module</p>
                <p style="margin: 0px; text-align: center; line-height: 24px; font-size: 16px; color: #2c2c2c;" > Hello {name}</p>
                <p style="margin: 0px; color: #898989; font-size: 14px; margin: 7px 54px 0px; text-align: center; line-height: 24px;">You have a reply from the {team_member} of {company_name}.
                </p>
                <div style="background-color: #F3F3F3; border-radius:4px ; margin: 25px 78px">
                <p style="font-family: \'DM Sans\', sans-serif; font-style: italic; font-weight: 500; font-size: 13px; line-height: 24px;text-align: center; color: #2C2C2C; padding: 24px 26px;">‘{ticket_message}’</p>
                </div>
                <div style="margin: 20px 78px 58px; background: #FFFFFF; border: 1px solid #DFDFDF; border-radius: 4px; display: flex;padding: 16px;">
                <div style=" margin-right:60px; text-align: left;">
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;"><span style="color: #2c2c2c; padding-right: 2px;">Ticket ID:</span>{ticket_no}</p>
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal;  text-align: left; font-weight: 500; margin-bottom: 0px; font-size: 13px; line-height: 17px; color:#898989; word-break: break-all;"><span style="color: #2c2c2c; padding-right: 2px;">Subject:</span>{ticket_subject}</p>
                </div>
                <div class=" text-align: left;">
                <p style="font-family: \'DM Sans\', sans-serif;font-style: normal; font-weight: 500; font-size: 13px;line-height: 17px; color:#898989; word-break: break-all;margin-bottom: 0px;"><span style="color: #2c2c2c; padding-right: 2px;">Status:</span>{ticket_status}</p>
                </div>
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
                <td align="center" bgcolor="#ffffff">
                <div>
                <a href="{details}" aria-pressed="true" class="actives anchor-tag">
                <span style="text-decoration: none; color: #2C2C2C;">View Tickets</span>
                </a>
                </div>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500; font-size: 13px; line-height: 17px; text-align: center; color: #2C2C2C; margin-top: 46px; margin-bottom:12px">Thank You,</p>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; margin:0; font-weight: 500; font-size: 13px;line-height: 17px; text-align: center;color: #898989;">{team_member}</p>
                <p style="font-family: \'DM Sans\', sans-serif; font-style: normal; font-weight: 500;font-size: 13px;line-height: 17px; text-align: center;color: #898989;margin:0; margin-top: 7px; margin-bottom: 20px;">{company_name}</p>
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
                <p style="text-align: center; line-height: 16px; color: #898989; font-size: 12px; margin: 13px 0px;" > &copy 2022, {company_name}. All rights reserved.</p>
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
                'variables' => 'ticket_subject, ticket_no, customer_name, name, ticket_message, ticket_status, details, company_name',
                'created_at' => $currentDate->format('Y-m-d H:i:s'),
                
            ),
        ));
        
        
    }
}
