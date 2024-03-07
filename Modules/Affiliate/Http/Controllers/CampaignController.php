<?php
/**
 * @package CampaignController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\AffiliateTag;
use Modules\Affiliate\Entities\Campaign;
use Modules\Affiliate\Http\Requests\{CreateCampaignRequest, EditCampaignRequest};

class CampaignController extends Controller
{
    /**
     * campaign list
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['menu'] = 'campaign';
        $data['campaigns'] = Campaign::getAll();
        return view('affiliate::admin.campaign.index', $data);
    }

    /**
     * campaign store
     *
     * @param CreateTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCampaignRequest $request)
    {
        if (Campaign::store($request->all())) {
            return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Campaign')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * campaign edit
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $campaign = Campaign::getAll()->where('id', $id)->first();
        $affiliateTags = !empty($campaign->visibility) ? AffiliateTag::whereIn('id', $campaign->visibility)->get()->pluck('name', 'id')->toArray() : [];

        if (!empty($campaign)) {

            return response()->json([
                'status' => 'true',
                'campaign' => $campaign,
                'tags' => $affiliateTags,
            ]);
        }

        return response()->json([
            'status' => 'false',
            'message' => __(':x does not exist.', ['x' => __('Campaign')])
        ]);
    }

    /**
     * campaign update
     *
     * @param UpdateTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditCampaignRequest $request)
    {
        if (Campaign::updateCampaign($request->only('name', 'link', 'visibility', 'summary', 'description'), $request->campaign_id)) {
            return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Campaign')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * campaign delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $status = Campaign::remove($id);

        if (isset($status['type']) && $status['type'] == 'success') {
            return redirect()->back()->withSuccess($status['message']);
        }

        return redirect()->back()->withErrors($status['message']);
    }
}
