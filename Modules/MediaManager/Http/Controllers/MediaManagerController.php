<?php

namespace Modules\MediaManager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MediaManager\Http\Requests\MediaManagerRequest;
use Modules\MediaManager\Http\Models\MediaManager;
use App\Models\File;
use App\Models\Preference;
use DB, Response, Session;
use Modules\MediaManager\Http\Models\ObjectFile;

class MediaManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('mediamanager::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data['maxFileSize'] = preference('file_size');
        $acceptedFiles = getFileExtensions();
        $data['Files'] = implode(",", $acceptedFiles);
        $array = explode(",", ("." . implode(",.", $acceptedFiles)));
        $data['acceptedFiles'] = implode(",", $array);

        return view('mediamanager::create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MediaManagerRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MediaManagerRequest $request)
    {
        if ((new MediaManager)->store($request->all())) {
            return Response::json('success', 200);
        };

        return Response::json('failed', 500);
    }

    /**
     * Adds or uploads file from media manager to view form. Provide file ids to get data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $fileIds = implode(',', $request->file_id);
        $data['files'] = File::whereIn('id', $request->file_id)->orderByRaw("FIELD(id, $fileIds)")->get();
        $html = view('mediamanager::image.uploaded_image', $data)->render();

        return response()->json([
            'data' => $data['files']->map(function ($file) {
                return [
                    'id' => $file->id,
                    'name' => $file->original_file_name,
                    'path' => $file->file_name,
                    'url' => objectStorage()->url('public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $file->file_name)
                ];
            }),
            'html' => $html
        ]);
    }

    /**
     * Upload files
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function uploadedFiles()
    {
        $data['files'] = File::getAllFiles();
        return view('mediamanager::uploaded_files', $data);
    }

    /**
     * Sort files
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function sortFiles()
    {
        $data['files'] = File::getAllFiles();
        return view('mediamanager::image.sorted_image', $data);
    }

    /**
     * Paginate files
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function paginateFiles()
    {
        $data['files'] = File::getAllFiles();
        return view('mediamanager::image.sorted_image', $data);
    }

    /**
     * Paginate data
     *
     * @param  Request  $request
     * @return Renderable
     */
    public function paginateData(Request $request)
    {
        if ($request->ajax()) {
            $sortValue = request()->sort_value ?? null;
            $searchValue = isset(request()->search_value) ? request()->search_value : '';
            $files = File::query()->sortByDefinedValue($sortValue)->whereLike('original_file_name', $searchValue);

            if (!empty($request->imageType)) {
                $type = explode(',', $request->imageType);
                $files = $files->whereIn('object_type', $type);
            }

            $data['files'] = $files->simplePaginate(preference('row_per_page', 10));
            return view('mediamanager::image.child_paginate', $data)->render();
        }

        return view('errors.404')->render();
    }

    /**
     * Download Files
     *
     * @param int $id
     * @return \Illuminate\Routing\Redirector
     */
    public function download($id)
    {
        $file = File::where('id', $id)->first();
        if ($file) {
            $imageName = str_replace('\\', '', $file->original_file_name);
            $image = 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $file->file_name;
            if (isExistFile($image)) {
                switch (strtolower(pathinfo($file->file_name, PATHINFO_EXTENSION))) {
                    case 'pdf':
                        $mime = 'application/pdf';
                        break;
                    case 'zip':
                        $mime = 'application/zip';
                        break;
                    case 'jpeg':
                    case 'jpg':
                        $mime = 'image/jpg';
                        break;
                    default:
                        $mime = 'application/force-download';
                }

                $headers = array(
                    'Content-Type' => $mime
                );
                
                
                return objectStorage()->download($image, $imageName, $headers);
            } else {
                if (file_exists(public_path('dist\img' . DIRECTORY_SEPARATOR . 'default_product.jpg'))) {
                    return Response::download(public_path('dist\img' . DIRECTORY_SEPARATOR . 'default_product.jpg'), 'default_product.jpg', ['image/jpg']);
                }
                $data = ['status' => 'fail', 'message' => __('The file you are looking for is not found.')];
                Session::flash($data['status'], $data['message']);
                return redirect()->back();
            }
        } else {
            $data = ['status' => 'fail', 'message' => __('This file does not exist.')];
            Session::flash($data['status'], $data['message']);
            return redirect()->back();
        }
    }

    /**
     * Delete Image
     *
     * @param Request $request
     * @return string:false
     */
    public function deleteImage(Request $request)
    {
        $image = File::where('id', $request->id)->first();
        if ($image) {
            if (isExistFile('public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $image->file_name)) {
                objectStorage()->delete('public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $image->file_name);
                DB::beginTransaction();
                ObjectFile::where('file_id', $image->id)->delete();
                $image->delete();
                $this->removeThumbnail($image);
                DB::commit();
                return json_encode(["resp" => __("success")]);
            }
        }

        return json_encode(["resp" => __("error")]);
    }

    /**
     * Get thumbnail path
     *
     * @param string $size
     * @param object $image
     * @return string
     */
    private function getThumbnailPath($size, $image)
    {
        return implode(DIRECTORY_SEPARATOR, ['public', 'uploads', config('openAI.thumbnail_dir'), $size, $image->file_name]);
    }

    /**
     * Remove thumbnail if exist
     *
     * @param object $image
     * @return void
     */
    private function removeThumbnail($image)
    {
        $sizes = array_keys((new File)->sizeRatio());

        foreach ($sizes as $value) {
            if (isExistFile($this->getThumbnailPath($value, $image))) {
                objectStorage()->delete($this->getThumbnailPath($value, $image));
            }
        }
    }
}
