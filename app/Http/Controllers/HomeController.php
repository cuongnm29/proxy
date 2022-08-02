<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Services;
use App\Server;
use App\Country;
use App\Time;
use App\Orders;
use App\Member;
use App\Setting;
use App\CountriesHasIpAddress; 
use App\Http\Requests\Admin\UpdateMemberRequest;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {  $setting = Setting::first();
        $members=Session::get('member');
        $categories = Category::tree(); 
        $services = Services::get();
        $servers = Server::orderby("isorder")->get();
        
        return view('home',compact('categories','members','services','servers','setting'));
    }
    public function getCountriesByServer($serverid)
    {
        $countries = Country::select('name','code')->join('countries_has_server','country.id','=','countries_has_server.countries_id')->where('countries_has_server.server_id','=',$serverid)->get();
        return response()->json($countries);
    }
    public function getTimeByServer($serverid)
    {
        $countries = Time::select('name','id')->join('time_has_server','time.id','=','time_has_server.time_id')->where('time_has_server.server_id','=',$serverid)->get();
        return response()->json($countries);
    }
    public function getRemainIp($countriesid)
    {
        $remain = CountriesHasIpAddress::where('countriesid','=',$countriesid)->where('status',0)->count();
        return response()->json($remain);
    }
    public function createOrder($server,$country,$amount,$period,$money,Request $request,UpdateMemberRequest $reqmember)
    {
        $members=Session::get('member');
        $lstMember = Member::where('id',$members->id)->where('status',1)->first();
        $remain = CountriesHasIpAddress::where('countriesid','=',$country)->where('status',0)->count();
        $checkMoney = $lstMember->point - $lstMember->charge;
        if($checkMoney >= $money)
        {
        $request['serverid'] =$server;
        $request['countriesid'] = $country;
        $request['qty']=$amount;
        $request['timeid']= $period; 
        $request['price'] = $money;
        $request['memberid']= $members->id;
        Orders::create($request->all());
        $reqmember['charge']= $lstMember->charge + $money;
        $lstMember->update($reqmember->all());
        return response()->json("Create order success");
        }
        else if($remain  =0)
        {
            return response()->json("not enough ip please choose country again");
        }
        else{
            return response()->json("not enough money");
        }
    }
}