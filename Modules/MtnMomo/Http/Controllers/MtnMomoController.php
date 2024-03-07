<?php
/**
 * @package MtnMomoController
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 12-02-2023
 */

namespace Modules\MtnMomo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\MtnMomo\Http\Requests\MtnMomoRequest;
use Modules\MtnMomo\Entities\{
    MtnMomo,
    MtnMomoBody
};

class MtnMomoController extends Controller
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
            $module = MtnMomo::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }

        $addon = Addon::findOrFail('mtnmomo');

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
     * @param MtnMomoRequest $request
     *
     * @return mixed
     */
    public function store(MtnMomoRequest $request)
    {
        $mtnMomoBody = new MtnMomoBody($request);
        MtnMomo::updateOrCreate(
            ['alias' => 'mtnmomo'],
            [
                'name' => 'MtnMomo',
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($mtnMomoBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('MTN Momo settings updated.')]);
    }
}
