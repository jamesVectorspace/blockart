<?php
/**
 * @package WithdrawalsController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Affiliate\DataTables\WithdrawalsDataTable;
use Modules\Affiliate\Entities\WithdrawRequest;

class WithdrawalsController extends Controller
{
    /**
     * withdrawals list
     *
     * @param WithdrawalsDataTable $dataTable
     * @return mixed
     */
    public function index(WithdrawalsDataTable $dataTable)
    {
        $data['menu'] = 'withdraw';

        return $dataTable->render('affiliate::admin.withdraw.index', $data);
    }

    /**
     * withdraw request view
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function view(Request $request, $id)
    {
        $data['menu'] = 'withdraw';
        $withdrawInfo = WithdrawRequest::where('id', $id)->first();
        if ($request->isMethod('get')) {
            $data['withdrawInfo'] = $withdrawInfo;

            return view('affiliate::admin.withdraw.view', $data);
        }

        if (isset($request->status) && $request->status != 'pending' && $withdrawInfo->status == 'pending') {
            if (WithdrawRequest::withdrawRequestUpdate(['status' => $request->status], $id)) {
                if ($request->status == 'accepted') {
                    $withdrawInfo->affiliateUser?->decrementNetCommission($withdrawInfo->amount);
                    $withdrawInfo->affiliateUser?->incrementPaid($withdrawInfo->amount);
                }

                return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Withdraw')]));
            }
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));

    }
}
