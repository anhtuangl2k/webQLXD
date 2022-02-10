<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class KCCTController extends Controller
{
    public function loadViewKCCT(){
        $all_duan = DB::table('duan')->get();

        return view('admin.add_kcct')->with('duan',$all_duan);
    }

    public function addKCCT(Request $request){
        $data = array();
        $data['noiDung'] = $request->noiDung;
        $data['tongTien'] = $request->tongTien;
        $data['ngayDuyet'] = $request->ngayDuyet;
        $data['ngayTao'] = $request->ngayTao;
        $data['trangThai'] = $request->trangThai;
        // THEM KHOA NGOAI
        $data['idDA'] = $request->idDA;

        DB::table('khoanchicongtruong')->insert($data);

        $all_duan = DB::table('duan')->get();

        Session::put('message','Thêm dữ liệu thành công');
        return view('admin.add_kcct')->with('duan',$all_duan);
    }

    public function getListKCCT(){
        $all_KCCT = DB::table('khoanchicongtruong')->paginate(5);
        $all_duan = DB::table('duan')->get();

        return view('admin/list_kcct')->with('kcct', $all_KCCT)->with('duan',$all_duan);
    }

    public function editKCCT($idKCCT){
        $edit_KCCT = DB::table('khoanchicongtruong')->where('id',$idKCCT)->get();

        $all_duan = DB::table('duan')->get();

        return view('admin/edit_kcct')->with('edit_kcct' ,$edit_KCCT)->with('duan',$all_duan);
    }

    public function updateKCCT($idKCCT, Request $request){
        $data = array();
        $data['noiDung'] = $request->noiDung;
        $data['tongTien'] = $request->tongTien;
        $data['ngayDuyet'] = $request->ngayDuyet;
        $data['ngayTao'] = $request->ngayTao;
        $data['trangThai'] = $request->trangThai;
        // THEM KHOA NGOAI
        $data['idDA'] = $request->idDA;

        DB::table('khoanchicongtruong')->where('id',$idKCCT)->update($data);

        return Redirect::to('/list-kcct');
    }

    public function deleteKCCT($idKCCT){
        $delete_KCCT = DB::table('khoanchicongtruong')->where('id',$idKCCT)->delete();
        return Redirect::to('/list-kcct');
    }

    public function addVatLieus($idCT){
        $all_vatlieu = DB::table('vatlieu')->get();
        $kcct = DB::table('khoanchicongtruong')->where('id',$idCT)->get();

        return view('admin/add_vltokcct')->with('kcct' ,$kcct)->with('vatlieu',$all_vatlieu);
    }

    public function saveVatLieus(Request $request, $idCT){
        $data = array();

        $result = DB::table('khoanchi_vatlieu')->where('idCT',$idCT)->where('idVL', $request->idVL)->first();

        if($result){
            $data['idCT'] = $result->idCT;
            $data['idVL'] = $result->idVL;
            $data['soLuong'] = $result->soLuong + $request->soLuong;

            DB::table('khoanchi_vatlieu')->where('id', $result->id)->update($data);
        }
        else{
            $data['idCT'] = $idCT;
            $data['idVL'] = $request->idVL;
            $data['soLuong'] = $request->soLuong;

            DB::table('khoanchi_vatlieu')->insert($data);
        }

        return Redirect::to('/list-kcct');
    }
}
