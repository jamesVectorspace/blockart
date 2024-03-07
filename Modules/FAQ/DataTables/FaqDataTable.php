<?php
/**
 * @FAQ DataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Md Khayeruzzaman <[shakib.techvill@gmail.com]>
 * @created 12-04-2023
 */

namespace Modules\FAQ\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\CMS\Http\Models\ThemeOption;
use Yajra\DataTables\Facades\DataTables;
use Modules\FAQ\Entities\Faq;

class FaqDataTable extends DataTable
{
    /**
     * Layout FAQ
     *
     * @var array
     */
    protected $layoutFaq=[];

    /**
     * FAQ Data Table Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->layoutFaq = ThemeOption::faqLayout();
    }

    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $faq = $this->query();

        return DataTables::eloquent($faq)
            ->editColumn('title', function ($faq) {
                return wrapIt($faq->title, 50, ['columns' => 2 , 'trim' => true]);
            })
            ->editColumn('layout_id', function ($faq) {
                return ucFirst($this->layoutFaq[$faq->layout_id]);
            })
            ->editColumn('description', function ($faq) {
                return wrapIt($faq->description, 100, ['columns' => 2 , 'trim' => true]);
            })
            ->editColumn('status', function ($faq) {
                return statusBadges(lcfirst($faq->status));
            })
            ->addColumn('action', function ($faq) {
                $edit = '<a title="' . __('Edit :x', ['x' => __('Faq')]) . '" href="' . route('admin.faq.edit', ['id' => $faq->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';

                $delete = '<form method="post" action="' . route('admin.faq.destroy', ['id' => $faq->id]) . '" id="delete-faq-'. $faq->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete :x', ['x' => __('Faq')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $faq->id . ' data-label="Delete" data-delete="faq" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Faq')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';
                if ($this->hasPermission(['Modules\\FAQ\\Http\\Controllers\\FAQController@edit'])) {
                    $str .= $edit;
                }
                if ($this->hasPermission(['Modules\\FAQ\\Http\\Controllers\\FAQController@destroy'])) {
                    $str .= $delete;
                }
                return $str;
            })

            ->rawColumns(['title', 'description', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $faqs = Faq::query();

        if (count(request()->query()) > 0) {
            $faqs = $faqs->filter();
        }

        return $this->applyScopes($faqs);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()

        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => '', 'visible' => false, 'width' => '0%'])
        ->addColumn(['data' => 'title', 'name' => 'title', 'title' => __('Title'), 'width' => '25%'])
        ->addColumn(['data' => 'layout_id', 'name' => 'layout_id', 'title' => __('Layout'), 'orderable'=> false, 'searchable' => false, 'width' => '10%'])
        ->addColumn(['data' => 'description', 'name' => 'description', 'title' => __('Description'), 'orderable' => false, 'searchable' => false, 'width' => '45%'])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status'), 'width' => '10%'])

        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\\FAQ\\Http\\Controllers\\FAQController@edit', 'Modules\\FAQ\\Http\\Controllers\\FAQController@destroy']),
        'orderable' => false, 'searchable' => false])

        ->parameters(dataTableOptions());
    }
}
