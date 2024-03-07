<?php
/**
 * @package WithdrawalsController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Affiliate\Entities\{AffiliateUser, WithdrawRequest, WithdrawalMethod, UserWithdrawalSetting};
use Modules\Affiliate\DataTables\UserWithdrawalsDataTable;

class WithdrawalsController extends Controller
{
    /**
     * payments store OR update
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function payments(Request $request)
    {
        $data['menu'] = 'withdrawals';

        if ($request->isMethod('get')) {
            $data['list_menu'] = 'payment';
            $data['methods'] = WithdrawalMethod::getAll()->where('status', 'Active');
            return view('affiliate::site.payments', $data);
        } else if ($request->isMethod('post')) {
            $response = $this->checkExistence($request->id, 'withdrawal_methods', ['getData' => true]);

            if ($response['status']) {
                if ($response['data']->method_name == 'Paypal') {
                    $request['param'] = json_encode((object) ['email' => $request->email]);
                } else if ($response['data']->method_name == 'Bank') {
                    $request['param'] = json_encode((object) $request->except(['_token', 'id', 'is_default']));
                }
            }

            $request['user_id'] = auth()->user()->id;
            $request['withdrawal_method_id'] = $request->id;
            $response = (new UserWithdrawalSetting())->updateData($request->only('user_id', 'withdrawal_method_id', 'param', 'is_default'));

            $this->setSessionValue($response);

            return back();
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * withdraw requests
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function requests(Request $request)
    {
        $data['menu'] = 'withdrawals';
        $userInfo = AffiliateUser::where('id', auth()->user()->affiliateUser()->first()->id)->first();
        $withDrawRequestsAmount = WithdrawRequest::where('affiliate_user_id', $userInfo->id)->where('status', 'pending')->sum('amount');
        $amount = $userInfo->net_commission - $withDrawRequestsAmount;

        if ($request->isMethod('get')) {
            $data['list_menu'] = 'requests';
            $data['methods'] = WithdrawalMethod::with('withdrawalSetting')->where('status', 'Active')->get();
            $data['userMethod'] = UserWithdrawalSetting::where('user_id', auth()->user()->id)->get();
            $data['maxAmount'] = $amount;

            return view('affiliate::site.requests', $data);
        }

        if (!isset($request->amount) || $request->amount == 0 || $request->amount < 1) {
            return redirect()->back()->withErrors(__('Invalid amount!'));
        }

        if ($request->amount <= $amount) {
            $request['status'] = 'pending';
            $request['affiliate_user_id'] = $userInfo->id;

            if (WithdrawRequest::store($request->except('_token'))) {
                return redirect()->route('site.affiliate.withdrawals')->withSuccess(__('Your request is now pending please wait for confirmation'));
            }
        }

        return redirect()->back()->withErrors(__('Amount not more that :x', ['x' => $amount]));
    }

    /**
     * affiliate user withdrawals
     *
     * @param UserWithdrawalsDataTable $dataTable
     * @return mixed
     */
    public function withdrawals(UserWithdrawalsDataTable $dataTable)
    {
        $data['list_menu'] = 'withdraw_commission';
        $data['menu'] = 'withdrawals';

        return $dataTable->render('affiliate::site.withdrawals', $data);
    }
}
