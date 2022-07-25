<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD:app/Http/Controllers/Admin/BlogController.php
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Blog;
use App\Category;
use Gate;
class BlogController extends Controller
=======
use App\Post;
use App\Category;
use Gate;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
class PostController extends Controller
>>>>>>> master:app/Http/Controllers/Admin/PostController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $blogs = Post::get();  
        return view('admin.post.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $categories = Category::treeNews();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest  $request)
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $request['slug']=Str::slug($request->title, '-');
        Post::create($request->all());
        return redirect()->route('admin.post.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $categories = Category::treeNews();
        return view('admin.post.edit', compact( 'blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $request['slug']=Str::slug($request->title, '-');
        $blog->update($request->all());

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        $blog->delete();
        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('blog_manage')) {
            return abort(401);
        }
        Post::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
