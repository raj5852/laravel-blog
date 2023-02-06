<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'create']);
    Route::post('/add-category',[CategoryController::class,'store']);
});

Route::get('demo',function(){
//    return User::all();
return Category::all();

});
