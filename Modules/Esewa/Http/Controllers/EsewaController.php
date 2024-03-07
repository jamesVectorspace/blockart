<?php

/**
 * @package Esewa
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 07-09-23
 */

namespace Modules\Esewa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\Esewa\Http\Requests\EsewaRequest;
use Modules\Esewa\Entities\{
    Esewa,
    EsewaBody
};

class EsewaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param EsewaRequest $request
     *
     * @return mixed
     */
    public function store(EsewaRequest $request)
    {
        $esewabody = new EsewaBody($request);
        Esewa::updateOrCreate(
            ['alias' => moduleConfig('esewa.alias')],
            [
                'name' => moduleConfig('esewa.name'),
                'instruction' => $request->instruction,
                'status' => $request->status,
                'image' => 'thumbnail.png',
                'sandbox' => $request->sandbox,
                'data' => json_encode($esewabody)
            ]
        );
        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Esewa settings updated.')]);
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
            $module = Esewa::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }
        $addon = Addon::findOrFail('esewa');
        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }
}
