<?php

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
Route::group(['middleware' => 'admin','prefix'=>'Adminpanel/amazon/propducts/','as'=>'admin.' ,\App\Http\Middleware\adminmiddleware::class], function() {
    Route::get('/add-post', function () {
        return view('Add_products');
    })->name('add.post');
    Route::get('post',[\App\Http\Controllers\PosteController::class,'index'])->name('post.index');
    Route::get('post/edit/{post}',[\App\Http\Controllers\PosteController::class,'edit'])->name('post.edit');
    Route::post('post/store',[\App\Http\Controllers\PosteController::class,'store'])->name('post.store');
    Route::put('post/update/{post}',[\App\Http\Controllers\PosteController::class,'update'])->name('post.update');
    Route::get('post/delete/{post}',[\App\Http\Controllers\PosteController::class,'destroy'])->name('destroy');
});


//Route::group(['prefix'=>'Amazon/','as'=>'amazon.'], function() {
   Route::get('/',[\App\Http\Controllers\PosteController::class,'showProductsForUsers'])->name('amazon.products');
//});
Route::get('login',function (){
    return view('login');
});
Route::post('login',[\App\Http\Controllers\LoginController::class,'login'])->name('admin.login');
Route::get('logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logout');







