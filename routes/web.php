<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
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
    return view('welcome');
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
});

Route::group(['middleware' => ['role:editor']], function () {
    Route::resource('/articles', ArticleController::class);
});
