<?php

/**
 * @package StripeController
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 06-02-2022
 */

namespace Modules\YuKassa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\YuKassa\Http\Requests\YuKassaRequest;
use Modules\YuKassa\Entities\{
    YuKassa,
    YuKassaBody
};

class YuKassaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param YuKassaRequest $request
     *
     * @return mixed
     */
    public function store(YuKassaRequest $request)
    {
        $stripeBody = new YuKassaBody($request);

        YuKassa::updateOrCreate(
            ['alias' => moduleConfig('yukassa.alias')],
            [
                'name' => moduleConfig('yukassa.name'),
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($stripeBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('YuKassa settings updated.')]);
    }


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
            $module = YuKassa::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }
        $addon = Addon::findOrFail(moduleConfig('yukassa.alias'));
        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }
}
