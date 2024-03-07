<?php
/**
 * @package ThemeOptionController
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 27-12-2021
 */
namespace Modules\CMS\Http\Controllers;

use Modules\CMS\DataTables\PageDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\CMS\Http\Models\Page;
use Modules\CMS\Http\Models\Slider;
use Modules\CMS\Http\Models\ThemeOption;

class ThemeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PageDataTable $dataTable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('cms::index');
    }

    /**
     * Get All Theme Option
     *
     * @param  string  $layout
     * @return \Illuminate\Contracts\view\View|\Illuminate\Http\JsonResponse
     */
    public function list(Request $request, $layout = 'default')
    {
        if (isset($request->layout)) {
            $layout = $request->layout;
        }

        $data['themeOption'] = ThemeOption::with('image')->get();
        $data['pages'] = Page::select('slug', 'name')->active()->get();
        $data['layout'] = $layout;
        $imageNames = ['footer_logo_light', 'footer_logo_dark', 'header_logo_light', 'header_logo_dark'];
        foreach ($imageNames as $name) {
            if ($image = $data['themeOption']->where('name', $layout . '_template_' . $name)->first()) {
                $data['image']['id'][$name] = $image->image->id ?? 0;
                $data['image'][$name] = $image->fileUrl();
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'data' => view('cms::theme.appearance', $data)->render(),
            ]);
        }
        return view('cms::theme.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $formData = [];
        parse_str($request->data, $formData);
        unset($formData['_token']);

        array_walk_recursive($formData, function(&$value) {
            $value = xss_clean(($value));
        });

        $formData['custom']['css'] = str_replace('double_quotation', '"', $formData['custom']['css']);
        $formData['custom']['js'] = str_replace('double_quotation', '"', $formData['custom']['js']);

        $css = "Modules/CMS/Resources/assets/css/user-custom.css";
        File::put($css, $formData['custom']['css']);

        $js = "Modules/CMS/Resources/assets/js/user-custom.js";
        File::put($js, $formData['custom']['js']);
        unset($formData['custom']);

        $layout = $formData['layout'];
        unset($formData['layout']);
        if ((new ThemeOption)->store($formData, $layout)) {
            return ['status' => 1, 'message' => __('Successfully Saved')];
        }
        return ['status' => 0, 'message' => __('The :x has not been saved. Please try again', ['x' => __('Appearance')])];
    }

}
