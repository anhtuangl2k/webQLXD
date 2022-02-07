<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChuDauTuController;
use App\Http\Controllers\NhaThauController;
use App\Http\Controllers\DuAnController;
use App\Http\Controllers\AdminController;

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
    return view('admin_layout');
});

//Admin
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/login', [AdminController::class, 'login']);
Route::get('/signin', [AdminController::class, 'loadViewSignin']);
Route::post('/signin_account', [AdminController::class, 'signin']);

Route::post('/dashboard', [AdminController::class, 'dashboard']);

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

// DU AN
Route::get('/add-duan', [DuAnController::class, 'loadViewDuAn']);
Route::post('/save-duan', [DuAnController::class, 'addDuAn']);

Route::get('/list-duan', [DuAnController::class, 'getListDuAn']);

Route::get('/edit-duan/{idDuAn}', [DuAnController::class, 'editDuAn']);
Route::post('/update-duan/{idDuAn}', [DuAnController::class, 'updateDuAn']);

Route::get('/delete-duan/{idDuAn}', [DuAnController::class, 'deleteDuAn']);

