<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::group(['middleware'=> 'auth'], function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/user/edit',[UserController::class, 'edit'])->name('user.edit');
        Route::patch('/user/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}/destroy',[UserController::class,'destroy'])->name('user.destroy');
        Route::get('/people', [UserController::class, 'search'])->name('user.search');


});