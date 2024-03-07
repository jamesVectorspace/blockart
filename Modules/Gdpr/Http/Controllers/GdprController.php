<?php

namespace Modules\Gdpr\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Gdpr\Http\Requests\StoreGdprRequest;
use App\Models\{
    Language,
    Preference
};

class GdprController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['list_menu']    = 'gdpr-index';
        $data['languages']    = Language::getAll()->where('status', 'Active');
        return view('gdpr::config', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGdprRequest $request)
    {
        $response             = $this->messageArray(__('Invalid Request'), 'fail');
        $data['list_menu']    = 'gdpr-setting';

        $request->mergeIfMissing([
            'is_gdpr_enable' => '0',
            'is_external_gdpr_enable' => '0'
        ]);

        $post = $request->except('_token');

        unset($data);
        $i = 0;

        foreach ($post as $key => $value) {
            $data[$i]['category'] = 'gdpr';
            $data[$i]['field']    = $key;
            $data[$i]['value'] = strncmp($key, 'gdpr_text', strlen('gdpr_text')) === 0 ? json_encode($value) : $value ?? '';
            $i++;
        }

        foreach ($data as $key => $value) {
            if ((new Preference())->storeOrUpdate($value)) {
                $response = $this->messageArray(__('The :x has been successfully saved.', ['x' => __('GDPR Settings')]), 'success');
            }
        }

        $this->setSessionValue($response);

        return redirect()->route('gdpr.create');
    }
}
