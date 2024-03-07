<?php
/**
 * @package BlogDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 27-12-2021
 */

namespace Modules\Blog\DataTables;

use App\DataTables\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Http\JsonResponse;
use Modules\Blog\Http\Models\Blog;


class BlogDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id');
    }

    /*
    * DataTable Ajax
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function ajax(): JsonResponse
    {
        $blogs = $this->query();

        return DataTables::eloquent($blogs)
            ->addColumn('image', function ($blog) {
                return '<img src="' . $blog->fileUrl(['id' => $blog->id]) . '" alt="' . __('image') . '" class ="data-table-image">';
            })
            ->editColumn('title', function ($blog) {
                $html = '<div class="meta-info-parent">
                <a href="' . route('blog.details', ['slug' => $blog->slug]) . '" title="' . $blog->title . '">' . $blog->title . '</a>' .
                '<span class="d-block info-meta">';
                return $html;
            })
            ->addColumn('category', function ($blog) {
                return wrapIt(optional($blog->blogCategory)->name, 10,  ['columns' => 3,'trim' => true]);
            })
            ->editColumn('author', function ($blog) {
                return '<a href="' . route('users.edit', ['id' => $blog->user_id]) . '">' . wrapIt(optional($blog->user)->name, 10,  ['columns' => 3,'trim' => true]) . '</a>';
            })
            ->editColumn('status', function ($blog) {
                return statusBadges(lcfirst($blog->status));
            })
            ->editColumn('created_at', function ($blog) {
                return $blog->format_created_at;
            })
            ->addColumn('action', function ($blog) {
                $show = '<a title="' . __('Show') . '" href="' . route('blog.details', ['slug' => $blog->slug]) . '" class="btn btn-xs btn-outline-dark me-1"><i class="feather icon-eye"></i></a>&nbsp';
                $edit = '<a title="' . __('Edit :x', ['x' => __('Blog')]) . '" href="' . route('blog.edit', ['id' => $blog->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit"></i></a>&nbsp';
                $delete = '<form method="post" action="' . route('blog.delete', ['id' => $blog->id]) . '" id="delete-Blog-'. $blog->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        <button title="' . __('Delete :x', ['x' => __('Blog')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $blog->id . ' data-label="Delete" data-delete="Blog" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Blog')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                $str = '';

                if ($blog->status == 'Active') {
                    $str .= $show;
                }

                if ($this->hasPermission(['Modules\Blog\Http\Controllers\BlogController@edit'])) {
                    $str .= $edit;
                }

                if ($this->hasPermission(['Modules\Blog\Http\Controllers\BlogController@delete'])) {
                    $str .= $delete;
                }

                return $str;
            })
            ->filter(function ($instance){
                if (request('status') && (request('status') == 'Active' || request('status') == 'Inactive' )) {
                    $instance->where('blogs.status', request('status'));
                }

                if (request('author_id')) {
                    $instance->whereHas('user', function ($query) {
                        $query->where('id', request('author_id'));
                    });
                }

                if (request('category_id')) {
                    $instance->whereHas('blogCategory', function ($query) {
                        $query->where('id', request('category_id'));
                    });
                }

                if (isset(request('search')['value'])) {
                    $keyword = xss_clean(request('search')['value']);

                    if (!empty($keyword)) {
                        $instance->where(function ($query) use ($keyword) {
                            $query->Where('title', 'like', '%' . $keyword . '%')
                            ->orWhereHas('blogCategory', function ($query) use ($keyword) {
                                $query->where('blog_categories.name', 'like', '%' . $keyword . '%');
                            })
                            ->orWhereHas('user', function ($query) use ($keyword) {
                                $query->where('users.name', 'like', '%' . $keyword . '%');
                            });
                        });
                    }
                }
            })
            ->rawColumns(['image', 'title', 'category', 'author', 'status', 'created_at', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return QueryBuilder
    */
    public function query(): QueryBuilder
    {
        $blogs = Blog::with('user', 'blogCategory', 'user.metas')->select('blogs.*')->orderBy('created_at', 'desc');

        return $this->applyScopes($blogs);
    }

    /*
    * DataTable HTML
    *
    * @return HtmlBuilder
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dataTableBuilder')
            ->minifiedAjax()
            ->addColumn(['data' => 'image', 'name' => 'image', 'title' => __('Image'), 'orderable' => false, 'searchable' => false])
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => __('Title')])
            ->addColumn(['data' => 'category', 'name' => 'blogCategory.name', 'title' => __('Category')])
            ->addColumn(['data' => 'author', 'name' => 'user.name', 'title' => __('Author')])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created At')])
            ->addColumn([
                'data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
                'visible' => $this->hasPermission(['Modules\Blog\Http\Controllers\BlogController@edit', 'Modules\Blog\Http\Controllers\BlogController@delete']),
                'orderable' => false, 'searchable' => false
            ])
            ->parameters(dataTableOptions());
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Blogs_'.date('YmdHis');
    }
}
