<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }
    public function Dashboard(){
        return view('admin.index');
    }
    public function Login(Request $request){
        // dd($request->all());
        $check=$request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login succesful');
        }else{
            return back()->with('error','invalid email or pasword');
        }

    }
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error','Admin Logout succesful');

    }
    public function AdminRegister(){
        return view('admin.admin_register');

    }
    // insertion of data
    public function AdminRegisterCreate(Request $request){
        // Provides confirmation that the data submitted is okay:dd($request->all());
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_from')->with('success', 'Admin created successfully');

    }
}
