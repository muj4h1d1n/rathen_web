<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\registerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// home
Route::get('/', function () {
    return view('landing_page.home');
});

// landing page
Route::get('/page-costum', function () {
    return view('landing_page.page-costum');
});
// Route::get('/price-list', function () {
//     return view('landing_page.price-list');
// });
Route::get('/coba', function () {
    return view('landing_page.coba');
});

Route::get('/pricelist', function () {
    return view('landing_page.pricelist');
});

// about
// Route::get('/about', function () {
//     return view('landing_page.about');
// });

// latest result
// Route::get('/result', function () {
//     return view('landing_page.result');
// });

// cara pemesanan
// Route::get('/pemesanan', function () {
//     return view('landing_page.pemesanan');
// });

// pricelist
Route::get('/pricelist', function () {
    return view('landing_page.pricelist');
});
// Route::post('/store-price-list', function (Request $request) {
//     return view('landing_page.pricelist');
// });
Route::controller(PriceListController::class)->group(function () {
    Route::post('/store-price-list', 'store')->name('sotre');
});

// location
// Route::get('/location', function () {
//     return view('landing_page.location');
// });


// // form-order
// Route::get('/form-order', function () {
//     return view('landing_page.form-order');
// });
// // form-2
// Route::get('/form-2', function () {
//     return view('landing_page.form-2');
// });
// // form-2
// Route::get('/form-3', function () {
//     return view('landing_page.form-3');
// });


Route::controller(PesananController::class)->group(function () {
    Route::get('/form-1', 'form_1')->name('form_1');
    Route::post('/form-1/action', 'addForm1')->name('addForm1');
    Route::get('/form-2', 'form_2')->name('form_2');
    Route::get('/form-3', 'form_3')->name('form_3');
    Route::get('/form-4', 'form_4')->name('form_4');
    Route::get('/invoice', 'invoice')->name('invoice');
    Route::post('/tambah-data-pesanan', 'tambahDataPesanan')->name('tambahDataPesanan');
});

Route::get('/unduh-format-file', [FileController::class, 'unduhFormatFile'])->name('unduhFormatFile');


// contact us
Route::get('/contact', function () {
    return view('landing_page.contact');
});



Route::controller(loginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/actionlogin', 'actionlogin')->name('actionlogin');
    Route::get('actionlogout', 'actionlogout')->name('actionlogout');
});
Route::controller(registerController::class)->group(function () {
    Route::get('/daftar', 'daftar')->name('daftar');
    Route::post('/daftar/actiondaftar', 'actionregister')->name('actionregister');
});

Route::controller(adminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/view-order', 'vieworder')->name('vieworder');
    Route::get('/finance', 'finance')->name('finance');
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
