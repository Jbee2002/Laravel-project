<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(){
        // \App\Models\User::create([
        //     'name' => 'Admin2',
        //     'email' => 'admin2@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        return view('admin.login');
    }

    public function check_login(Request $req){
        $data = $req->only('email','password');
        $check = Auth::attempt($data,$req->has('remember'));
        if($check){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('no','Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    
}
