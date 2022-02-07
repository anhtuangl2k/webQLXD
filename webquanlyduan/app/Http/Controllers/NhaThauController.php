<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class NhaThauController extends Controller
{
    public function loadViewNhaThau(){
        return view('admin.add_nhathau');
    }

    public function addNhaThau(Request $request){
        $data = array();
        $data['tenNT'] = $request->tenNT;
        $data['diaChi'] = $request->diaChi;
        $data['sdt'] = $request->sdt;
        $data['email'] = $request->email;

        DB::table('nhathau')->insert($data);
        Session::put('message','Thêm dữ liệu thành công');
        return view('admin/add_nhathau');
    }

    public function getListNhaThau(){
        $all_nhathau = DB::table('nhathau')->paginate(5);
        return view('admin/list_nhathau')->with('nhathau', $all_nhathau);
    }

    public function editNhaThau($idNhaThau){
        $edit_nhathau = DB::table('nhathau')->where('idNhaThau',$idNhaThau)->get();
        return view('admin/edit_nhathau')->with('edit_nhathau' ,$edit_nhathau);
    }

    public function updateNhaThau($idNhaThau, Request $request){
        $data = array();
        $data['tenNT'] = $request->tenNT;
        $data['diaChi'] = $request->diaChi;
        $data['sdt'] = $request->sdt;
        $data['email'] = $request->email;

        DB::table('nhathau')->where('idNhaThau',$idNhaThau)->update($data);
        return Redirect::to('/list-nhathau');
    }

    public function deleteNhaThau($idNhaThau){
        $delete_nhathau = DB::table('nhathau')->where('idNhaThau',$idNhaThau)->delete();
        return Redirect::to('/list-nhathau');
    }
}
