<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class MemberController extends Controller
{
    public function __construct()
    {
        $members=Session::get('member');
        if(isset($members))
        {
            return redirect('auth/login');
        }
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
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('transaction',compact('categories','members'));
    }
    public function proxy()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('proxy',compact('categories','members'));
    }
    public function new()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('new',compact('categories','members'));
    }
    public function contact()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('contact',compact('categories','members'));
    }
    public function server()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('server',compact('categories','members'));
    }
    public function logout()
    {
        Session::flush();
        return redirect('auth/login');
    }
    public function recharge()
    {
        $members=Session::get('member');
        $categories = Category::tree(); 
        return view('recharge',compact('categories','members'));
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
}
