<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Auth::routes();
Route::get('/', [FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    //comments
    Route::post('comments', [CommentController::class, 'store']);
    Route::get('comment/{id}/delete', [CommentController::class, 'commentdestroy']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'destroy']);

    Route::get('posts', [PostController::class, 'index']);
    Route::get('add-post', [PostController::class, 'create']);
    Route::post('add-post', [PostController::class, 'store']);
    Route::get('post/{post_id}/edit', [PostController::class, 'edit']);
    Route::put('upate-post/{post_id}', [PostController::class, 'update']);
    Route::get('post/{postId}/delete', [PostController::class, 'delete']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('user/{user_id}/edit', [UserController::class, 'edit']);
    Route::put('user/update/{user_id}', [UserController::class, 'update']);
    Route::get('setting', [SettingController::class, 'index']);
    Route::post('setting', [SettingController::class, 'store']);
});



Route::get('demo', function () {
    //    return User::all();
    // return Category::query()->delete();
    // return Category::all();
    // return auth()->user();
    // return User::where('id','!=',auth()->user()->id)->get();
    // return Comment::all();
    // return Setting::all();
    // return Setting::query()->delete();
    // return DB::connection()->getPdo();
    // return User::all();
    // User::create([
    //     'name'=>'admin',
    //     'email'=>'admin@gmail.com',
    //     'password'=>bcrypt('admin@gmail.com'),
    // ]);

 return   $user  = User::find(1);
    // $user->role_as = 1;
    // $user->save();

    // return "ok";
    //     $user->role_as = 1;
    //     $user->save();

    //     return "ok";
    // User::create([
    //     'name'=>'admin',
    //     'email'=>'admin@gmail.com',
    //     'password'=> bcrypt('password1234')
    // ]);
    // return "ok";

});
