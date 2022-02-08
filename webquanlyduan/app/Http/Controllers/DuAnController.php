<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class DuAnController extends Controller
{
    public function loadViewDuAn(){
        $all_nhathau = DB::table('nhathau')->get();
        $all_chudautu = DB::table('chudautu')->get();

        return view('admin.add_duan')->with('nhathau',$all_nhathau)->with('chudautu',$all_chudautu);
    }

    public function addDuAn(Request $request){
        $data = array();
        $data['tenDA'] = $request->tenDA;
        $data['tenCT'] = $request->tenCT;
        $data['gtriDA'] = $request->gtriDA;
        $data['tamUng'] = $request->tamUng;
        $data['ngayBatDau'] = $request->ngayBatDau;
        $data['ngayKetThuc'] = $request->ngayKetThuc;
        $data['tinhTrang'] = $request->tinhTrang;
        // THEM KHOA NGOAI
        $data['idNT'] = $request->idNT;
        $data['idCDT'] = $request->idCDT;

        DB::table('duan')->insert($data);
        $all_nhathau = DB::table('nhathau')->get();
        $all_chudautu = DB::table('chudautu')->get();

        Session::put('message','Thêm dữ liệu thành công');
        return view('admin.add_duan')->with('nhathau',$all_nhathau)->with('chudautu',$all_chudautu);
    }

    public function getListDuAn(){
        $all_duan = DB::table('duan')->paginate(5);
        $all_nhathau = DB::table('nhathau')->get();
        $all_chudautu = DB::table('chudautu')->get();

        return view('admin/list_duan')->with('duan', $all_duan)->with('nhathau',$all_nhathau)->with('chudautu',$all_chudautu);
    }

    public function editDuAn($idDuAn){
        $edit_duan = DB::table('duan')->where('idDA',$idDuAn)->get();

        $all_nhathau = DB::table('nhathau')->get();
        $all_chudautu = DB::table('chudautu')->get();

        return view('admin/edit_duan')->with('edit_duan' ,$edit_duan)->with('nhathau',$all_nhathau)->with('chudautu',$all_chudautu);
    }

    public function updateDuAn($idDuAn, Request $request){
        $data = array();
        $data['tenDA'] = $request->tenDA;
        $data['tenCT'] = $request->tenCT;
        $data['gtriDA'] = $request->gtriDA;
        $data['ngayBatDau'] = $request->ngayBatDau;
        $data['ngayKetThuc'] = $request->ngayKetThuc;
        $data['tinhTrang'] = $request->tinhTrang;
        // THEM KHOA NGOAI
        $data['idNT'] = $request->idNT;
        $data['idCDT'] = $request->idCDT;

        DB::table('duan')->where('idDA',$idDuAn)->update($data);
        return Redirect::to('/list-duan');
    }

    public function deleteDuAn($idDuAn){
        $delete_duan = DB::table('duan')->where('idDA',$idDuAn)->delete();
        return Redirect::to('/list-duan');
    }
}
