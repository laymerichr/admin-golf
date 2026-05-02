<?php

use App\Http\Controllers\Admin\UserGeneratorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EscuelaController;
use App\Http\Controllers\Admin\ClubController;
use App\Http\Controllers\Admin\AutologinController;
use App\Http\Controllers\Admin\ImgLogoController;
use App\Http\Controllers\Admin\ImgFirmasController;
use App\Http\Controllers\Admin\CorreoController;
//use App\Http\Controllers\Admin\UserGeneratorController;

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
//Auth::routes();
Route::get('',[HomeAdminController::class,'index'])->name('home.admin');
Route::get('loginoutforce', [HomeAdminController::class, 'loginOutForce'])->name('login.out.force');
/**
 * Users routes
 */
Route::prefix('users')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [UserController::class,'index'])->name('users.index');
    Route::post('store', [UserController::class,'store'])->name('users.store');
    Route::post('update', [UserController::class,'update'])->name('users.update');
    Route::get('edit/{id}',[UserController::class,'edit'])->name('users.edit');
    Route::get('create',[UserController::class,'create'])->name('users.create');
    Route::get('delete/{id}',[UserController::class,'destroy'])->name('users.destroy');
    Route::get('enable/{id}',[UserController::class,'enable'])->name('users.enable');
    Route::get('disable/{id}',[UserController::class,'disable'])->name('users.disable');
});
});

Route::prefix('escuelas')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [EscuelaController::class,'index'])->name('escuelas.index');
    Route::post('store', [EscuelaController::class,'store'])->name('escuelas.store');
    Route::post('update', [EscuelaController::class,'update'])->name('escuelas.update');
    Route::get('edit/{id}',[EscuelaController::class,'edit'])->name('escuelas.edit');
    Route::get('create',[EscuelaController::class,'create'])->name('escuelas.create');
    Route::get('delete/{id}',[EscuelaController::class,'destroy'])->name('escuelas.destroy');
    Route::get('enable/{id}',[EscuelaController::class,'enableDisable'])->name('escuelas.enable');
});
});

Route::prefix('clubes')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [ClubController::class,'index'])->name('clubes.index');
    Route::post('store', [ClubController::class,'store'])->name('clubes.store');
    Route::post('update', [ClubController::class,'update'])->name('clubes.update');
    Route::get('edit/{id}',[ClubController::class,'edit'])->name('clubes.edit');
    Route::get('create',[ClubController::class,'create'])->name('clubes.create');
    Route::get('delete/{id}',[ClubController::class,'destroy'])->name('clubes.destroy');
});
});

Route::prefix('autologin')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('escuelas-juveniles', [AutologinController::class,'escuelasJuveniles'])->name('autologin.escuelas-juveniles');
    Route::get('colectivos', [AutologinController::class,'colectivos'])->name('autologin.colectivos');
    Route::get('facturacion', [AutologinController::class,'facturacion'])->name('autologin.facturacion');
    Route::get('panel-control', [AutologinController::class,'panelControl'])->name('autologin.panel-control');
    Route::get('federaciones', [AutologinController::class,'federaciones'])->name('autologin.federaciones');
    });
});

Route::prefix('logos')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [ImgLogoController::class,'index'])->name('logos.index');
    Route::post('store', [ImgLogoController::class,'store'])->name('logos.store');
    Route::post('update', [ImgLogoController::class,'update'])->name('logos.update');
    Route::get('edit/{id}',[ImgLogoController::class,'edit'])->name('logos.edit');
    Route::get('create',[ImgLogoController::class,'create'])->name('logos.create');
    Route::get('delete/{id}',[ImgLogoController::class,'destroy'])->name('logos.destroy');
});
});

Route::prefix('firmas')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [ImgFirmasController::class,'index'])->name('firmas.index');
    Route::post('store', [ImgFirmasController::class,'store'])->name('firmas.store');
    Route::post('update', [ImgFirmasController::class,'update'])->name('firmas.update');
    Route::get('edit/{id}',[ImgFirmasController::class,'edit'])->name('firmas.edit');
    Route::get('create',[ImgFirmasController::class,'create'])->name('firmas.create');
    Route::get('delete/{id}',[ImgFirmasController::class,'destroy'])->name('firmas.destroy');
});
});

Route::prefix('correos')->group(function () {
    Route::group(['middleware'=>['auth','role:admin']],function () {
    Route::get('index', [CorreoController::class,'index'])->name('correos.index');
    Route::post('store', [CorreoController::class,'store'])->name('correos.store');
    Route::post('update', [CorreoController::class,'update'])->name('correos.update');
    Route::get('edit/{id}',[CorreoController::class,'edit'])->name('correos.edit');
    Route::get('create',[CorreoController::class,'create'])->name('correos.create');
    Route::get('delete/{id}',[CorreoController::class,'destroy'])->name('correos.destroy');
});
});

/**
 * Users Generator routes
 */
Route::middleware('role:admin')->prefix('generator')->group(function () {
    Route::get('index', [UserGeneratorController::class,'index'])->name('generator.index');
});