<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

//Home page routes
Route::get('/',[BaseController::class,'home']);

Route::get('/home',[BaseController::class,'home'])->name('home');

Route::get('/specialOffer',[BaseController::class,'specialOffer'])->name('specialOffer');

Route::get('/delivery',[BaseController::class,'delivery'])->name('delivery');

Route::get('/contact',[BaseController::class,'contact'])->name('contact');

Route::get('/cart',[BaseController::class,'cart'])->name('cart');

Route::get('/productView',[BaseController::class,'productView'])->name('productView');

//Admin routes 
Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');

Route::post('/admin/login', [AdminController::class,'makeLogin'])->name('admin.makeLogin');




Route::group(['middleware' => 'auth'],function(){

    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    
    /**Category controller routes */
    Route::get('/category/add',[CategoryController::class,'create'])->name('category.create');

    Route::post('/category/add',[CategoryController::class,'store'])->name('category.store');


});