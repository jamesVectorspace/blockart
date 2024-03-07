<?php

namespace Modules\StripeRecurring\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\StripeRecurring\Http\Requests\StripeRecurringRequest;
use Modules\StripeRecurring\Entities\{
    StripeRecurring,
    StripeRecurringBody
};

class StripeRecurringController extends Controller
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
            $module = StripeRecurring::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }
        $addon = Addon::findOrFail('striperecurring');
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
     * @param StripeRecurringRequest $request
     *
     * @return mixed
     */
    public function store(StripeRecurringRequest $request)
    {
        $stripeRecurringBody = new StripeRecurringBody($request);

        StripeRecurring::updateOrCreate(
            ['alias' => 'striperecurring'],
            [
                'name' => 'StripeRecurring',
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($stripeRecurringBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Stripe recurring settings updated.')]);
    }
}
