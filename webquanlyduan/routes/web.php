<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChuDauTuController;
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
    return view('welcome');
});

//Admin
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/login', [AdminController::class, 'login']);
Route::post('/dashboard', [AdminController::class, 'dashboard']);

//ChuDauTu
Route::get('/add-chudautu', [ChuDauTuController::class, 'add_chudautu']);

Route::get('/edit-chudautu/{idCDT}', [ChuDauTuController::class, 'edit_chudautu']);
Route::post('/update-chudautu/{idCDT}', [ChuDauTuController::class, 'update_chudautu']);

Route::get('/delete-chudautu/{idCDT}', [ChuDauTuController::class, 'delete_chudautu']);

Route::get('/list-chudautu', [ChuDauTuController::class, 'list_chudautu']);
Route::post('/save-chudautu', [ChuDauTuController::class, 'save_chudautu']);
Route::get('/list-chudautu', [ChuDauTuController::class, 'getlist_chudautu']);

