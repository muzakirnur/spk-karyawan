<?php

use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PelamarController as AdminPelamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');
    
    // Route for Pelamar
    Route::get('pelamar/dashboard', [SubmissionController::class, 'index'])->name('dashboard-pelamar');
    
    // Route data diri pelamar
    Route::get('pelamar/data-diri', [PelamarController::class, 'index'])->name('pelamar.index');
    Route::post('pelamar/data-diri', [PelamarController::class, 'create'])->name('pelamar.create');

    Route::middleware('pelamar')->group(function (){
        Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /* Route Manajemen User */
        Route::get('admin/users', [UserController::class, 'index'])->name('users.index');

        /* Route Manajemen Pelamar */
        Route::get('admin/pelamar', [AdminPelamarController::class, 'index'])->name('admin.pelamar.index');

        /* Route Kriteria */
        Route::get('admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
        Route::get('admin/kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
        Route::post('admin/kriteria/create', [KriteriaController::class, 'save'])->name('admin.kriteria.save');
    });
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});