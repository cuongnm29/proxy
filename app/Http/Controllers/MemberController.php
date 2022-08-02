<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Category;
use App\Payment;
use App\Server;
use App\Orders;
use App\Time;
use App\Services;
use App\Setting;
use App\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MemberController extends Controller
{
    public function __construct()
    {
        
    }
    public function register()
    {
        $setting = Setting::first();
        return view('register',compact('setting'));
    }
    public function login()
    {
        $setting = Setting::first();
        return view('login',compact('setting'));
    }
    public function transaction()
    {
        $setting = Setting::first();
        $members=Session::get('member');
        $servers = Server::orderby("isorder")->get();
        $orders = Orders::where('memberid',$members->id)->get();
        $categories = Category::tree(); 
        return view('transaction',compact('categories','members','servers','orders','setting'));
    }
    public function proxy()
    {
        $setting = Setting::first();
        $services = Services::get();
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('proxy',compact('categories','members','servers','services','setting'));
    }
    public function new()
    {
        $setting = Setting::first();
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        $posts = Post::get();
        return view('new',compact('categories','members','servers','setting','posts'));
    }
    public function contact()
    {
        $setting = Setting::first();
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('contact',compact('categories','members','servers','setting'));
    }
    public function server($serverid)
    {
        $setting = Setting::first();
        $servers = Server::orderby("isorder")->get();
        $package = Server::where('id',$serverid)->orderby("isorder")->first();
        $members=Session::get('member');
        $categories = Category::tree(); 
        $orders  = Orders::where('serverid',$serverid)->get();
      
       
        return view('server',compact('categories','members','servers','orders','package','setting'));
    }
    public function logout()
    {
        Session::flush();
        return redirect('auth/login');
    }
    public function recharge()
    {
        $setting = Setting::first();
        $members=Session::get('member');
        $servers = Server::orderby("isorder")->get();
        $transactions = Payment::where('memberid',$members->id)->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('recharge',compact('categories','members','transactions','servers','setting'));
    }
    public function profile()
    {
        $setting = Setting::first();
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('profile',compact('categories','members','servers','setting'));
    }
    public function changepass(Request $request,Member $member)
    {  
        $setting = Setting::first();
        $members=Session::get('member');
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password'
        ]);
        $request['password'] = Hash::make($request->password);
        $members->update($request->all());
        return redirect()->back()->with('success', 'Change Password Successfull!');
    }
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:member',
            'username' => 'required|unique:member',
            'password' => 'required'
        ]);
        $request['status']=1;
        $request['password']=Hash::make($request['password']);
        Member::create($request->all());
        return redirect()->back()->with('success', 'Resgister Successfull!');
    }
    public function authMember(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
       
        $members = Member::where('username',$request->username)->get();
        
        if(count($members)==0){
            return redirect()->back()->with('status', 'username does not exist!');
        }
        else{
        foreach($members as $member)
        {
            if (!Hash::check($request->password, $member->password)) {
                return redirect()->back()->with('status', 'password is wrong!');
            } 
            Session::put('member',$member);
        }
      
        return redirect("/");
         }
    }
    //create recharge
    public function createrecharge(Request $request)
    {
        $setting = Setting::first();
        $request['status']=0;
        $request['code']= "#".$setting->synax.random_int(100000, 999999);
        Payment::create($request->all());
        return redirect()->back()->with('success', 'Create recharge successfull!');
    }
    public function details($id)
    {
        $setting = Setting::first();
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        $post = Post::where('id',$id)->first();
        return view('details',compact('categories','members','servers','setting','post'));
    }
}
