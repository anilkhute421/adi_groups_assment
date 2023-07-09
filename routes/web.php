<?php

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


Route::get('/', [App\Http\Controllers\CrudController::class, 'index']);
Route::get('user/list/data', [App\Http\Controllers\CrudController::class, 'get_list'])->name('user/list/data');
Route::get('user/add', [App\Http\Controllers\CrudController::class, 'create'])->name('user/add');
Route::get('user/update/{id}', [App\Http\Controllers\CrudController::class, 'update'])->name('user/update');
Route::put('user/updates', [App\Http\Controllers\CrudController::class, 'updateUser'])->name('user/updates');
Route::post('user/submit', [App\Http\Controllers\CrudController::class, 'createUser'])->name('user/submit');
Route::get('user/delete/{id}', [App\Http\Controllers\CrudController::class, 'deleteUser'])->name('user/delete');
Route::get('user/filter', [App\Http\Controllers\CrudController::class, 'userfilter'])->name('user/filter');






