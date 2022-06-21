<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $activePosts = Posts::where('status','checked')->get();
    return view('welcome',compact('activePosts'));
});


Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/create', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/dashboard', [App\Http\Controllers\HomeController::class, 'store'])->name('storePost');
Route::post('/updatePost', [App\Http\Controllers\HomeController::class, 'update'])->name('updatePost');
Route::get('/post/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('editPost');
Route::get('/post/create', [App\Http\Controllers\HomeController::class, 'create'])->name('createPost');
Route::any('/updatePostStatus', [App\Http\Controllers\HomeController::class, 'updateStatus']);



