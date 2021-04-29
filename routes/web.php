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

Auth::routes();

// Admin Route
Route::get('/admin', [\App\Http\Controllers\PagesController::class, 'admin'])->name('admin');

// Report Routes
Route::get('/', [\App\Http\Controllers\ReportsController::class, 'index']);
Route::resource('reports', \App\Http\Controllers\ReportsController::class, ['only' => ['create', 'edit', 'show', 'store', 'update', 'destroy']]);

// Repair Routes

//Route::resource('reports.repairs', \App\Http\Controllers\RepairsController::class);


Route::resource('repairs', \App\Http\Controllers\RepairsController::class, ['except' => ['index', 'show', 'create', 'store']]);
Route::post('/repairs', [\App\Http\Controllers\RepairsController::class, 'store']);
Route::get('/repairs/{report_id}/create', [\App\Http\Controllers\RepairsController::class, 'create']);
Route::get('/repairs/{repairs}/show', [\App\Http\Controllers\RepairsController::class, 'show'])->name('repairs.show');
Route::get('/repairs/{report_id}', [\App\Http\Controllers\RepairsController::class, 'index'])->name('repairs.index');

// Vēlāk nested
