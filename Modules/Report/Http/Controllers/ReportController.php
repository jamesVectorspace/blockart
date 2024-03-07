<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Report\Http\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['reportTypes'] = (new Report)->reportType();
        $data['report'] = [];
        if (request()->type) {
            $header = (new Report)->tableRow();
            $class = 'Modules\Report\Reports'. "\\" . request()->type;

            if (class_exists($class, true)) {
                $report = $class::getReports();
                $list = view('report::subscription.list', compact('report', 'header'))->render();
                return response(['list' => $list]);
            } else {
                $error = view('report::subscription.error',)->render();
                return response(['list' => $error]);
            }

		} else {
            return view('report::index', $data);
        }
    }
}
