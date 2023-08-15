<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController; 

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DataController::class, 'index'])->name('dashboard');
Route::get('/kelas/create', [DataController::class, 'create'])->name('create');
Route::post('/kelas/store', [DataController::class, 'store'])->name('store');
Route::get('/kelas/{id}/edit', [DataController::class, 'edit'])->name('edit');
Route::put('/kelas/{id}/update', [DataController::class, 'update'])->name('update');
Route::delete('/kelas/{id}/destroy', [DataController::class, 'destroy'])->name('destroy');
Route::post('/kelas/get-kelas', [DataController::class, 'getKelas'])->name('getkelas');
Route::post('/kelas/get-kelas-edit', [DataController::class, 'getKelasEdit'])->name('getkelasedit');
Route::post('import/excel', [DataController::class, 'importExcel'])->name('import.excel');
Route::get('export/excel', [DataController::class, 'exportExcel'])->name('export.excel');
Route::get('/export-pdf', [DataController::class, 'exportPdf'])->name('export.pdf');
Route::get('/chart/image', [DataController::class, 'chartImage'])->name('chart.image');
Route::post('/angkatan/get-angkatan', [DataController::class, 'getAngkatan'])->name('getangkatan');
Route::post('/angkatab/get-angkatan-edit', [DataController::class, 'getAngkatanEdit'])->name('getangkatanedit');


