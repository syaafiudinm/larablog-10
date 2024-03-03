<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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


// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');


// HomeController
Route::get('/',[HomeController::class, 'homepage']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/post_details/{id}', [HomeController::class, 'post_details']);
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
Route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth');
Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
Route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del'])->middleware('auth');
Route::get('/update_post/{id}', [HomeController::class, 'update_mypost']);
Route::post('/update_mypost_data/{id}', [HomeController::class, 'update_mypost_data']);



// Admin Controller // 
Route::get('/welcome_page', [AdminController::class, 'welcome_page'])->middleware('auth');
Route::get('/post_page', [AdminController::class, 'post_page'])->middleware('auth');
Route::post('/add_post', [AdminController::class, 'add_post'])->middleware('auth');
Route::get('/show_post', [AdminController::class, 'show_post'])->middleware('auth');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware('auth');
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page'])->middleware('auth');
Route::post('/update_post/{id}', [AdminController::class, 'update_post'])->middleware('auth');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
