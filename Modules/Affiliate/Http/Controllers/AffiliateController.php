<?php
/**
 * @package AffiliateController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */

namespace Modules\Affiliate\Http\Controllers;

use Modules\Subscription\Entities\Credit;
use Modules\Subscription\Entities\Package;
use App\Models\{Preference, Role};
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\{AffiliateTag, AffiliateUser, AffiliateUserTag, LifeTimeCommission};
use Modules\Affiliate\DataTables\{ReferralPurchasesDataTable,
    TopPackagesDataTable,
    AffiliateUserListDataTable,
    UserWithdrawalsDataTable};
use Modules\Affiliate\Services\AffiliateHelper;
use Modules\Affiliate\Transformers\AjaxSelectAffiliteUserResource;
use Modules\Affiliate\Entities\Form;
use App\Http\Resources\AjaxSelectSearchResource;
use DB;

class AffiliateController extends Controller
{

    /**
     * admin dashboard
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $helper = AffiliateHelper::getInstance();
        $data['dashboard'] = $helper->dashoard();
        $data['menu'] = 'dashboard';

        return view('affiliate::admin.dashboard', $data);
    }

    /**
     * all affiliate users
     *
     * @param AffiliateUserListDataTable $dataTable
     * @return mixed
     */
    public function users(AffiliateUserListDataTable $dataTable)
    {
        $data['menu'] = 'users';
        $data['tags'] = AffiliateTag::getAll();
        return $dataTable->render('affiliate::admin.user.index', $data);
    }

    /**
     * users profile
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile($id)
    {
        $dashboard = $this->getUserDashboard($id);
        $menu = 'users';
        $list_menu = 'profile';
        $user = AffiliateUser::where('id', $id)->firstOrFail();
        $affiliateTags = AffiliateTag::getAll();
        $lifeTimeCustomers = LifeTimeCommission::where('referral_id', $id)->with('user')->get();
        $user->loadSubmissionIntoFormJson();

        return view('affiliate::admin.user.profile', compact('user', 'menu', 'affiliateTags', 'list_menu', 'lifeTimeCustomers', 'dashboard'));
    }

    /**
     * user profile update
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userProfileUpdate(Request $request, $id)
    {

        $user = AffiliateUser::where('id', $id)->first();


        DB::beginTransaction();

        try {
            $input = $request->except(['_token', 'status', 'tags']);

            // check if files were uploaded and process them
            $uploadedFiles = $request->allFiles();
            foreach ($uploadedFiles as $key => $file) {
                // store the file and set it's path to the value of the key holding it
                if ($file->isValid()) {
                    $input[$key] = $file->store('form', ['disk' => 'public-folder']);
                }
            }

            $user->loadSubmissionIntoFormJson();

            $files = $user->form->form_builder_json->where('type', 'file')->pluck('value', 'name');
            // Fill the empty fields with the existing previous data
            foreach ($files as $key => $value) {
                $value = strrchr( $value, '/form');
                $value = 'form'.$value;

                if (!isset($input[$key])) {
                    $input[$key] = $value;
                } else if (isExistFile('public/uploads/' . $value)) {
                    objectStorage()->delete('public/uploads/' . $value);
                }
            }

            $user->update(['content' => $input,'status' => $request->status]);

            AffiliateUserTag::remove($id);
            $tagData = [];

            if (isset($request->tags)) {
                foreach ($request->tags as $tag) {
                    $tagData[] = [
                        'affiliate_user_id' => $id,
                        'affiliate_tag_id' => $tag
                    ];
                }
            }

            AffiliateUserTag::store($tagData);

            if ($user->isAllowLifeTimeCustomer()) {
                LifeTimeCommission::remove($id);
                $lifetimeData = [];
                $name = [];

                if (isset($request->life_time_customers)) {

                    foreach ($request->life_time_customers as $customer) {
                        $userExists = LifeTimeCommission::where('user_id', $customer)->first();
                        if (empty($userExists)) {
                            $lifetimeData[] = [
                                'user_id' => $customer,
                                'referral_id' => $id,
                            ];
                        } else {
                            $name[] = $userExists->user?->name;
                        }
                    }
                }

                LifeTimeCommission::store($lifetimeData);

                if (count($name) > 0) {
                    $name = implode(',', $name);
                    return redirect()->back()->with('fail', __(':x already link with another affiliate user.',['x' => $name]));
                }
            }

            DB::commit();

            return redirect()
                ->back()
                ->with('success', __('The :x has been successfully saved.', ['x' => __('Affiliate User')]));
        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return back()->withInput()->with('error', Helper::wtf());
        }
    }

    /**
     * affiliate user delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userDestroy($id)
    {
        $status = AffiliateUser::remove($id);

        if (isset($status['type']) && $status['type'] == 'success') {
            return redirect()->back()->withSuccess($status['message']);
        }

        return redirect()->back()->withErrors($status['message']);
    }

    /**
     * affiliate setting view & save data
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function settings(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data['list_menu'] = 'settings';
            $data['form'] = Form::where('type', 'affiliate')->first();
            $data['roles'] = Role::getAll();
            $data['affiliate_tags'] = AffiliateTag::getAll();
            $excludePackages = json_decode(preference('exclude_packages'), true);
            $excludeUsers = json_decode(preference('lifetime_exclude_user'), true);
            $data['excludePackages'] = is_array($excludePackages) && count($excludePackages) > 0 ? Package::select('id', 'name')->whereIn('id', $excludePackages)->get() : [];
            $data['excludeUsers'] = is_array($excludeUsers) && count($excludeUsers) > 0 ? AffiliateUser::select('id', 'user_id')->whereIn('id', $excludeUsers)->with('user')->get() : [];
            $data['menu'] = 'settings';

            return view('affiliate::admin.setting.index', $data);
        }

        $i = 0;
        $preference = [];

        foreach ($request->except('_token') as $key => $value) {
            $preference[$i]['category'] = 'affiliate';
            $preference[$i]['field'] = $key;
            $preference[$i]['value'] = in_array($key, ['affiliate_roles', 'exclude_packages', 'lifetime_exclude_tags', 'lifetime_exclude_user']) && !is_null($value) ? json_encode($value) : $value;
            $i++;
        }

        if (Preference::store($preference)) {
            return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Affiliate Settings')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * get affiliate user
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findAffiliateUserAjaxQuery(Request $request)
    {
        $qString = $request->q;

        $result = AffiliateUser::select('id', 'user_id','status')->with('user')
            ->where(
                function ($query) use ($qString) {
                    $query->whereHas("user", function ($q) use ($qString) {
                                $q->whereBeginsWith('status', 'Active');
                            })
                        ->orwhereHas("user", function ($q) use ($qString) {
                            $q->whereBeginsWith('name', $qString);
                        })
                        ->orwhereHas("user", function ($q) use ($qString) {
                            $q->whereLike('name', $qString);
                        });
                }
            )
            ->activeUser()
            ->limit(AffiliateUser::getLimit());


        $result = $result->get();

        return AjaxSelectAffiliteUserResource::collection($result);
    }

    /**
     * find affiliate tag with ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findAffiliateTagAjaxQuery(Request $request)
    {
        $qString = $request->q;

        $result = AffiliateTag::select('id', 'name')
            ->whereLike('name', $qString)
            ->limit(10);

        $result = $result->get();

        return AjaxSelectSearchResource::collection($result);
    }

    /**
     * find category with ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findCategoryAjaxQuery(Request $request)
    {
        $qString = $request->q;

        $result = Category::select('id', 'name')
            ->whereLike('name', $qString)
            ->limit(10);

        $result = $result->get();

        return AjaxSelectSearchResource::collection($result);
    }

    /**
     * find credit with ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findCreditAjaxQuery(Request $request)
    {
        $qString = $request->q;

        $result = Credit::select('id', 'name')
            ->whereLike('name', $qString)
            ->limit(10);

        $result = $result->get();

        return AjaxSelectSearchResource::collection($result);
    }

    /**
     * product search by ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function findPackageAjaxQuery(Request $request)
    {
        $qString = $request->q;

        $result = Package::where('status', 'Active')->whereLike('name', $qString)->get();

        return AjaxSelectSearchResource::collection($result);
    }

    /**
     * users commissions from reference
     *
     * @param ReferralPurchasesDataTable $dataTable
     * @param $id
     * @return mixed
     */
    public function referrals(ReferralPurchasesDataTable $dataTable, $id)
    {
        $data['dashboard'] = $this->getUserDashboard($id);
        $data['list_menu'] = 'referrals';
        $data['menu'] = 'users';
        $data['user'] = AffiliateUser::where('id', $id)->firstOrFail();
        $dataTable->setUserId($id);

        return $dataTable->render('affiliate::admin.user.referral_purchases', $data);
    }

