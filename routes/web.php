<?php

use App\Http\Controllers\Admin\Hasil\TesTeoriController as HasilTesTeoriController;
use App\Http\Controllers\Admin\Hasil\TesWawancaraController as HasilTesWawancaraController;
use App\Http\Controllers\Admin\HasilAkhirController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\PelamarController as AdminPelamarController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PerhitunganController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Admin\SubcriteriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilAkhirController as PelamarHasilAkhir;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TesTeoriController;
use App\Http\Controllers\TesWawancaraController;
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

    // Route tes teori pelamar
    Route::get('pelamar/tes-teori', [TesTeoriController::class, 'index'])->name('tes-teori.index');
    Route::post('pelamar/tes-teori', [TesTeoriController::class, 'save'])->name('tes-teori.save');
    Route::get('pelamar/tes-teori/{id}', [TesTeoriController::class, 'show'])->name('tes-teori.show');

    // Route tes wawancara pelamar
    Route::get('pelamar/tes-wawancara', [TesWawancaraController::class, 'index'])->name('tes-wawancara.index');
    Route::post('pelamar/tes-wawancara', [TesWawancaraController::class ,'save'])->name('tes-wawancara.save');
    Route::get('pelamar/tes-wawancara/{id}', [TesWawancaraController::class, 'show'])->name('tes-wawancara.show');

    /* Route Hasil Akhir untuk Pelamar */
    Route::get('pelamar/hasil-akhir', [PelamarHasilAkhir::class, 'index'])->name('pelamar.hasil-akhir.index');

    Route::middleware('pelamar')->group(function (){
        Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /* Route Manajemen User */
        Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
        Route::get('admin/users/show/{id}', [UserController::class, 'show'])->name('users.show');

        /* Route Manajemen Pelamar */
        Route::get('admin/pelamar', [AdminPelamarController::class, 'index'])->name('admin.pelamar.index');
        Route::get('admin/pelamar/show/{id}', [AdminPelamarController::class, 'show'])->name('admin.pelamar.show');
        Route::get('admin/pelamar/delete/{id}', [AdminPelamarController::class, 'destroy'])->name('admin.pelamar.delete');

        /* Route Kriteria */
        Route::get('admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria.index');
        Route::get('admin/kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
        Route::post('admin/kriteria/create', [KriteriaController::class, 'save'])->name('admin.kriteria.save');
        Route::get('admin/kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
        Route::put('admin/kriteria/edit/{id}', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
        Route::get('admin/kriteria/delete/{id}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.delete');

        /* Route Subcriteria */
        Route::get('admin/sub-kriteria',[SubcriteriaController::class, 'index'])->name('admin.sub-kriteria.index');
        Route::get('admin/sub-kriteria/create/{id}', [SubcriteriaController::class, 'create'])->name('admin.sub-kriteria.create');
        Route::post('admin/sub-kriteria/create/{id}', [SubcriteriaController::class, 'save'])->name('admin.sub-kriteria.save');
        Route::get('admin/sub-kriteria/edit/{id}', [SubcriteriaController::class, 'edit'])->name('admin.sub-kriteria.edit');
        Route::put('admin/sub-kriteria/edit/{id}',[SubcriteriaController::class, 'update'])->name('admin.sub-kriteria.update');
        Route::get('admin/sub-kriteria/delete/{id}', [SubcriteriaController::class,'destroy'])->name('admin.sub-kriteria.destroy');

        /* Route untuk Pertanyaan */
        Route::get('admin/pertanyaan', [PertanyaanController::class, 'index'])->name('admin.pertanyaan.index');
        Route::get('admin/pertanyaan/create', [PertanyaanController::class, 'create'])->name('admin.pertanyaan.create');
        Route::post('admin/pertanyaan/create', [PertanyaanController::class, 'save'])->name('admin.pertanyaan.save');
        Route::get('admin/pertanyaan/show/{id}', [PertanyaanController::class, 'show'])->name('admin.pertanyaan.show');
        Route::put('admin/pertanyaan/show/{id}', [PertanyaanController::class, 'update'])->name('admin.pertanyaan.update');
        Route::get('admin/pertanyaan/delete/{id}', [PertanyaanController::class, 'destroy'])->name('admin.pertanyaan.delete');

        /* Route untuk hasil Tes Teori */
        Route::get('admin/hasil/teori', [HasilTesTeoriController::class, 'index'])->name('admin.hasil.teori.index');
        Route::get('admin/hasil/teori/detail/{id}', [HasilTesTeoriController::class, 'show'])->name('admin.hasil.teori.show');

        /* Route untuk hasil tes wawancara */
        Route::get('admin/hasil/wawancara', [HasilTesWawancaraController::class, 'index'])->name('admin.hasil.wawancara.index');
        Route::get('admin/hasil/wawancara/detail/{id}', [HasilTesWawancaraController::class, 'show'])->name('admin.hasil.wawancara.show');

        /* Route untuk Perhitungan */
        Route::get('admin/perhitungan', [PerhitunganController::class, 'index'])->name('admin.perhitungan.index');
        Route::post('admin/perhitungan', [PerhitunganController::class, 'save'])->name('admin.perhitungan.save');

        /* Route untuk memberikan Penilaian kepada Pelamar */
        Route::get('admin/penilaian', [PenilaianController::class, 'index'])->name('admin.penilaian.index');
        Route::get('admin/penilaian/create/{id}', [PenilaianController::class, 'create'])->name('admin.penilaian.create');
        Route::post('admin/penilaian/create/{id}', [PenilaianController::class, 'save'])->name('admin.penilaian.save');

        /* Route untuk Melihat hasil dari Akhir */
        Route::get('admin/hasil-akhir', [HasilAkhirController::class, 'index'])->name('admin.hasil-akhir.index');
        Route::get('admin/hasil-akhir/export', [HasilAkhirController::class, 'export'])->name('admin.hasil-akhir.export');
    });
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});