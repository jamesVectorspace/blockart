<?php

namespace Modules\Subscription\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Subscription\Entities\Package;
use Modules\Subscription\Http\Resources\PlanResource;

class PackageController extends Controller
{
    /**
     * Plan list
     *
     * Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $configs = $this->initialize([], $request->all());
        $plan = Package::with('user')->orderBy('sort_order', 'ASC');

        if ($plan->count() == 0) {
            return $this->notFoundResponse([], __('No :x found.', ['x' => __('Plan')]));
        }

        return $this->response([
            'data' => PlanResource::collection($plan->paginate($configs['rows_per_page'])),
            'pagination' => $this->toArray($plan->paginate($configs['rows_per_page'])->appends($request->all())),
            'total' => $plan->count()
        ]);
    }
}
