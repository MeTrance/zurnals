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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])/*->name('home')*/;

Route::get('/', [\App\Http\Controllers\TablesController::class, 'index']);
//Route::post('/new', [\App\Http\Controllers\TablesController::class, 'store'])->name('new');
//Route::match(['put', 'patch'],'tables/{id}', [\App\Http\Controllers\TablesController::class, 'update']);
Route::get('/{table}', [\App\Http\Controllers\TablesController::class, 'show']);
Route::resource('tables', \App\Http\Controllers\TablesController::class, ['only' => ['create', 'edit', 'store', 'update', 'destroy']]);