    /**
     * users top products
     *
     * @param TopProductsDataTable $dataTable
     * @param $id
     * @return mixed
     */
    public function topPackages(TopPackagesDataTable $dataTable, $id)
    {
        $data['dashboard'] = $this->getUserDashboard($id);
        $data['list_menu'] = 'top_packages';
        $data['menu'] = 'users';
        $data['user'] = AffiliateUser::where('id', $id)->firstOrFail();
        $dataTable->setUserId($id);

        return $dataTable->render('affiliate::admin.user.top_packages', $data);
    }

    /**
     * user payouts
     *
     * @param UserWithdrawalsDataTable $dataTable
     * @param $id
     * @return mixed
     */
    public function payouts(UserWithdrawalsDataTable $dataTable, $id)
    {
        $data['dashboard'] = $this->getUserDashboard($id);
        $data['list_menu'] = 'payouts';
        $data['menu'] = 'users';
        $data['user'] = AffiliateUser::where('id', $id)->firstOrFail();
        $dataTable->setUserId($id);

        return $dataTable->render('affiliate::admin.user.payouts', $data);
    }

    /**
     * users multitier
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function multiTier($id)
    {
        $data['dashboard'] = $this->getUserDashboard($id);
        $data['list_menu'] = 'multi_tier';
        $data['menu'] = 'users';
        $data['user'] = AffiliateUser::where('id', $id)
                       ->with('referralAffiliateUsers', 'referralAffiliateUsers.affiliateUser', 'referralAffiliateUsers.affiliateUser.user', 'referralAffiliateUsers.affiliateUser.referralAffiliateUsers')
                       ->firstOrFail();

        return view('affiliate::admin.user.multi_tier', $data);
    }

    /**
     * get user dashboard
     *
     * @param $id
     * @return array
     */
    protected function getUserDashboard($id)
    {
        $helper = AffiliateHelper::getInstance();

        return $dashboard = $helper->dashoard($id);
    }
}
