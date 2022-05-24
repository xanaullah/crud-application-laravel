<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\UserController;

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
route::get ('/user', [\App\Http\Controllers\UserController::class ,'index'])->name('register');
// for insert data
route::post('/saveuser' , [UserController::class ,'store'])->name('User');

//for update data
route::post('update/{id}' , [UserController::class , 'update'])->name('update');
route::get('/delete/{id}' , [UserController::class ,  'destory'])->name('delete');
route::get('edit/{id}' , [UserController::class , 'ShowData']);