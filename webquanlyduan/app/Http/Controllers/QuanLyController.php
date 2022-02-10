<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class QuanLyController extends Controller
{
    public function loadViewQuanLy(Request $request){
        $idTK = $request->session()->get('idTK');

        $user = DB::table('quanly')->where('idTK',$idTK)->first();

        if($user){
            $edit_quanly = DB::table('quanly')->where('idQuanLy',$user->idQuanLy)->get();

            return view('admin/edit_quanly')->with('edit_quanly' ,$edit_quanly);        }
        else{
            return view('admin/add_quanly');
        }

    }
    public function addQLView(){
        return view('admin/add_quanly');
    }

    public function addQuanLy(Request $request){
        $data = array();
        $data['ten'] = $request->ten;
        $data['dob'] = $request->dob;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;
        $data['chucVu'] = $request->chucVu;
        $data['idTK'] = $request->session()->get('idTK');

        DB::table('quanly')->insert($data);
        Session::put('message','Thêm dữ liệu thành công');
        return view('admin/add_quanly');
    }

    public function editQuanLy($idQuanLy){
        $edit_quanly = DB::table('quanly')->where('idQuanLy',$idQuanLy)->get();

        return view('admin/edit_quanly')->with('edit_quanly' ,$edit_quanly);
    }

    public function updateQuanLy($idquanly, Request $request){
        $data = array();
        $data['ten'] = $request->ten;
        $data['dob'] = $request->dob;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;
        $data['chucVu'] = $request->chucVu;
        $data['idTK'] = $idTK;

        DB::table('quanly')->where('idquanly',$idquanly);
        return Redirect::to('/');
    }
}
