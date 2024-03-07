<?php
/**
 * @Review DataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Md Khayeruzzaman <[shakib.techvill@gmail.com]>
 * @created 18-04-2023
 */

namespace Modules\Reviews\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Reviews\Entities\Review;
use Yajra\DataTables\Facades\DataTables;

class ReviewDataTable extends DataTable
{

    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $review = $this->query();

        return DataTables::eloquent($review)
            ->editColumn('title', function ($review) {
                return trimWords($review->title, 80);
            })
            ->editColumn('comments', function ($review) {
                return trimWords($review->comments, 80);
            })
            ->editColumn('rating', function ($review) {
                $options = '';
                for ($i = 1; $i <=5 ; $i++) {
                    $options .=  $i <= $review->rating ? ' <i  class="fa fa-star fa-star-beach"></i>' : ' <i  class="fa fa-star icon-light-gray"></i>';
                };
                return $options;
            })
            ->editColumn('name', function ($review) {
                $edit = '<a target="_blank" title="' . __('Edit :x', ['x' => __('Review')]) . '" href="' . route('users.edit', ['id' => $review->user_id]) . '">' . wrapIt(optional($review->user)->name, 10,  ['columns' => 3,'trim' => true]) . '</a>&nbsp';
                return $edit;
            })
            ->editColumn('status', function ($review) {
                return statusBadges(lcfirst($review->status));
            })
            ->addColumn('action', function ($review) {
                $edit = '<a title="' . __('Edit :x', ['x' => __('Review')]) . '" href="' . route('admin.review.edit', ['id' => $review->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';

                $delete = '<form method="post" action="' . route('admin.review.destroy', ['id' => $review->id]) . '" id="delete-review-'. $review->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button title="' . __('Delete :x', ['x' => __('Review')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $review->id . ' data-label="Delete" data-delete="review" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Review')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';
                if ($this->hasPermission(['Modules\\Reviews\\Http\\Controllers\\ReviewsController@edit'])) {
                    $str .= $edit;
                }
                if ($this->hasPermission(['Modules\\Reviews\\Http\\Controllers\\ReviewsController@destroy'])) {
                    $str .= $delete;
                }
                return $str;
            })

            ->rawColumns(['title', 'comments', 'rating', 'name', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $reviews = Review::with(['user', 'user.metas']);

        if (count(request()->query()) > 0) {
            $reviews = $reviews->filter();
        }

        return $this->applyScopes($reviews);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()

        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => '' , 'visible' => false, 'width' => '0%'])
        ->addColumn(['data' => 'title', 'name' => 'title', 'title' => __('Title'), 'width' => '20%'])
        ->addColumn(['data' => 'comments', 'name' => 'comments', 'title' => __('Comments'),'orderable' => false, 'searchable' => false, 'width' => '30%'])
        ->addColumn(['data' => 'rating', 'name' => 'rating', 'title' => __('Ratings'), 'searchable' => false, 'width' => '15%'])
        ->addColumn(['data' => 'name', 'name' => 'user.name', 'title' => __('User Name'), 'width' => '15%'])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status'), 'width' => '10%'])

        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\\Reviews\\Http\\Controllers\\ReviewsController@edit', 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@destroy']),
        'orderable' => false, 'searchable' => false])

        ->parameters(dataTableOptions());
    }
}
