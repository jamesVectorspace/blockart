<?php
/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */
namespace Modules\Iyzico\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\Iyzico\Http\Requests\IyzicoRequest;
use Modules\Iyzico\Entities\{
    Iyzico,
    IyzicoBody
};

class IyzicoController extends Controller
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
            $module = Iyzico::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }

        $addon = Addon::findOrFail('iyzico');

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
     * @param IyzicoRequest $request
     *
     * @return mixed
     */
    public function store(IyzicoRequest $request)
    {
        $iyzicoBody = new IyzicoBody($request);
        Iyzico::updateOrCreate(
            ['alias' => 'iyzico'],
            [
                'name' => 'Iyzico',
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($iyzicoBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Iyzico settings updated.')]);
    }
}
