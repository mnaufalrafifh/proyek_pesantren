<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\BeritaController;
use App\Models\Feedback;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FeedbackController::class, 'index']);
    Route::get('/detail-tenaga-kerja', function () {
        return view('detail_tenaga_kerja');
    });
    
    Route::get('/detail-berita', function () {
        return view('detail_berita');
    });
    
    Route::get('/detail-kegiatan', function () {
        return view('detail_kegiatan');
    });
    
    Route::get('/jabatan', [JabatanController::class, 'jabatan']);
    
    Route::resource('/jabatan', JabatanController::class);
    
    Route::get('/kategori-kegiatan', [KategoriKegiatanController::class, 'kategori_kegiatan']);
    
    Route::resource('/kategori-kegiatan', KategoriKegiatanController::class);
    
    Route::resource('/dashboard', FeedbackController::class);
    
    // Route::post('/feedback/store', 'FeedbackController@store')->name('feedback.store');
    
    Route::get('/kegiatan', [KegiatanController::class, 'kegiatan']);
    
    Route::resource('/kegiatan', KegiatanController::class);
    
    Route::get('/tenaga-kerja', [TenagaKerja::class, 'tenaga_kerja']);
    
    Route::resource('/tenaga-kerja', TenagaKerjaController::class);
    
    Route::get('/berita', [Berita::class, 'berita']);
    
    Route::resource('/berita', BeritaController::class);
    
});


Route::post('/feedback', function(){
    $tambahData = new Feedback();
    $tambahData->nama_feedback = request('nama_feedback');
    $tambahData->email_feedback = request('email_feedback');
    $tambahData->subject_feedback = request('subject_feedback');
    $tambahData->pesan_feedback = request('pesan_feedback');
    $tambahData->save();
    return view('welcome')->withStatus('Berhasil Memberikan Feedback');;
});

require __DIR__.'/auth.php';
