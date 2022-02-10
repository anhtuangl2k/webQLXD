<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class HopDongController extends Controller
{
    public function loadViewHopDong(){
        $all_duan = DB::table('duan')->get();

        return view('admin.add_hopdong')->with('duan',$all_duan);
    }

    public function addHopDong(Request $request){
        $data = array();
        $data['tenHD'] = $request->tenHD;
        $data['noiDung'] = $request->noiDung;
        $data['idDA'] = $request->idDA;

        $all_duan = DB::table('duan')->get();

        DB::table('hopdong')->insert($data);
        Session::put('message','Thêm dữ liệu thành công');
        return view('admin/add_hopdong')->with('duan',$all_duan);
    }

    public function getListHopDong(){
        $all_hopdong = DB::table('hopdong')->paginate(5);
        $all_duan = DB::table('duan')->get();

        return view('admin/list_hopdong')->with('hopdong', $all_hopdong)->with('duan',$all_duan);
    }

    public function editHopDong($idHopDong){
        $edit_hopdong = DB::table('hopdong')->where('idHopDong',$idHopDong)->get();

        $all_duan = DB::table('duan')->get();

        return view('admin/edit_hopdong')->with('edit_hopdong' ,$edit_hopdong)->with('duan',$all_duan);
    }

    public function updateHopDong($idHopDong, Request $request){
        $data = array();
        $data['tenHD'] = $request->tenHD;
        $data['noiDung'] = $request->noiDung;
        $data['idDA'] = $request->idDA;

        DB::table('hopdong')->where('idHopDong',$idHopDong)->update($data);
        return Redirect::to('/list-hopdong');
    }

    public function deleteHopDong($idHopDong){
        $delete_hopdong = DB::table('hopdong')->where('idHopDong',$idHopDong)->delete();
        return Redirect::to('/list-hopdong');
    }
}
