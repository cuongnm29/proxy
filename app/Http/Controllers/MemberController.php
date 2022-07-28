<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Category;
use App\Payment;
use App\Server;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MemberController extends Controller
{
    public function __construct()
    {
        
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function transaction()
    {
      
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('transaction',compact('categories','members','servers'));
    }
    public function proxy()
    {
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('proxy',compact('categories','members','servers'));
    }
    public function new()
    {
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('new',compact('categories','members','servers'));
    }
    public function contact()
    {
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('contact',compact('categories','members','servers'));
    }
    public function server()
    {
        $servers = Server::orderby("isorder")->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('server',compact('categories','members','servers'));
    }
    public function logout()
    {
        Session::flush();
        return redirect('auth/login');
    }
    public function recharge()
    {
        $members=Session::get('member');
        $servers = Server::orderby("isorder")->get();
        $transactions = Payment::where('memberid',$members->id)->get();
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('recharge',compact('categories','members','transactions','servers'));
    }
    public function profile()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('profile',compact('categories','members'));
    }
    public function changepass(Request $request,Member $member)
    {  
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
        $request['status']=0;
        $request['code']= "#PXG".random_int(100000, 999999);
        Payment::create($request->all());
        return redirect()->back()->with('success', 'Create recharge successfull!');
    }
    
}
