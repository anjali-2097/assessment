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
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth'); 
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user')->middleware('guest');
Route::post('user-registration', [AuthController::class, 'userRegistration'])->name('register.user'); 
Route::get('logOut', [AuthController::class, 'logOut'])->name('logOut');

//Posts Routes
Route::get('manage-post', [PostsController::class, 'managePost'])->name('manage-post')->middleware('auth'); 
Route::get('create-post', [PostsController::class, 'createPost'])->name('create-post')->middleware('auth'); 
Route::post('store-post', [PostsController::class, 'storePost'])->name('store-post')->middleware('auth');
Route::get('view-post/{post}', [PostsController::class, 'viewPost'])->name('view-post')->middleware('auth'); 
Route::delete('delete-post/{post}', [PostsController::class, 'deletePost'])->name('delete-post')->middleware('auth'); 




