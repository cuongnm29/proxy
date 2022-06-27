<?php

namespace App\Http\Controllers\Admin;

use App\Services;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServicesRequest;
use App\Http\Requests\Admin\StoreServicesRequest;
use App\Http\Requests\Admin\UpdateServicesRequest;
use Gate;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::get();  
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('services_manage')) {
            return abort(401);
        }

        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicesRequest $request)
    {
        Services::create($request->all());
        return redirect()->route('admin.services.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        if (! Gate::allows('services_manage')) {
            return abort(401);
        }
        return view('admin.services.edit', compact( 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicesRequest $request, Services $service)
    {
        $service->update($request->all());

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        if (! Gate::allows('services_manage')) {
            return abort(401);
        }

        $services->delete();

        return back();
    }
     /**
     * Delete all selected Services at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('services_manage')) {
            return abort(401);
        }
        Services::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
