<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LocController;
use App\Http\Controllers\OddysController;
use App\Http\Controllers\UploadController;

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

Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::resource('locations', LocController::class);

Route::get('locations/create', [LocController::class, 'create'])->middleware(['auth'])->name('locations.create');

Route::get('locations/{location}/edit', [LocController::class, 'edit'])->middleware(['auth'])->name('locations.edit');

Route::resource('oddys', OddysController::class);

Route::get('oddys/create', [OddysController::class, 'create'])->middleware(['auth'])->name('oddys.create');

Route::get('oddys/{oddy}/edit', [OddysController::class, 'edit'])->middleware(['auth'])->name('oddys.edit');

Route::get('/ypevusaby', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
