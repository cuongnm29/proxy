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
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        $services = Services::get();
        $servers = Server::orderby("isorder")->get();
        
        return view('home',compact('categories','members','services','servers'));
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
    public function createOrder($server,$country,$amount,$period,$money,Request $request)
    {
        $members=Session::get('member');
        $request['serverid'] =$server;
        $request['countriesid'] = $country;
        $request['qty']=$amount;
        $request['timeid']= $period; 
        $request['price'] = $money;
        $request['memberid']= $members->id;
        Orders::create($request->all());
        return response()->json("Create order success");
    }
}