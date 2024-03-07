<?php

namespace Modules\StorageDriver\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\StorageDriver\Entities\StorageDriver;
use Session;

class StorageDriverController extends Controller
{
    /**
     * index
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['list_menu'] = 'storage_driver';
        if ($request->isMethod('get')) {
            //this return should be for GET request only
            $data['storageDriver_name'] = env('FILESYSTEM_DRIVER');
            return view('storagedriver::index', $data);
        } else if ($request->isMethod('post')) {
            $request['name'] = $request['name'] ?? 0;
            //validate the POST request on validation function at StorageDriver
            $validator = StorageDriver::validation($request->all());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            if ((new StorageDriver)->storeOrUpdate($request->except('_token'))) {
                return back()->withSuccess(__('The :x has been successfully saved.', ['x' => __('Storage Driver')]));
            }
            
            return back()->withErrors(__('Failed to save :x', ['x' => __('Storage Driver')]));
        }
    }

    /**
     * Display a listing of the driver config.
     * @param Request $request
     * @param  string $driver is the storage driver name
     * Show the form for editing the specified resource.
     * Update the specified resource in storage.
     * @return Renderable
     */
    public function driverConfig(Request $request, $driver)
    {
        $response = ['status' => 'fail', 'message' => __('Invalid Credential Provided.')];
        $data['list_menu'] = $driver;
        $data['all_storage_data'] = file_get_contents(envPath());
        if ($request->isMethod('get')) {
            //this return should be for GET request only
            return view('storagedriver::driverconfig', $data);
        } else if ($request->isMethod('post')) {
            if ((new StorageDriver)->storeOrUpdateConfig($request->except('_token'), $driver)) {
                $response['status'] = 'success';
                $response['message'] = __('The :x has been successfully saved.', ['x' => __('Storage Driver')]);
            }
            Session::flash($response['status'], $response['message']);
            //this return will be after POST request with the storage driver name
            return redirect()->route('configstoragedriver', ['driver' => $driver])->withInput($request->all());
        }
    }
}
