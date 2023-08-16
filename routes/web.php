<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;



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

// Authentication Routes
Route::controller(AuthController::class)->group(function(){
    Route::get('/',  'index')->name('login');
    Route::get('dashboard',  'dashboard')->name('dashboard')->middleware('auth');
    Route::get('home',  'dashboard')->name('home')->middleware('auth'); 
    Route::get('login',  'index')->name('login')->middleware('guest');
    Route::post('custom-login',  'customLogin')->name('login.custom'); 
    Route::get('registration',  'registration')->name('register-user')->middleware('guest');
    Route::post('user-registration',  'userRegistration')->name('register.user'); 
    Route::get('logOut',  'logOut')->name('logOut');
});


//Posts Routes
Route::get('manage-post', [PostsController::class, 'managePost'])->name('manage-post');
Route::get('create-post', [PostsController::class, 'createPost'])->name('create-post')->middleware('auth'); 
Route::post('store-post', [PostsController::class, 'storePost'])->name('store-post')->middleware('auth');
Route::get('view-post/{post}', [PostsController::class, 'viewPost'])->name('view-post');
Route::delete('delete-post/{post}', [PostsController::class, 'deletePost'])->name('delete-post')->middleware('auth'); 




