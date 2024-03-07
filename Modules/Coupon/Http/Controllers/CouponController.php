<?php
/**
 * @package CouponController
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 18-11-2021
 */

namespace Modules\Coupon\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use Modules\Coupon\DataTables\CouponDataTable;
use Modules\Coupon\Exports\CouponListExport;

use Modules\Coupon\Http\Models\{
    Coupon
};
use Excel, DB;
use Illuminate\Http\Request;
use Modules\Coupon\Http\Requests\{
    CouponStoreRequest,
    CouponUpdateRequest
};
use Modules\Subscription\Entities\Package;

class CouponController extends Controller
{
    /**
     * Coupon List
     *
     * @param CouponDataTable $dataTable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('coupon::index');
    }

    /**
     * Create Coupon
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['plans'] = Package::select('id', 'name')->where('status', 'Active')->get();
        return view('coupon::create', $data);
    }

    /**
     * Store Coupon
     *
     * @param CouponStoreRequest $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(CouponStoreRequest $request)
    {
        if ($request->discount_type <> 'Percentage' || empty($request['maximum_discount_amount'])) {
            $request['maximum_discount_amount'] = null;
        }

        DB::beginTransaction();
        try {
            $couponId = (new Coupon)->store($request->validated());
        
            if ($couponId) {
                $coupon = Coupon::find($couponId);
                
                $coupon->plans()->attach($request->plan_ids);
                
                $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Coupon')])];
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            $data = ['status' => 'fail', 'message' => $e->getMessage()];
        }
        
        $this->setSessionValue($data);
        return redirect()->route('coupon.index');
    }

    /**
     * Edit Coupon
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id = null)
    {
        $data['coupon'] = Coupon::with('plans:id')->find($id);
        
        if (!$data['coupon']) {
            return redirect()->route('coupon.index')->withFails(__('The :x does not exist.', ['x' => __('Coupon')]));
        }
        
        $data['couponPlans'] = $data['coupon']->plans()->pluck('id')->toArray();
        $data['plans'] = Package::select('id', 'name')->where('status', 'Active')->get();
        
        return view('coupon::edit', $data);
    }

    /**
     * Update Coupon
     *
     * @param CouponUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(CouponUpdateRequest $request, $id)
    {
        if ($request->discount_type <> 'Percentage' || empty($request['maximum_discount_amount'])) {
            $request['maximum_discount_amount'] = null;
        }

        DB::beginTransaction();
        try {
            $response = (new Coupon)->updateData($request->validated(), $id);
        
            if ($response['status'] == 'fail') {
                return redirect()->route('coupon.index')->withFails($response['message']);
            }
            
            $coupon = Coupon::find($id);
            
            $coupon->plans()->sync($request->plan_ids);
            
            $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Coupon')])];
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            
            $data = ['status' => 'fail', 'message' => $e->getMessage()];
        }
        
        $this->setSessionValue($data);
        return redirect()->route('coupon.index');
    }

    /**
     * Delete Coupon
     *
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id = null)
    {
        $result = $this->checkExistence($id, 'coupons');
        if ($result['status'] === true) {
            $response = (new Coupon)->remove($id);
        } else {
            $response = ['status' => 'fail', 'message' => $result['message']];
        }

        $this->setSessionValue($response);
        return redirect()->route('coupon.index');
    }

    /**
     * Coupon list pdf
     *
     * @return html static page
     */
    public function downloadPdf()
    {
        $data['coupons'] = Coupon::getAll();
        return printPDF($data, 'coupon_list' . time() . '.pdf', 'coupon::pdf', view('coupon::pdf', $data), 'pdf');
    }

    /**
     * Coupon list csv
     *
     * @return html static page
     */
    public function downloadCsv()
    {
        return Excel::download(new CouponListExport(), 'coupon_list' . time() . '.csv');
    }
    
    /**
     * Coupon Setting
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function setting(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('coupon::setting');
        }
        
        $category = 'coupon';
        $i = 0;
        
        foreach ($request->except('_token') as $key => $value) {
            $data[$i]['category'] = $category;
            $data[$i]['field']    = $key;
            $data[$i++]['value'] = $value ?? '';
        }

        foreach ($data as $key => $value) {
            Preference::storeOrUpdate($value);
        }

        return back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Coupon Settings')]));
    }
}
