<?php

namespace Modules\Affiliate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\Form;
use Modules\Affiliate\Services\AffiliateHelper;
use Modules\Affiliate\Http\Requests\SaveFormRequest;
use Modules\Affiliate\Events\Form\FormUpdated;

class FormController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = auth()->user();

        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $saveURL = route('site.affiliate.form_update', $form);

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = AffiliateHelper::getConfiguredRoles();
        
        $menu = 'settings';

        return view('affiliate::admin.forms.edit', compact('form', 'saveURL', 'form_roles', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(SaveFormRequest $request, $id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $request['form_builder_json'] = str_replace(['&lt;script&gt;', '&lt;/script&gt;'], '', $request->form_builder_json);

        $input = $request->except('_token');

        if ($form->update($input)) {
            // dispatch the event
            event(new FormUpdated($form));

            return response()
                ->json([
                    'success' => true,
                    'details' => __('Form successfully updated!'),
                    'dest' => route('affiliate.settings'),
                ]);
        } else {
            response()->json(['success' => false, 'details' => __('Failed to update the form.')]);
        }
    }
}
