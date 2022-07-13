<?php

namespace App\Http\Controllers\Admin;
use App\Category; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use Gate;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        $allCategories = Category::tree(); 
        return view('admin.category.index', compact('allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        $categories = Category::tree();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        $request['slug']=Str::slug($request->name, '-');
        Category::create($request->all());
        return redirect()->route('admin.category.index');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category )
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        $categories = Category::tree();
        return view('admin.category.edit', compact( 'category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        $request['slug']=Str::slug($request->name, '-');
        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('category_manage')) {
            return abort(401);
        }
        Category::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
