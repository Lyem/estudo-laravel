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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/evento/{slug}', [\App\Http\Controllers\HomeController::class, 'show'])->name('event');

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function(){
	Route::resource('events', \App\Http\Controllers\Admin\EventController::class)->except(['show']);
	Route::resource('events.photos', \App\Http\Controllers\Admin\EventPhotoController::class);
});

Auth::routes();