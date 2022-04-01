<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/users', [AdminController::class, 'user'])->name('admin.users');
Route::get('/foodmenu', [AdminController::class, 'foodmenu'])->name('admin.foodmenu');
Route::post('/foodmenuAdd', [AdminController::class, 'foodmenuAdd'])->name('admin.foodmenuAdd');
Route::post('/foodmenu/delete/{id}', [AdminController::class, 'foodmenuDelete'])->name('admin.foodmenu.delete');


Route::post('/users/delete/{id}', [AdminController::class, 'deleteuser'])->name('admin.users.delete');



Route::get('/redirects', [FrontController::class,'redirects'])->name('dashboard');
Route::get('/user/home',[HomeController::class,'index'])->name('user.home');

Auth::routes();



