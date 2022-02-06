<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class AdminController extends Controller
{
    public function login(){
        return view('admin_login');
    }

    public function logout(){
        Session::put('name',null);
        return Redirect::to('/login');
    }

    public function dashboard(Request $request){
        $username = $request->admin_username;
        $password = ($request->admin_password);

        $result = DB::table('taikhoan')->where('admin_username',$username)->where('admin_password', $password)->first();

        if($result){
            Session::put('name',$result->admin_username);
            return view('/admin/dashboard');
        }
        else{
            Session::put('message','Bạn đã nhập sai tài khoản hoặc mật khẩu! Vui lòng nhập lại');
            return Redirect::to('/login');
        }
    }
}
