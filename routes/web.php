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
Route::get('/foodmenuEdit/{id}',[AdminController::class, 'foodmenuEdit'])->name('admin.foodmenu.edit');
Route::put('/foodmenuUpdate/{id}',[AdminController::class, 'foodmenuUpdate'])->name('admin.foodmenu.update');


Route::post('/users/delete/{id}', [AdminController::class, 'deleteuser'])->name('admin.users.delete');


//reservation
Route::post('/reservation', [AdminController::class, 'reservation'])->name('admin.reservation');
Route::get('/reservation_show', [AdminController::class, 'reservation_show'])->name('admin.reservation_show');

//checf
Route::get('/checf_show', [AdminController::class, 'checf_show'])->name('admin.checf_show');
Route::post('/checf_upload', [AdminController::class, 'checf_upload'])->name('admin.checf_upload');
Route::get('/checf_edit/{id}', [AdminController::class, 'checf_edit'])->name('admin.checf_edit');
Route::put('/checf_update/{id}', [AdminController::class, 'checf_update'])->name('admin.checf_update');
Route::post('/checf_delete/{id}', [AdminController::class, 'checf_delete'])->name('admin.checf_delete');


//cart
Route::post('/addcart/{id}', [FrontController::class, 'addcart'])->name('admin.addcart');
Route::get('/show_cart/{id}', [FrontController::class, 'show_cart'])->name('show_cart');

Route::get('/redirects', [FrontController::class,'redirects'])->name('dashboard');
Route::get('/user/home',[HomeController::class,'index'])->name('user.home');

Auth::routes();



