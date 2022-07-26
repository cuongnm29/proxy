<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Services;
use App\Server;
use App\Country;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        $services = Services::get();
        $servers = Server::get();
        
        return view('home',compact('categories','members','services','servers'));
    }
    public function getCountriesByServer($serverid)
    {
        $countries = Country::select('name','code')->join('countries_has_server','country.id','=','countries_has_server.countries_id')->where('countries_has_server.server_id','=',$serverid)->get();
        return response()->json($countries);
    }
  
}