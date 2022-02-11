<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChuDauTuController;
use App\Http\Controllers\NhaThauController;
use App\Http\Controllers\KCCTController;
use App\Http\Controllers\DuAnController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VatLieuController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\QuanLyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin_login');
});

//Admin
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/login', [AdminController::class, 'login']);
Route::get('/signin', [AdminController::class, 'loadViewSignin']);
Route::post('/signin_account', [AdminController::class, 'signin']);

Route::post('/dashboard', [AdminController::class, 'dashboard']);

//ADMIN PROFILE
Route::get('/admin-profile', [QuanLyController::class, 'loadViewQuanLy']);
Route::get('/add-quanly', [QuanLyController::class, 'addQLView']);
Route::post('/save-quanly', [QuanLyController::class, 'addQuanLy']);
Route::get('/edit-quanly/{idQuanLy}', [QuanLyController::class, 'editQuanLy']);
Route::post('/update-quanly/{idQuanLy}', [QuanLyController::class, 'updateQuanLy']);


//ChuDauTu
Route::get('/add-chudautu', [ChuDauTuController::class, 'add_chudautu']);

Route::get('/edit-chudautu/{idCDT}', [ChuDauTuController::class, 'edit_chudautu']);
Route::post('/update-chudautu/{idCDT}', [ChuDauTuController::class, 'update_chudautu']);

Route::get('/delete-chudautu/{idCDT}', [ChuDauTuController::class, 'delete_chudautu']);

Route::get('/list-chudautu', [ChuDauTuController::class, 'list_chudautu']);
Route::post('/save-chudautu', [ChuDauTuController::class, 'save_chudautu']);

Route::get('/list-chudautu', [ChuDauTuController::class, 'getlist_chudautu']);

// NHA THAU
Route::get('/add-nhathau', [NhaThauController::class, 'loadViewNhaThau']);
Route::post('/save-nhathau', [NhaThauController::class, 'addNhaThau']);

Route::get('/list-nhathau', [NhaThauController::class, 'getListNhaThau']);

Route::get('/edit-nhathau/{idNhaThau}', [NhaThauController::class, 'editNhaThau']);
Route::post('/update-nhathau/{idNhaThau}', [NhaThauController::class, 'updateNhaThau']);

Route::get('/delete-nhathau/{idNhaThau}', [NhaThauController::class, 'deleteNhaThau']);

//PHAN QUYEN DU AN
Route::get('/allocate-duan/{idDA}', [DuAnController::class, 'addQuyen']);
Route::post('/save-allocate/{idDA}', [DuAnController::class, 'saveQuyen']);

// DU AN
Route::get('/add-duan', [DuAnController::class, 'loadViewDuAn']);
Route::post('/save-duan', [DuAnController::class, 'addDuAn']);

Route::get('/list-duan', [DuAnController::class, 'getListDuAn']);

Route::get('/edit-duan/{idDuAn}', [DuAnController::class, 'editDuAn']);
Route::post('/update-duan/{idDuAn}', [DuAnController::class, 'updateDuAn']);

Route::get('/delete-duan/{idDuAn}', [DuAnController::class, 'deleteDuAn']);

// KHOAN CHI CONG TRUONG
Route::get('/add-kcct', [KCCTController::class, 'loadViewKCCT']);
Route::post('/save-kcct', [KCCTController::class, 'addKCCT']);

Route::get('/list-kcct', [KCCTController::class, 'getListKCCT']);

Route::get('/edit-kcct/{id}', [KCCTController::class, 'editKCCT']);
Route::post('/update-kcct/{id}', [KCCTController::class, 'updateKCCT']);

Route::get('/delete-kcct/{id}', [KCCTController::class, 'deleteKCCT']);

//THEM VAT LIEU CHO CONG TRUONG
Route::get('/add-vlTokcct/{idCT}', [KCCTController::class, 'addVatLieus']);
Route::post('/save-vlTokcct/{idCT}', [KCCTController::class, 'saveVatLieus']);

//Vatlieu
Route::get('/add-vatlieu', [VatLieuController::class, 'add_vatlieu']);
Route::post('/save-vatlieu', [VatLieuController::class, 'save_vatlieu']);

Route::get('/list-vatlieu', [VatLieuController::class, 'getlist_vatlieu']);

Route::get('/edit-vatlieu/{idVatLieu}', [VatLieuController::class, 'edit_vatlieu']);
Route::post('/update-vatlieu/{idVatLieu}', [VatlieuController::class, 'update_vatlieu']);

Route::get('/delete-vatlieu/{idVatLieu}', [VatLieuController::class, 'delete_vatlieu']);

// HOP DONG
Route::get('/add-hopdong', [HopDongController::class, 'loadViewHopDong']);
Route::post('/save-hopdong', [HopDongController::class, 'addHopDong']);

Route::get('/list-hopdong', [HopDongController::class, 'getListHopDong']);

Route::get('/edit-hopdong/{idHD}', [HopDongController::class, 'editHopDong']);
Route::post('/update-hopdong/{idHD}', [HopDongController::class, 'updateHopDong']);

Route::get('/delete-hopdong/{idHD}', [HopDongController::class, 'deleteHopDong']);

// STATISTIC
Route::get('/main', [AdminController::class, 'statistic']);

