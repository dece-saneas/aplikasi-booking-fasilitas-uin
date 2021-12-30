<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityUnitController;
use App\Http\Controllers\EventController;

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

require __DIR__ . '/auth.php';

Route::view('/', 'home')
    ->name('home');

Route::view('peraturan', 'pages.regulation-index')
    ->name('regulation.index');


Route::resource('fasilitas', FacilityController::class)
    ->parameters(['fasilitas' => 'fasilitas'])
    ->except(['create', 'show', 'edit']);

Route::get('jadwal-peminjaman/list', 'App\Http\Controllers\EventController@list')
    ->name('jadwal-peminjaman.list');

Route::resource('jadwal-peminjaman', EventController::class)
    ->parameters(['jadwal-peminjaman' => 'event'])
    ->only(['index', 'create', 'show']);

Route::resource('fasilitas/units', FacilityUnitController::class)
    ->middleware(['auth', 'role:Admin'])
    ->except(['index', 'show']);

Route::resource('saran', AdviceController::class)
    ->middleware('guest')
    ->only(['create', 'store']);
