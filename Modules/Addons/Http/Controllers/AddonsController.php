<?php

namespace Modules\Addons\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Addons\Entities\Addon;
use Modules\Addons\Entities\AddonManager;
use Modules\Addons\Entities\Envato;
use Validator;

class AddonsController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('addons::index');
    }

    /**
     * upload
     *
     * @param  mixed $request
     * @return void
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attachment' => 'required|mimes:zip,rar,7zip',
            'purchase_code' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with(['AddonStatus' => 'fail', 'AddonMessage' => __('Validation failed.')]);
        }

        if (!Envato::isValidPurchaseCode($request->purchase_code)) {
            return back()->with(['AddonStatus' => 'fail', 'AddonMessage' => __('Please provide valid purchase code.')]);
        }

        AddonManager::upload($request->attachment);

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Addon successfully uploaded.')]);
    }

    /**
     * switchStatus
     *
     * @param  mixed $alias
     * @return void
     */
    public function switchStatus($alias)
    {
        $addon = Addon::find($alias);
        if (!is_writable(base_path('modules_statuses.json'))) {
            $response = $this->messageArray(__('Need writable permission of this directory'), 'fail');
            $this->setSessionValue($response);
            return back();
        }
        if (is_null($addon)) {
            return back()->with(['fail' => 'success', 'AddonMessage' => __('Addon not found.')]);
        }

        $addon->isEnabled() ? $addon->disable() : $addon->enable();

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Addon status updated.')]);
    }

    /**
     * Remove addon
     *
     * @param string $alias
     * @return \Illuminate\Http\RedirectResponse;
     */
    public function remove($alias)
    {
        $addon = Addon::find($alias);

        if (is_null($addon)) {
            return back()->with('fail', __('Addon not found.'));
        }

        $addon->delete();

        return back()->with('success', __('Addon successfully removed.'));
    }

    /**
     * Get form
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getForm(Request $request)
    {
        $addon = Addon::find($request->alias);
        if (is_null($addon)) {
            return response()->json(['status' => false, 'data' => []], 200);
        }
        return response()->json(['status' => true, 'data' => ['name' => 'Paypal', 'html' => '<span class="addon-modal-danger">*</span>']], 200);
    }
}
