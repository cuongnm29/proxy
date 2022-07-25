<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('home',compact('categories','members'));
    }
  
}