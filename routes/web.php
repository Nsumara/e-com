<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[BaseController::class,'index'])->name('index');
Route::get('/about', [BaseController::class, 'about_Us'])->name('about');
Route::get('/blog', [BaseController::class, 'blog'])->name('blog');
Route::get('/contect', [BaseController::class, 'contectUs'])->name('contect');
Route::get('/shop', [BaseController::class, 'shop'])->name('shop');
Route::get('/cart', [BaseController::class, 'cart'])->name('cart');
Route::get('/single-product', [BaseController::class, 'singleProduct'])->name('single-product');
Route::get('/check-out', [BaseController::class, 'checkOut'])->name('check-out');


// admin Route ---------


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => "admin" , "middleware"=>['auth','admin'],'as'=>"admin/"],function(){


    Route::get('login', [Admincontroller::class, 'login'])->name('login');
    Route::Post('create-login', [Admincontroller::class, 'create_login'])->name('create-login');
    Route::get('admin-index', [Admincontroller::class, 'admin_index'])->name('admin-index');
    Route::get('admin-table', [Admincontroller::class, 'admin_table'])->name('admin-table');
    Route::get('admin-logout', [Admincontroller::class, 'logout'])->name('admin-logout');



//------------------------categories route -----------------//
    Route::get('admin-form', [CategoriesController::class, 'create'])->name('admin-from');
    Route::post('store-category', [CategoriesController::class, 'store'])->name('store-category');
    Route::get('all-category', [CategoriesController::class, 'index'])->name('all-categories');
    Route::get('category-edit/{id}', [CategoriesController::class, 'edit'])->name('category-edit');
    Route::post('category-update/{id}', [CategoriesController::class, 'update'])->name('update-category');
    Route::get('category-destroy/{id}', [CategoriesController::class, 'destroy'])->name('category-destroy');
    
    Route::get('add-product',[ProductController::class,'index'])->name('add-product');
    Route::post('store-product', [ProductController::class, 'store'])->name('store-product');
});