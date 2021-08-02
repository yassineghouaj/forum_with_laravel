<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudReplyController;
use App\Http\Controllers\StudInsertController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Auth::routes();

Route::post('/reply', [StudReplyController::class, 'reply']);
// Shows all posts
Route::get('/index', [StudInsertController::class, 'index'])->name('posts.index');
// Create a post
Route::post('/index', [StudInsertController::class, 'store']);


//delete//
Route::get('/delete/{id}', [StudInsertController::class, 'destroy']);











//? Edit post
Route::get('/edit', [PostController::class, 'edit']);
//? Show posts created by user
Route::get('/show', [StudInsertController::class, 'show'])->name('posts.show');