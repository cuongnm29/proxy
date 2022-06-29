<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Server;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use Gate;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();  
        return view('admin.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (! Gate::allows('country_manage')) {
            return abort(401);
        }
        $servers = Server::get()->pluck('name', 'name');
        return view('admin.country.create',compact('servers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $input = $request->all();
        $serverid = $input['serverid'];
        $input['serverid'] = implode(',', $serverid);
        Country::create($input);
        
        return redirect()->route('admin.country.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        if (! Gate::allows('country_manage')) {
            return abort(401);
        }
        $servers = Server::get()->pluck('name', 'name');
        return view('admin.country.edit', compact( 'country','servers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $input = $request->all();
        $serverid = $input['serverid'];
        $input['serverid'] = implode(',', $serverid);
        
        $country->update($input);
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if (! Gate::allows('country_manage')) {
            return abort(401);
        }

        $country->delete();
        return back();
    }
     /**
     * Delete all selected Services at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('country_manage')) {
            return abort(401);
        }
        Country::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
