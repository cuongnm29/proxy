<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Gate;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('post_manage')) {
            return abort(401);
        }
        $posts = Post::get();  
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('post_manage')) {
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
    public function store(StorePostRequest  $request)
    {
        if (! Gate::allows('post_manage')) {
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
    public function edit(Post $post)
    {
        if (! Gate::allows('post_manage')) {
            return abort(401);
        }
        $categories = Category::treeNews();
        return view('admin.post.edit', compact( 'post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, post $post)
    {
        if (! Gate::allows('post_manage')) {
            return abort(401);
        }
        $request['slug']=Str::slug($request->title, '-');
        $post->update($request->all());

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (! Gate::allows('post_manage')) {
            return abort(401);
        }
        $post->delete();
        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('post_manage')) {
            return abort(401);
        }
        Post::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
