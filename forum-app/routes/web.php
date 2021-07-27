<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);

    //Route::resource('products', ProductController::class);

    // Route::get('insert', 'StudInsertController@insertform');
    // Route::post('create','StudInsertController@insert');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reply', [App\Http\Controllers\StudReplyController::class, 'reply']);
Route::post('/index', [App\Http\Controllers\StudInsertController::class, 'store']);
Route::get('/edit', [App\Http\Controllers\StudInsertController::class, 'store']);
Route::get('/show', [App\Http\Controllers\PostController::class, 'show']);
