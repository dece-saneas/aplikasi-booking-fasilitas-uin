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

Route::middleware(['guest'])->group(function () {
    Route::resource('saran', AdviceController::class)->except(['edit', 'update', 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('fasilitas/units', FacilityUnitController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('fasilitas', FacilityController::class)->only(['index']);
});












Route::view('/', 'home')->name('home');
Route::view('peraturan', 'pages.regulation-index')->name('regulation.index');



Route::middleware(['auth', 'role:Pengurus'])->group(function () {
    Route::resource('fasilitas', FacilityController::class)->parameters(['fasilitas' => 'fasilitas'])->except('index');
    Route::resource('fasilitas.unit', FacilityUnitController::class)->parameters(['fasilitas' => 'fasilitas'])->except('index');
});

Route::resource('fasilitas', FacilityController::class)->parameters(['fasilitas' => 'fasilitas'])->only('index');
Route::resource('fasilitas.unit', FacilityUnitController::class)->parameters(['fasilitas' => 'fasilitas'])->only('index');







Route::resource('jadwal-peminjaman', EventController::class);
