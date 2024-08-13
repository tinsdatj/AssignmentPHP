<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Products.index');
})->name('home');



//product
Route::middleware([AdminMiddleware::class])->group(function(){
Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin-dashboard');
Route::get('/admin/list-products',[AdminController::class,'listAllProduct'])->name('admin-listproduct');
Route::match(['get', 'post'], '/admin/add-product',[ProductController::class,'add_product'])->name('add-product');
Route::match(['get', 'post'], '/admin/edit-product/{id}',[ProductController::class,'edit_product'])->name('edit-product');
Route::get('/admin/delete-product/{id}',[ProductController::class,'delete_product'])->name('delete-product');
//category
Route::get('/admin/list-categories',[AdminController::class,'listAllCategories'])->name('admin-listcate');
Route::match(['get', 'post'], '/admin/add-category',[CategoryController::class,'add_category'])->name('add-category');
Route::match(['get', 'post'], '/admin/edit-category/{id}',[CategoryController::class,'edit_category'])->name('edit-category');
Route::get('/admin/delete-category/{id}',[CategoryController::class,'delete_category'])->name('delete-category');
//User
Route::get('/admin/list-users',[AdminController::class,'listAllUsers'])->name('admin-listUser');
Route::match(['get', 'post'], '/admin/add-user',[UserController::class,'add_user'])->name('add-user');
Route::match(['get', 'post'], '/admin/edit-user/{id}',[UserController::class,'edit_user'])->name('edit-user');
Route::get('/admin/delete-user/{id}',[UserController::class,'delete_user'])->name('delete-user');
});
//LoginAdmin;
Route::match(['get', 'post'], '/admin/login',[LoginController::class,'login'])->name('login-admin');
Route::match(['get', 'post'],'/user/register',[LoginController::class,'register'])->name('register');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');