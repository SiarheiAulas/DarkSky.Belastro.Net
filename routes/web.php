<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LocController;
use App\Http\Controllers\OddysController;
use App\Http\Controllers\FileController;


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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/filter', [MainController::class, 'filter'])->name('filter');

Route::get('/about', function(){
	return view('about');
})->name('about');

//Route::resource('locations', LocController::class)->scoped(['location' => 'name']);
Route::resource('locations', LocController::class);

Route::resource('oddys', OddysController::class);

Route::get('/ypevusaby', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
