<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Proses sistem login

// Halaman register
Route::post('/register',[AuthController::class,'register']);

// Halaman Login
Route::post('/login',[AuthController::class,'login']);

// Untuk mengakses beberapa sistem di bawah ini diperlukan token data yang di ambil setelah user sudah login
// Dengan mengecek lewat aplikasi atau website postman
Route::group(['middleware' =>['auth:sanctum']],function(){

    // Halaman Pengolahan Data Stocks

    // Menampilkan semua data stock yang berelasi ke tabel products
    Route::get('/stocks',[StockController::class, 'index']);

    // Untuk proses tambah satu data stock
    Route::post('/stocks',[StockController::class, 'store']);

    // Untuk proses menampilkan satu data stock
    Route::get('/stocks/{id}',[StockController::class, 'show']);

    // Untuk proses ubah satu data product
    Route::put('/stocks/{id}',[StockController::class, 'update']);

    // Untuk proses hapus satu data product
    Route::delete('/stocks/{id}',[StockController::class, 'destroy']);

    // Halaman Pengolahan Data Products

    // Menampilkan semua data product yang berelasi ke tabel kategoris
    Route::get('/products',[ProductController::class, 'index']);

    // Menampilkan semua data product berdasarkan kategorinya yang berelasi ke tabel kategoris
    Route::get('/products/{id}',[ProductController::class, 'allKategori']);

    // Untuk proses tambah satu data product
    Route::post('/products',[ProductController::class, 'store']);

    // Untuk proses menampilkan satu data product
    Route::get('/products/{id}',[ProductController::class, 'show']);

    // Untuk proses ubah satu data product
    Route::put('/products/{id}',[ProductController::class, 'update']);

    // Untuk proses hapus satu data product
    Route::delete('/products/{id}',[ProductController::class, 'destroy']);

    // Halaman Pengolahan Data Kategoris

    // Menampilkan semua data kategori
    Route::get('/kategoris',[KategorisController::class, 'index']);

    // Untuk proses tambah satu data kategori
    Route::post('/kategoris',[KategorisController::class, 'store']);

    // Untuk proses menampilkan satu data kategori
    Route::get('/kategoris/{id}',[KategorisController::class, 'show']);

    // Untuk proses ubah satu data kategori
    Route::put('/kategoris/{id}',[KategorisController::class, 'update']);

    // Untuk proses hapus satu data kategori
    Route::delete('/kategoris/{id}',[KategorisController::class, 'destroy']);

    Route::post('/logout',[AuthController::class,'logout']);

});