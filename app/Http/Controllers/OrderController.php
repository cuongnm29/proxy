<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members=Session::get('member');
        $orders = Orders::where('memberid',$members->id)->get();
    }

    
}
