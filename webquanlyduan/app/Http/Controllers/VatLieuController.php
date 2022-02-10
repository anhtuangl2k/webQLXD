<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class VatLieuController extends Controller
{
    public function add_vatlieu(){        
        return view('admin.add_vatlieu');
    }

    public function save_vatlieu(Request $request){
        $data = array();
        $data['tenVL'] = $request->tenVL;
        $data['donVi'] = $request->donVi;

        DB::table('vatlieu')->insert($data);
        Session::put('message','Thêm dữ liệu thành công');
        return view('admin/add_vatlieu');
    }

    public function list_vatlieu(){
        return view('admin.list_vatlieu');
    }

    public function getlist_vatlieu(){
        $all_vatlieu = DB::table('vatlieu')->paginate(5); 
        return view('admin/list_vatlieu')->with('vatlieu', $all_vatlieu);
    }

    public function edit_vatlieu($idVatLieu){
        $edit_vatlieu = DB::table('vatlieu')->where('idVatlieu',$idVatLieu)->get();
        return view('admin/edit_vatlieu')->with('edit_vatlieu' ,$edit_vatlieu);
    }

    public function update_vatlieu($idVatLieu, Request $request){
        $data = array();
        $data['tenVL'] = $request->tenVL;
        $data['donVi'] = $request->donVi;

        DB::table('vatlieu')->where('idVatLieu',$idVatLieu)->update($data);
        return Redirect::to('/list-vatlieu');
    }

    public function delete_vatlieu($idVatLieu){
        $delete_vatlieu = DB::table('vatlieu')->where('idVatLieu',$idVatLieu)->delete();
        return Redirect::to('/list-vatlieu');
    }

}
