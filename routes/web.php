<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WasteController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Models\Waste;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {
    $getUser = auth()->user()->id;
    return view('/dashboard/index', [
        'title' => 'Re-Waste Application',
        'data' => Waste::where('user_id', $getUser)->get()
    ]);
})->middleware('auth');

Route::get('/', function () {
    return view('/index', [
        'wastes' => Waste::get()
    ]);
});

Route::get('/detail/{id}', [DetailController::class, 'show']);
Route::get('/penawaran/{id}', [PenawaranController::class, 'penawaran']);
Route::post('/penawaran/tambah', [PenawaranController::class, 'store']);
Route::get('/transaksi/{id:kode_penawaran}', [PenawaranController::class, 'transaksi'])->name("transaksi");
Route::get('/transaksi/bukti/{id:kode_penawaran}', [PenawaranController::class, 'indexTransaksi'])->name("transaksi_bukti");

Route::resource('/dashboard/waste', WasteController::class)->except('show')->middleware('auth');
Route::get('/dashboard/waste/exportexcel', [WasteController::class, 'exportexcel'])->middleware('auth');
Route::get('/dashboard/category/botol-cup', [CategoryController::class, 'botol_cup'])->middleware('admin');
Route::get('/dashboard/category/kardus', [CategoryController::class, 'kardus'])->middleware('admin');
Route::get('/dashboard/category/karton-susu', [CategoryController::class, 'karton_susu'])->middleware('admin');
Route::get('/dashboard/penawaran', [PenawaranController::class, 'dataPenawaran'])->middleware('admin');
Route::get('/dashboard/penawaran/detail/{data:kode_penawaran}', [PenawaranController::class, 'showPenawaran'])->middleware('admin');
