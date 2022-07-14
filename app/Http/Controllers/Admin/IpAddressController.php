<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IpAddress;
use App\Server;
use App\Country;
use App\ServerHasIpAddress;
use App\CountriesHasIpAddress;
use App\Http\Requests\MassDestroyIpAddressRequest;
use App\Http\Requests\Admin\StoreIpAddressRequest;
use App\Http\Requests\Admin\UpdateIpAddressRequest;
use Gate;
class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }
        $ipaddress = IpAddress::get();  
        return view('admin.ipaddress.index', compact('ipaddress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }
        $server = Server::get()->pluck('name', 'id');
        $countries = Country::get()->pluck('name', 'id');
        return view('admin.ipaddress.create',compact('server','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIpAddressRequest $request)
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }
       $input = $request->all();
       $servers = $input['serverid'];
       $countries = $input['countriesid'];
       $ipAddress=  IpAddress::create($request->all());
       $input['ipaddressid']=$ipAddress->max('id');
       foreach($servers as $server)
       {
        $input['serverid'] = $server;
        ServerHasIpAddress::create($input);
       }
       foreach($countries as $country)
       {
        $input['countriesid'] = $country;
        CountriesHasIpAddress::create($input);
       }
       return redirect()->route('admin.ipaddress.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IpAddress $ipaddress)
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }
        $server = Server::get()->pluck('name', 'id');
        $countries = Country::get()->pluck('name', 'id');
        return view('admin.ipaddress.edit', compact( 'ipaddress','server','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIpAddressRequest $request, IpAddress $ipaddress)
    {
        $input = $request->all();
        $servers = $input['serverid'];
        $countries = $input['countriesid'];
        $ipaddress->update($request->all());
        ServerHasIpAddress::where('ipaddressid', $ipaddress->id)->delete();
        CountriesHasIpAddress::where('ipaddressid', $ipaddress->id)->delete();
        $input['ipaddressid']=$ipaddress->id;
        foreach($servers as $server)
        {
            $input['serverid'] = $server;
            ServerHasIpAddress::create($input);
        }
        foreach($countries as $country)
        {
         $input['countriesid'] = $country;
         CountriesHasIpAddress::create($input);
        }
        return redirect()->route('admin.ipaddress.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IpAddress $ipaddress)
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }

        $ipaddress->delete();
        ServerHasIpAddress::where('ipaddressid', $ipaddress->id)->delete();
        CountriesHasIpAddress::where('ipaddressid', $ipaddress->id)->delete();
        return back();
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ip_manage')) {
            return abort(401);
        }
        IpAddress::whereIn('id', request('ids'))->delete();
        ServerHasIpAddress::where('ipaddressid', request('ids'))->delete();
        CountriesHasIpAddress::where('ipaddressid', request('ids'))->delete();
        return response()->noContent();
    }
}
