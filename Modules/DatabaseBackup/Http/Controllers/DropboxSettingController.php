<?php

namespace Modules\DatabaseBackup\Http\Controllers;

use App\Lib\Env;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DatabaseBackup\Http\Requests\DropboxSettingRequest;

class DropboxSettingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('databasebackup::dropbox_setting');
    }

    /**
     * Store a newly created resource in storage.
     * @param DropboxSettingRequest $request
     * @return redirect
     */
    public function store(DropboxSettingRequest $request)
    {
        try {
            Env::set('DROPBOX_APP_KEY', $request->app_key);
            Env::set('DROPBOX_APP_SECRET', $request->app_secret);
            Env::set('DROPBOX_AUTH_TOKEN', $request->auth_token);

            $response = $this->messageArray(__('Dropbox setting setup successfully'), 'success');
            $this->setSessionValue($response);
            return to_route('dropbox_setting.create')->with($response);
        } catch (\Throwable $th) {

            $response = $this->messageArray(__('Dropbox setting setup Failed'), 'fail');
            return to_route('dropbox_setting.create')->with($response);
        }
    }
}
