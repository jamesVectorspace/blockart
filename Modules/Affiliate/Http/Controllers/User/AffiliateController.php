<?php
/**
 * @package AffiliateController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Affiliate\DataTables\TopPackagesDataTable;
use Modules\Affiliate\DataTables\UserReferralPurchaseDataTable;
use Modules\Affiliate\Entities\{AffiliateUser, AffiliateUserTag, Campaign};
use Modules\Affiliate\Services\AffiliateHelper;
use Modules\Affiliate\Entities\Form;
use Throwable;

class AffiliateController extends Controller
{
    /**
     * be affiliate form & submit
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
    public function beAffiliate(Request $request, $from = 'web')
    {
        if (empty(auth()->user()->affiliateUser()->first())) {

            if ($request->isMethod('get')) {
                $data['menu'] = 'be_affiliate';
                $data['form'] = Form::where('type', 'affiliate')->first();
                return view('affiliate::site.be_affiliate', $data);
            }

            DB::beginTransaction();
            try {
                $input = $request->except('_token');
                // check if files were uploaded and process them
                $uploadedFiles = $request->allFiles();
                foreach ($uploadedFiles as $key => $file) {
                    // store the file and set it's path to the value of the key holding it
                    $validate = \Validator::make($request->all(), [
                        $key => 'max:1024',
                    ])->fails();

                    if ($validate) {
                        throw new \Exception(__("File size must be less than 1MB"));
                    }

                    if ($file->isValid()) {
                        $input[$key] = $file->store('form', ['disk' => 'public-folder']);
                    }
                }

                if (AffiliateUser::store($input)) {
                    DB::commit();

                    if ($from == 'web' || !empty(auth()->user()->affiliateUser()->first()) && auth()->user()->affiliateUser()->first()->status == 'Active') {
                        return redirect()->route('site.affiliate.dashboard')->withSuccess(__('The :x has been successfully saved.', ['x' => __('Affiliate Form')]));
                    }

                    return redirect()->route('site.affiliate.registration')->withSuccess(__('The :x has been successfully saved.', ['x' => __('Affiliate Form')]));
                }

                return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
            } catch (Throwable $e) {
                info($e);
                DB::rollback();
                return back()->withInput()->withErrors(['msg' => $e->getMessage()]);
            }
        }

        abort(404);
    }

    /**
     * user dashboard
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $data['menu'] = 'affiliate_dashboard';
        $helper = AffiliateHelper::getInstance();
        $data['dashboard'] = isset(auth()->user()->affiliateUser) ? $helper->dashoard(auth()->user()->affiliateUser->id) : [];

        return view('affiliate::site.dashboard', $data);
    }

    /**
     * affiliate user profile
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile()
    {
        $user = auth()->user()->affiliateUser()->first();
        $data['menu'] = 'profile';
        $data['formHeaders'] = auth()->user()->affiliateUser->form->getEntriesHeader();
        $data['affiliateUser'] = $user;

        return view('affiliate::site.profile', $data);
    }

    /**
     * identifier update
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function identifierUpdate(Request $request)
    {
        $firstCharacter = mb_substr($request->identifier, 0, 1);
        $identifier = $request->identifier;

        if (is_numeric($firstCharacter) || preference('affiliate_identifier') == 0 ||
            preg_match('/[^a-z_\-0-9]/i', $identifier) ||
            preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $identifier) ||
            strlen($identifier) > 191) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => __('Invalid identifier. It should be a combination of alphabets and numbers, but the number should not be in the first position.')
                ],
            );
        }

        if (empty($firstCharacter)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => __('Identifier cannot be empty.')
                ],
            );
        }

        $id = auth()->user()->affiliateUser()->first()->id;

        $user = AffiliateUser::where('identifier', $identifier)->where('id', '!=', $id);

        if ($user->exists()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => __('Identifier already exists. Try another one.')
                ],
            );
        }

        if (AffiliateUser::updateUser(['identifier' => $identifier], $id)) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' => __('The :x has been successfully saved.', ['x' => __('Identifier')]),
                ],
            );
        }
    }

    /**
     * user campaign
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function campaign()
    {
        $data['menu'] = 'campaign_user';
        $id = auth()->user()->affiliateUser()->first()->id;
        $userTag = AffiliateUserTag::where('affiliate_user_id', $id)->pluck('affiliate_tag_id')->toArray();
        $campaigns = Campaign::getAll();
        $filterCampaign = [];

        foreach ($campaigns as $campaign) {
            if (is_null($campaign->visibility)) {
                $filterCampaign[] = $campaign;
            } else {
                foreach ($campaign->visibility as $tag) {
                    if (in_array($tag, $userTag)) {
                        $filterCampaign[] = $campaign;
                    }
                }
            }

        }

        $data['campaigns'] = $filterCampaign;

        return view('affiliate::site.campaigns', $data);
    }

    /**
     * campaign view
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function campaignView($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();

        if (!empty($campaign)) {
            $data['menu'] = 'campaign_user';
            $visibility = $campaign->visibility;
            $flag = true;
            if (!empty($visibility) && count($visibility) > 0) {
                
                $userTags = auth()->user()->affiliateUser->affiliateTags;
                $flag = false;
                
                foreach ($userTags as $tag) {
                    if (in_array($tag->affiliate_tag_id, $visibility) && !$flag) {
                        $flag = true;
                    }
                }
            }
            
            if ($flag) {
                $data['campaign'] = $campaign;
                return view('affiliate::site.campaign_view', $data);
            }
        }

        abort('404');
    }

    /**
     * user networks
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function networks()
    {
        $data['menu'] = 'networks';
        $id = auth()->user()->affiliateUser()->first()->id;
        $data['user'] = AffiliateUser::where('id', $id)
                       ->with('referralAffiliateUsers', 'referralAffiliateUsers.affiliateUser', 'referralAffiliateUsers.affiliateUser.user', 'referralAffiliateUsers.affiliateUser.referralAffiliateUsers')
                       ->firstOrFail();

        return view('affiliate::site.networks', $data);
    }

    /**
     * user commission
     *
     * @param UserReferralPurchaseDataTable $dataTable
     * @return mixed
     */
    public function referrals(UserReferralPurchaseDataTable $dataTable)
    {
        $data['menu'] = 'referrals';
        $id = auth()->user()->affiliateUser()->first()->id;
        $data['user'] = AffiliateUser::where('id', $id)->firstOrFail();
        $dataTable->setUserId($id);

        return $dataTable->render('affiliate::site.referral_purchases', $data);
    }

    /**
     * user top products
     *
     * @param TopProductsDataTable $dataTable
     * @return mixed
     */
    public function topPackages(TopPackagesDataTable $dataTable)
    {
        $id = auth()->user()->affiliateUser()->first()->id;
        $data['menu'] = 'top_packages';
        $data['user'] = AffiliateUser::where('id', $id)->firstOrFail();
        $dataTable->setUserId($id);

        return $dataTable->render('affiliate::site.top_packages', $data);
    }
}
