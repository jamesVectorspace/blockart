<?php

/**
 * @package KhaltiController
 * @author TechVillage <support@techvill.org>
 * @contributor Ahammed Imtiaze <[imtiaze.techvill@gmail.com]>
 * @created 24-08-23
 */

namespace Modules\Khalti\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\Khalti\Entities\{
    Khalti,
    KhaltiBody
};

class KhaltiController extends Controller
{
    public function store(Request $request)
    {
        $khaltiBody = new KhaltiBody($request);

        Khalti::updateOrCreate(
            ['alias' => moduleConfig('khalti.alias')],
            [
                'name' => moduleConfig('khalti.name'),
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($khaltiBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Khalti settings updated.')]);
    }

    public function edit()
    {
        try {
            $module = Khalti::first()->data;
        } catch (Exception $e) {
            $module = null;
        }

        $addon = Addon::findOrFail('khalti');

        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }
}
