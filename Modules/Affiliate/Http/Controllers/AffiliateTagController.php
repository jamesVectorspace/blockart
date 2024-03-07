<?php
/**
 * @package AffiliateTagController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\AffiliateTag;
use Modules\Affiliate\Http\Requests\{CreateTagRequest, UpdateTagRequest};

class AffiliateTagController extends Controller
{
    /**
     * tag list
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data['menu'] = 'tags';
        $data['tags'] = AffiliateTag::getAll();
        return view('affiliate::admin.tag.index', $data);
    }

    /**
     * tag store
     *
     * @param CreateTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTagRequest $request)
    {
        if (AffiliateTag::store($request->all())) {
            return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Affiliate Tag')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * tag edit
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $tag = AffiliateTag::getAll()->where('id', $id)->first();

        if (!empty($tag)) {

            $tagList = AffiliateTag::getAll()->where('id', '!=', $id);

            return response()->json([
                'status' => 'true',
                'tag' => $tag,
                'tagList' => $tagList
            ]);
        }

        return response()->json([
            'status' => 'false',
            'message' => __(':x does not exist.', ['x' => __('Tag')])
        ]);
    }

    /**
     * tag update
     *
     * @param UpdateTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTagRequest $request)
    {
        if (AffiliateTag::updateTag($request->only('name', 'parent_id', 'summary', 'slug'), $request->tag_id)) {
            return redirect()->back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Affiliate Tag')]));
        }

        return redirect()->back()->withErrors(__('Something went wrong, please try again.'));
    }

    /**
     * tag delete
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $status = AffiliateTag::remove($id);

        if (isset($status['type']) && $status['type'] == 'success') {
            return redirect()->back()->withSuccess($status['message']);
        }

        return redirect()->back()->withErrors($status['message']);
    }
}
