<?php

namespace Modules\Subscription\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\OpenAI\Entities\{
    UseCase,
    UseCaseCategory,
    ChatCategory,
    ChatBot
};
use Modules\OpenAI\Services\ImageService;
use Modules\Subscription\DataTables\PackageDataTable;
use Modules\Subscription\Services\PackageService;

use Modules\Subscription\Entities\{
    Package
};
use Modules\Subscription\Http\Requests\{
    PackageStoreRequest,
    PackageUpdateRequest
};

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PackageDataTable $dataTable
     * @return \Illuminate\Contracts\View\View
     */
    public function index(PackageDataTable $dataTable)
    {
        return $dataTable->render('subscription::package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $features = PackageService::features();
        $data['features'] = miniCollection($features, true);
        $data['useCaseCategory'] = UseCaseCategory::select('id', 'name')->get();
        $data['useCaseTemplate'] = UseCase::select('slug', 'name')->where('status', 'active')->get();
        $data['chatCategory'] = ChatCategory::select('id', 'name')->get();
        $data['chatAssistants'] = ChatBot::select('id','name', 'code')->where('status', 'active')->get();
        $data['meta'] = (new ImageService)->processResolutionsData();

        return view('subscription::package.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PackageStoreRequest $request)
    {
        $response = (new PackageService)->store($request->all());

        $this->setSessionValue(['status' => $response['status'], 'message' => $response['message']]);

        if (isset($response['package'])) {
            return redirect()->route('package.edit', ['id' => $response['package']->id]);
        }

        return redirect()->route('package.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data['package'] = Package::find($id);

        if (is_null($data['package'])) {
            return redirect()->route('package.index')->withFail(__('The :x is not found.', ['x' => __('Package')]));
        }

        $data['features'] = PackageService::editFeature($data['package']);
        $data['useCaseCategory'] = UseCaseCategory::select('id', 'name')->get();

        $data['meta'] = (new ImageService)->processResolutionsData();

        $data['useCaseTemplate'] = UseCase::select('use_cases.id', 'use_cases.name', 'use_cases.slug', 'use_cases.status')
            ->join('use_case_use_case_category', 'use_cases.id', 'use_case_use_case_category.use_case_id')
            ->join('use_case_categories', 'use_case_categories.id', 'use_case_use_case_category.use_case_category_id')
            ->where('use_cases.status', 'active')
            ->whereIn('use_case_category_id', json_decode($data['package']->usecaseCategory) ?? [])
            ->get();
            
        $data['chatCategory'] = ChatCategory::select('id', 'name')->get();
        $data['chatAssistants'] = ChatBot::select('id','name', 'code')
            ->whereIn('chat_category_id', json_decode($data['package']->chatCategory) ?? [])
            ->where('status', 'active')->get();
            
        return view('subscription::package.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PackageUpdateRequest $request, $id)
    {
        $response = (new PackageService)->update($request->all(), $id);
        $this->setSessionValue($response);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $response = (new PackageService)->delete($id);

        if ($response['status'] == 'success') {
            (new PackageService)->changeSubscriptionStatus($id);
        }

        $this->setSessionValue($response);

        return back();
    }

    /**
     * Get template by categoryId
     *
     * @param int $categoryId
     * @return Response
     */
    public function getTemplate($categoryId)
    {
        $category = UseCaseCategory::find($categoryId);

        if (is_null($category)) {
            return response()->json([
                'data' => []
            ]);
        }

        return response()->json([
            'data' => $category->useCases()->where('status', 'active')->get(['name', 'slug'])
        ]);
    }

    /**
     * Get Package Info
     *
     * @param int $id
     * @return Response
     */
    public function getInfo($id)
    {
        $package = Package::find($id);
        $package['duration'] = $package->duration;

        if (is_null($package)) {
            return response()->json([
                'data' => []
            ]);
        }

        return response()->json($package);
    }
    
    /**
     * Get chat by categoryId
     *
     * @param int $categoryId
     * @return Response
     */
    public function getChat($categoryId)
    {
        $category = ChatCategory::find($categoryId);

        if (is_null($category)) {
            return response()->json([
                'data' => []
            ]);
        }

        return response()->json([
            'data' => $category->chatBots()->where('status', 'Active')->get(['name', 'code'])
        ]);
    }
}
