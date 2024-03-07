<?php
/**
 * @package BlogController
 * @author TechVillage <support@techvill.org>
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 * @created 01-01-2022
 */
namespace Modules\Blog\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Models\BlogCategory;
use Modules\Blog\Http\Models\Blog;
use Session;

class BlogController extends Controller
{

/**
     * Blog all list
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function allBlogs()
    {
        $data['blogs'] = Blog::with(['user', 'objectImage', 'blogCategory'])->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->where(['status' => 'Active'])->latest()->archiveFilter(request(['year']))->paginate(10);

        if (empty($data['blogs'])) {
            return redirect()->back();
        }

        $data['blogCategory'] = null;

        $data['popularBlogs'] = Blog::whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->orderBy('total_views', 'DESC')->get()->take(3);

        $data['blogCategories'] = BlogCategory::whereHas('blog', function ($query) {
            $query->activePost();
        })->where('status', 'Active')->get();

        $data['archives'] = Blog::archives();

        return view('blog::frontend.blog-post', $data);
    }

    /**
     * search blog list
     * @param Request $request
     * @return array
     */
    public function blogSearch(Request $request)
    {
        $value = $request->search;
        $data['blogs'] = Blog::with("user:id,name")->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->WhereLike('title', $value)
            ->orWhereLike('description', $value)->activePost()->paginate(10);

        if (empty($data['blogs'])) {
            return redirect()->back();
        }

        $data['blogCategory'] = null;

        $data['popularBlogs'] = Blog::whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->orderBy('total_views', 'DESC')->get()->take(3);

        $data['blogCategories'] = BlogCategory::whereHas('blog', function ($query) {
            $query->activePost();
        })->where('status', 'Active')->get();

        $data['archives'] = Blog::archives();

        return view('blog::frontend.blog-post', $data);
    }
    /**
     * Blog Details
     * @param $slug
     */
    public function blogDetails($slug)
    {
        $query = Blog::with("user:id,name")->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost();
        $data['blog'] = $query = $query->where('slug', $slug)->first();

        if (empty($data['blog'])) {
            return redirect()->back();
        }

        $blogKey = 'blog_' . $data['blog']->id;
        if (!Session::has($blogKey)) {
            $data['blog']->increment('total_views');
            Session::put($blogKey, 1);
        }

        $nextId = Blog::whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->where('id', '>', $data['blog']->id)->min('id');
        $data['nextUrl'] = Blog::find($nextId);

        $previousId = Blog::whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->where('id', '<', $data['blog']->id)->max('id');
        $data['previousUrl'] = Blog::find($previousId);

        $data['popularBlogs'] = $query->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->orderBy('total_views', 'DESC')->get()->take(3);

        $data['blogCategories'] = BlogCategory::whereHas('blog', function ($query) {
            $query->activePost();
        })->where('status', 'Active')->get();

        $data['relatedPosts'] = $query->with("user:id,name")->where('category_id', $data['blog']->category_id)->activePost()->where('id', '!=', $data['blog']->id)->orderBy('id', 'DESC')->get()->take(3);

        $data['archives'] = Blog::archives();

        return view('blog::frontend.blog-details', $data);
    }

    /**
     * Blog Category
     * @param $id
     */
    public function blogCategory($id)
    {
        $data['blogs'] = Blog::with('user', 'blogCategory')->whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->where(['category_id' => $id, 'status' => 'Active'])->paginate(10);

        if (empty($data['blogs'])) {
            return redirect()->back();
        }
        $data['blogCategory'] = BlogCategory::find($id);
        $data['popularBlogs'] = Blog::whereHas('blogCategory', function ($query) {
            $query->where('status', 'Active');
        })->activePost()->orderBy('total_views', 'DESC')->get()->take(3);

        $data['blogCategories'] = BlogCategory::whereHas('blog', function ($query) {
            $query->activePost();
        })->where('status', 'Active')->get();

        $data['archives'] = Blog::archives();

        return view('blog::frontend.blog-post', $data);
    }

}
