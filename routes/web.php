<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage\HomePageController;
use App\Http\Controllers\HomePage\UserController;

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
Route::get('/', [HomePageController::class, 'welcome'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::prefix('homepage')->group(function() {
    Route::group(['middleware'=>'auth'],function () {
        Route::get('/home', [HomePageController::class, 'index'])->name('home');
        Route::post('/users/profile/password/{id}', [UserController::class, 'resetPassword'])->name('users.reset');
        Route::post('/users/profile/data/{id}', [UserController::class, 'editProfile'])->name('users.data');
        Route::get('users/profile',[UserController::class,'show'])->name('users.profile');
    });
});
