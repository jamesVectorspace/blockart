<?php

namespace Modules\DatabaseBackup\Http\Controllers;

use App\Lib\Env;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DatabaseBackup\Http\Requests\GoogleDriveSettingRequest;

class GoogleDriveSettingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('databasebackup::google_drive_setting');
    }

    /**
     * Store a newly created resource in storage.
     * @param GoogleDriveSettingRequest $request
     * @return Renderable
     */
    public function store(GoogleDriveSettingRequest $request)
    {
        try {
            Env::set('GOOGLE_DRIVE_CLIENT_ID', $request->client_id);
            Env::set('GOOGLE_DRIVE_CLIENT_SECRET', $request->client_secret);
            Env::set('GOOGLE_DRIVE_REFRESH_TOKEN', $request->refresh_token);

            $response = $this->messageArray(__('Google drive setting setup successfully'), 'success');
            $this->setSessionValue($response);
            return to_route('google_drive_setting.create')->with($response);
        } catch (\Throwable $th) {

            $response = $this->messageArray(__('Google drive setting setup Failed'), 'fail');
            return to_route('google_drive_setting.create')->with($response);
        }
    }
}
