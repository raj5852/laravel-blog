<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::get('/',[FrontendController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}',[CategoryController::class,'update']);
    Route::get('delete-category/{category_id}',[CategoryController::class,'destroy']);

    Route::get('posts',[PostController::class,'index']);
    Route::get('add-post',[PostController::class,'create']);
    Route::post('add-post',[PostController::class,'store']);
    Route::get('post/{post_id}/edit',[PostController::class,'edit']);
    Route::put('upate-post/{post_id}',[PostController::class,'update']);
    Route::get('post/{postId}/delete',[PostController::class,'delete']);

    Route::get('users',[UserController::class,'index']);
    Route::get('user/{user_id}/edit',[UserController::class,'edit']);
    Route::put('user/update/{user_id}',[UserController::class,'update']);
});



Route::get('demo', function () {
    //    return User::all();
    // return Category::query()->delete();
    // return Category::all();
    // return auth()->user();
    // return User::where('id','!=',auth()->user()->id)->get();
});
