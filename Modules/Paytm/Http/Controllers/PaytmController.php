<?php

/**
 * @package PaytmController
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 30-01-2023
 */

namespace Modules\Paytm\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\Paytm\Http\Requests\PaytmRequest;
use Modules\Paytm\Entities\{
    Paytm,
    PaytmBody
};

class PaytmController extends Controller
{
    /**
     * Returns form for the edit modal
     *
     * @param \Illuminate\Http\Request
     *
     * @return JsonResponse
     */
    public function edit(Request $request)
    {
        try {
            $module = Paytm::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }

        $addon = Addon::findOrFail('paytm');

        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaytmRequest $request
     *
     * @return mixed
     */
    public function store(PaytmRequest $request)
    {
        $paytmBody = new PaytmBody($request);
        Paytm::updateOrCreate(
            ['alias' => 'paytm'],
            [
                'name' => 'Paytm',
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($paytmBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Paytm settings updated.')]);
    }
}
