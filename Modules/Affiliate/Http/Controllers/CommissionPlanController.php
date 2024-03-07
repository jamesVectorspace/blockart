<?php
/**
 * @package CommissionPlanController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\CommissionPlan;

class CommissionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['menu'] = 'commission';
        $data['commissionPlans'] = CommissionPlan::getAll();
        return view('affiliate::admin.commission_plan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['menu'] = 'commission';
        return view('affiliate::admin.commission_plan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if (CommissionPlan::store($request->all())) {
            return redirect()->route('commission.plan.index')->withSuccess(__('The :x has been successfully saved.', ['x' => __('Commission Plan')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['menu'] = 'commission';
        $data['commissionPlan'] = CommissionPlan::getAll()->where('id', $id)->first();

        return view('affiliate::admin.commission_plan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if (CommissionPlan::updateCommissionPlan($request->except('_token'), $id)) {
            return redirect()->route('commission.plan.index')->withSuccess(__('The :x has been successfully saved.', ['x' => __('Commission Plan')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $status = CommissionPlan::remove($id);

        if (isset($status['type']) && $status['type'] == 'success') {
            return redirect()->back()->withSuccess($status['message']);
        }

        return redirect()->back()->withErrors($status['message']);
    }
}
