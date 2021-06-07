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
Route::get('/admin', [\App\Http\Controllers\PagesController::class, 'admin'])->name('admin')->middleware('can:admin');

// Device Route
Route::resource('/admin/categories/devices', \App\Http\Controllers\DevicesController::class, ['except' => ['show']])->middleware('can:admin');

// Issue Route
Route::resource('/admin/categories/issues', \App\Http\Controllers\IssuesController::class, ['except' => ['show']])->middleware('can:admin');

// Location Route
Route::resource('/admin/categories/locations', \App\Http\Controllers\LocationsController::class, ['except' => ['show']])->middleware('can:admin');

// Source Route
Route::resource('/admin/categories/sources', \App\Http\Controllers\SorucesController::class, ['except' => ['show']])->middleware('can:admin');

// State Route
Route::resource('/admin/categories/states', \App\Http\Controllers\StatesController::class, ['except' => ['show']])->middleware('can:admin');

// Report Routes
Route::get('/', [\App\Http\Controllers\ReportsController::class, 'index'])->name('home');
Route::resource('reports', \App\Http\Controllers\ReportsController::class, ['only' => ['create', 'store', 'update', 'destroy']])->middleware('can:report');
Route::get('/reports/{report}/edit', [\App\Http\Controllers\ReportsController::class, 'edit'])->name('reports.edit')->middleware('can:report');
Route::get('/reports/{report}', [\App\Http\Controllers\ReportsController::class, 'show'])->name('reports.show');
// Repair Routes
Route::resource('repairs', \App\Http\Controllers\RepairsController::class, ['except' => ['index', 'show', 'create', 'store']])->middleware('can:repair');
Route::post('/repairs', [\App\Http\Controllers\RepairsController::class, 'store'])->middleware('can:repair');
Route::get('/repairs/{report_id}/create', [\App\Http\Controllers\RepairsController::class, 'create'])->name('repairs.create')->middleware('can:repair');
Route::get('/repairs/{repairs}/show', [\App\Http\Controllers\RepairsController::class, 'show'])->name('repairs.show')->middleware('can:repair');
Route::get('/repairs/{report_id}', [\App\Http\Controllers\RepairsController::class, 'index'])->name('repairs.index')->middleware('can:repair');


// Admin Routes
Route::namespace('\App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::resource('/users', UsersController::class, ['except' => ['show', 'create', 'store']]);
});
