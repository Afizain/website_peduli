<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DataAduanController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DataUserController;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('users', DataUserController::class);

Route::controller(AuthController::class)->group(function(){
    
    Route::get('register', 'registerView')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'loginView')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route :: controller(AuthController::class)->prefix('profile')->group(function(){
    Route::get('', 'index')->name('profile');
    Route::post('profile', 'profileUpdate')->name('profile.update');
});
Route :: controller(DataDiriController::class)->prefix('profile')->group(function(){
    Route::post('', 'profileUpdate')->name('profile.update');
});


Route::middleware('auth')->group(function(){
    Route::get('dashboard', function () {
        return view('layouts.dashboard');
        
    })->name('dashboard');
    
    Route :: controller(DataAduanController::class)->prefix('pengaduan')->group(function(){
        Route::get('', 'index2')->name('pengaduan');
    });
    // Route :: controller(DataDiriController::class)->prefix('pengaduan')->group(function(){
    //     Route::get('', 'index2')->name('pengaduan');
    // });
});