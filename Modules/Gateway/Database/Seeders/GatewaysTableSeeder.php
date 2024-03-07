<?php

namespace Modules\Gateway\Database\Seeders;

use Illuminate\Database\Seeder;

class GatewaysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('gateways')->delete();

        \DB::table('gateways')->insert(array(
            8 =>
            array(
                'id' => 9,
                'alias' => 'directbanktransfer',
                'name' => 'DirectBankTransfer',
                'sandbox' => 1,
                'data' => '{"status":"1","instruction":"Please make your payment directly into our bank account. Use your Billing Code as the payment reference. Access to your subscription services will be granted once the funds have cleared in our account."}',
                'instruction' => 'Please make your payment directly into our bank account. Use your Billing Code as the payment reference. Access to your subscription services will be granted once the funds have cleared in our account.',
                'image' => 'thumbnail.png',
                'status' => 1,
            ),
            9 =>
            array(
                'id' => 10,
                'alias' => 'checkpayments',
                'name' => 'CheckPayments',
                'sandbox' => 1,
                'data' => '{"status":"1","instruction":"Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode."}',
                'instruction' => 'Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.',
                'image' => 'thumbnail.png',
                'status' => 1,
            )
        ));
    }
}
