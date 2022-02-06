<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class ChuDauTuController extends Controller
{
    public function add_chudautu(){        
        return view('admin.add_chudautu');
    }

    public function list_chudautu(){
        return view('admin.list_chudautu');
    }

    public function save_chudautu(Request $request){
        $data = array();
        $data['tenCDT'] = $request->tenCDT;

        DB::table('chudautu')->insert($data);
        Session::put('message','Thêm dữ liệu thành công');
        return view('admin/add_chudautu');
    }

    public function getlist_chudautu(){
        $all_chudautu = DB::table('chudautu')->paginate(5); 
        return view('admin/list_chudautu')->with('chudautu', $all_chudautu);
    }

    public function get_details($category_new_id){
        $edit_category_new = DB::table('new_details')->where('idNewDetail',$category_new_id)->get();
        return view('customer/new_detail')->with('new_detail' ,$edit_category_new);
    }

    public function edit_chudautu($idCDT){
        $edit_chudautu = DB::table('chudautu')->where('idCDT',$idCDT)->get();
        return view('admin/edit_chudautu')->with('edit_chudautu' ,$edit_chudautu);
    }

    public function update_chudautu($idCDT, Request $request){
        $data = array();
        $data['tenCDT'] = $request->tenCDT;

        DB::table('chudautu')->where('idCDT',$idCDT)->update($data);
        return Redirect::to('/list-chudautu');
    }

    public function delete_chudautu($idCDT){
        $delete_chudautu = DB::table('chudautu')->where('idCDT',$idCDT)->delete();
        return Redirect::to('/list-chudautu');
    }
}
