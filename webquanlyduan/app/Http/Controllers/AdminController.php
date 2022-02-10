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
        $username = $request->username;
        $password = md5($request->password);

        $result = DB::table('taikhoan')->where('username',$username)->where('password', $password)->first();

        if($result){
            Session::put('name',$result->username);
            Session::put('idTK',$result->idTaiKhoan);
            return view('/admin.statistic');
        }
        else{
            Session::put('message','Bạn đã nhập sai tài khoản hoặc mật khẩu! Vui lòng nhập lại');
            return Redirect::to('/login');
        }
    }

    public function loadViewSignin(){
        return view('admin_signin');
    }

    public function signin(Request $request){
        $data = array();
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);
        $data['trangThai'] = 'active';
        $data['ngayTao'] = date('d/m/y');

        $result = DB::table('taikhoan')->insert($data);
        if($result){
            return Redirect::to('/login');
        }
            else{
                Session::put('message','Bạn đã nhập sai tài khoản hoặc mật khẩu! Vui lòng nhập lại');
                return Redirect::to('/login');
            }
    }
    public function statistic(){
        return view('admin.statistic');
    }
}
