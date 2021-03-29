<?php

use App\Http\Controllers\SiapBmnController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rekonsiliasi-internal
Route::get('/Import_RekonsiliasiInternal', [SiapBmnController::class, 'Import_RekonsiliasiInternal']);
Route::get('/Import_RekonsiliasiInternal/Export_RekonsiliasiInternal', [SiapBmnController::class, 'Export_RekonsiliasiInternal']);
Route::post('/Import_RekonsiliasiInternal/Import_Excel_RekonsiliasiInternal', [SiapBmnController::class, 'Import_Excel_RekonsiliasiInternal']);
Route::get('/Import_RekonsiliasiInternal/Pengosongan_RekonsiliasiInternal', [SiapBmnController::class, 'Pengosongan_RekonsiliasiInternal']);
Route::get('/Pelaksana_RekonsiliasiInternal', [SiapBmnController::class, 'Pelaksana_RekonsiliasiInternal']);
Route::get('/Pelaksana_RekonsiliasiInternal/Pengosongan_RekonsiliasiInternal_Pelaksana', [SiapBmnController::class, 'Pengosongan_RekonsiliasiInternal_Pelaksana']);
Route::post('/Pelaksana_RekonsiliasiInternal/Import_Excel_RekonsiliasiInternal_Pelaksana', [SiapBmnController::class, 'Import_Excel_RekonsiliasiInternal_Pelaksana']);
Route::get('/Pelaksana_RekonsiliasiInternal/Sync_data_rekonsiliasi_internal_tmp', [SiapBmnController::class, 'Sync_data_rekonsiliasi_internal_tmp']);
Route::get('/Kepala_bagian_RekonsiliasiInternal', [SiapBmnController::class, 'Kepala_bagian_RekonsiliasiInternal']);
Route::delete('/Kepala_bagian_RekonsiliasiInternal/Analisaok', [SiapBmnController::class, 'Analisaok']);
Route::delete('/Kepala_bagian_RekonsiliasiInternal/Analisanok', [SiapBmnController::class, 'Analisanok']);
Route::get('/Import_RekonsiliasiInternal/Export_RekonsiliasiInternal_AnalisaData', [SiapBmnController::class, 'Export_RekonsiliasiInternal_AnalisaData']);
Route::get('/LA_RekonsiliasiInternal', [SiapBmnController::class, 'LA_RekonsiliasiInternal']);
Route::get('/LA_RekonsiliasiInternal/Cetak_pdf', [SiapBmnController::class, 'Cetak_pdf']);

//Sp2d-53
Route::get('/Import_Sp2d53', [SiapBmnController::class, 'Import_Sp2d53']);
Route::get('/Import_Sp2d53/Export_Sp2d53', [SiapBmnController::class, 'Export_Sp2d53']);
Route::post('/Import_Sp2d53/Import_Excel_Sp2d53', [SiapBmnController::class, 'Import_Excel_Sp2d53']);
Route::get('/Import_Sp2d53/Pengosongan_Sp2d53', [SiapBmnController::class, 'Pengosongan_Sp2d53']);
Route::get('/Pelaksana_Sp2d53', [SiapBmnController::class, 'Pelaksana_Sp2d53']);
Route::get('/Pelaksana_Sp2d53/Pengosongan_Sp2d53_Pelaksana', [SiapBmnController::class, 'Pengosongan_Sp2d53_Pelaksana']);
Route::post('/Pelaksana_Sp2d53/Import_Excel_Sp2d53_Pelaksana', [SiapBmnController::class, 'Import_Excel_Sp2d53_Pelaksana']);
Route::get('/Pelaksana_Sp2d53/Sync_data_Sp2d53_tmp', [SiapBmnController::class, 'Sync_data_Sp2d53_tmp']);
Route::get('/Kepala_bagian_Sp2d53', [SiapBmnController::class, 'Kepala_bagian_Sp2d53']);
Route::delete('/Kepala_bagian_Sp2d53/Analisaok_Sp2d53', [SiapBmnController::class, 'Analisaok_Sp2d53']);
Route::delete('/Kepala_bagian_Sp2d53/Analisanok_Sp2d53', [SiapBmnController::class, 'Analisanok_Sp2d53']);
Route::get('/Import_Sp2d53/Export_Sp2d53_AnalisaData', [SiapBmnController::class, 'Export_Sp2d53_AnalisaData']);
Route::get('/LA_Sp2d53', [SiapBmnController::class, 'LA_Sp2d53']);


//Glbmn
Route::get('/Import_Glbmn', [SiapBmnController::class, 'Import_Glbmn']);
Route::get('/Import_Glbmn/Export_Glbmn', [SiapBmnController::class, 'Export_Glbmn']);
Route::post('/Import_Glbmn/Import_Excel_Glbmn', [SiapBmnController::class, 'Import_Excel_Glbmn']);
Route::get('/Import_Glbmn/Pengosongan_Glbmn', [SiapBmnController::class, 'Pengosongan_Glbmn']);
Route::get('/Pelaksana_Glbmn', [SiapBmnController::class, 'Pelaksana_Glbmn']);
Route::get('/Pelaksana_Glbmn/Pengosongan_Glbmn_Pelaksana', [SiapBmnController::class, 'Pengosongan_Glbmn_Pelaksana']);
Route::post('/Pelaksana_Glbmn/Import_Excel_Glbmn_Pelaksana', [SiapBmnController::class, 'Import_Excel_Glbmn_Pelaksana']);
Route::get('/Pelaksana_Glbmn/Sync_data_Glbmn_tmp', [SiapBmnController::class, 'Sync_data_Glbmn_tmp']);
Route::get('/Kepala_bagian_Glbmn', [SiapBmnController::class, 'Kepala_bagian_Glbmn']);
Route::delete('/Kepala_bagian_Glbmn/Analisaok_Glbmn', [SiapBmnController::class, 'Analisaok_Glbmn']);
Route::delete('/Kepala_bagian_Glbmn/Analisanok_Glbmn', [SiapBmnController::class, 'Analisanok_Glbmn']);
Route::get('/Import_Glbmn/Export_Glbmn_AnalisaData', [SiapBmnController::class, 'Export_Glbmn_AnalisaData']);
Route::get('/LA_Glbmn', [SiapBmnController::class, 'LA_Glbmn']);


//Tktm
Route::get('/Import_Tktm', [SiapBmnController::class, 'Import_Tktm']);
Route::get('/Import_Tktm/Export_Tktm', [SiapBmnController::class, 'Export_Tktm']);
Route::post('/Import_Tktm/Import_Excel_Tktm', [SiapBmnController::class, 'Import_Excel_Tktm']);
Route::get('/Import_Tktm/Pengosongan_Tktm', [SiapBmnController::class, 'Pengosongan_Tktm']);
Route::get('/Pelaksana_Tktm', [SiapBmnController::class, 'Pelaksana_Tktm']);
Route::get('/Pelaksana_Tktm/Pengosongan_Tktm_Pelaksana', [SiapBmnController::class, 'Pengosongan_Tktm_Pelaksana']);
Route::post('/Pelaksana_Tktm/Import_Excel_Tktm_Pelaksana', [SiapBmnController::class, 'Import_Excel_Tktm_Pelaksana']);
Route::get('/Pelaksana_Tktm/Sync_data_Tktm_tmp', [SiapBmnController::class, 'Sync_data_Tktm_tmp']);
Route::get('/Kepala_bagian_Tktm', [SiapBmnController::class, 'Kepala_bagian_Tktm']);
Route::delete('/Kepala_bagian_Tktm/Analisaok_Tktm', [SiapBmnController::class, 'Analisaok_Tktm']);
Route::delete('/Kepala_bagian_Tktm/Analisanok_Tktm', [SiapBmnController::class, 'Analisanok_Tktm']);
Route::get('/Import_Tktm/Export_Tktm_AnalisaData', [SiapBmnController::class, 'Export_Tktm_AnalisaData']);
Route::get('/LA_Tktm', [SiapBmnController::class, 'LA_Tktm']);

//Tktm_persediaan
Route::get('/Import_Tktm_persediaan', [SiapBmnController::class, 'Import_Tktm_persediaan']);
Route::get('/Import_Tktm_persediaan/Export_Tktm_persediaan', [SiapBmnController::class, 'Export_Tktm_persediaan']);
Route::post('/Import_Tktm_persediaan/Import_Excel_Tktm_persediaan', [SiapBmnController::class, 'Import_Excel_Tktm_persediaan']);
Route::get('/Import_Tktm_persediaan/Pengosongan_Tktm_persediaan', [SiapBmnController::class, 'Pengosongan_Tktm_persediaan']);
Route::get('/Pelaksana_Tktm_persediaan', [SiapBmnController::class, 'Pelaksana_Tktm_persediaan']);
Route::get('/Pelaksana_Tktm_persediaan/Pengosongan_Tktm_persediaan_Pelaksana', [SiapBmnController::class, 'Pengosongan_Tktm_persediaan_Pelaksana']);
Route::post('/Pelaksana_Tktm_persediaan/Import_Excel_Tktm_persediaan_Pelaksana', [SiapBmnController::class, 'Import_Excel_Tktm_persediaan_Pelaksana']);
Route::get('/Pelaksana_Tktm_persediaan/Sync_data_Tktm_persediaan_tmp', [SiapBmnController::class, 'Sync_data_Tktm_persediaan_tmp']);
Route::get('/Kepala_bagian_Tktm_persediaan', [SiapBmnController::class, 'Kepala_bagian_Tktm_persediaan']);
Route::delete('/Kepala_bagian_Tktm_persediaan/Analisaok_Tktm_persediaan', [SiapBmnController::class, 'Analisaok_Tktm_persediaan']);
Route::delete('/Kepala_bagian_Tktm_persediaan/Analisanok_Tktm_persediaan', [SiapBmnController::class, 'Analisanok_Tktm_persediaan']);
Route::get('/Import_Tktm_persediaan/Export_Tktm_persediaan_AnalisaData', [SiapBmnController::class, 'Export_Tktm_persediaan_AnalisaData']);
Route::get('/LA_Tktm_persediaan', [SiapBmnController::class, 'LA_Tktm_persediaan']);

//Reklasifikasi_aset
Route::get('/Import_Reklasifikasi_aset', [SiapBmnController::class, 'Import_Reklasifikasi_aset']);
Route::get('/Import_Reklasifikasi_aset/Export_Reklasifikasi_aset', [SiapBmnController::class, 'Export_Reklasifikasi_aset']);
Route::post('/Import_Reklasifikasi_aset/Import_Excel_Reklasifikasi_aset', [SiapBmnController::class, 'Import_Excel_Reklasifikasi_aset']);
Route::get('/Import_Reklasifikasi_aset/Pengosongan_Reklasifikasi_aset', [SiapBmnController::class, 'Pengosongan_Reklasifikasi_aset']);
Route::get('/Pelaksana_Reklasifikasi_aset', [SiapBmnController::class, 'Pelaksana_Reklasifikasi_aset']);
Route::get('/Pelaksana_Reklasifikasi_aset/Pengosongan_Reklasifikasi_aset_Pelaksana', [SiapBmnController::class, 'Pengosongan_Reklasifikasi_aset_Pelaksana']);
Route::post('/Pelaksana_Reklasifikasi_aset/Import_Excel_Reklasifikasi_aset_Pelaksana', [SiapBmnController::class, 'Import_Excel_Reklasifikasi_aset_Pelaksana']);
Route::get('/Pelaksana_Reklasifikasi_aset/Sync_data_Reklasifikasi_aset_tmp', [SiapBmnController::class, 'Sync_data_Reklasifikasi_aset_tmp']);
Route::get('/Kepala_bagian_Reklasifikasi_aset', [SiapBmnController::class, 'Kepala_bagian_Reklasifikasi_aset']);
Route::delete('/Kepala_bagian_Reklasifikasi_aset/Analisaok_Reklasifikasi_aset', [SiapBmnController::class, 'Analisaok_Reklasifikasi_aset']);
Route::delete('/Kepala_bagian_Reklasifikasi_aset/Analisanok_Reklasifikasi_aset', [SiapBmnController::class, 'Analisanok_Reklasifikasi_aset']);
Route::get('/Import_Reklasifikasi_aset/Export_Reklasifikasi_aset_AnalisaData', [SiapBmnController::class, 'Export_Reklasifikasi_aset_AnalisaData']);
Route::get('/LA_Reklasifikasi_aset', [SiapBmnController::class, 'LA_Reklasifikasi_aset']);

//Saldo_tidak_normal
Route::get('/Import_Saldo_tidak_normal', [SiapBmnController::class, 'Import_Saldo_tidak_normal']);
Route::get('/Import_Saldo_tidak_normal/Export_Saldo_tidak_normal', [SiapBmnController::class, 'Export_Saldo_tidak_normal']);
Route::post('/Import_Saldo_tidak_normal/Import_Excel_Saldo_tidak_normal', [SiapBmnController::class, 'Import_Excel_Saldo_tidak_normal']);
Route::get('/Import_Saldo_tidak_normal/Pengosongan_Saldo_tidak_normal', [SiapBmnController::class, 'Pengosongan_Saldo_tidak_normal']);
Route::get('/Pelaksana_Saldo_tidak_normal', [SiapBmnController::class, 'Pelaksana_Saldo_tidak_normal']);
Route::get('/Pelaksana_Saldo_tidak_normal/Pengosongan_Saldo_tidak_normal_Pelaksana', [SiapBmnController::class, 'Pengosongan_Saldo_tidak_normal_Pelaksana']);
Route::post('/Pelaksana_Saldo_tidak_normal/Import_Excel_Saldo_tidak_normal_Pelaksana', [SiapBmnController::class, 'Import_Excel_Saldo_tidak_normal_Pelaksana']);
Route::get('/Pelaksana_Saldo_tidak_normal/Sync_data_Saldo_tidak_normal_tmp', [SiapBmnController::class, 'Sync_data_Saldo_tidak_normal_tmp']);
Route::get('/Kepala_bagian_Saldo_tidak_normal', [SiapBmnController::class, 'Kepala_bagian_Saldo_tidak_normal']);
Route::delete('/Kepala_bagian_Saldo_tidak_normal/Analisaok_Saldo_tidak_normal', [SiapBmnController::class, 'Analisaok_Saldo_tidak_normal']);
Route::delete('/Kepala_bagian_Saldo_tidak_normal/Analisanok_Saldo_tidak_normal', [SiapBmnController::class, 'Analisanok_Saldo_tidak_normal']);
Route::get('/Import_Saldo_tidak_normal/Export_Saldo_tidak_normal_AnalisaData', [SiapBmnController::class, 'Export_Saldo_tidak_normal_AnalisaData']);
Route::get('/LA_Saldo_tidak_normal', [SiapBmnController::class, 'LA_Saldo_tidak_normal']);

//Aset_belum_register
Route::get('/Import_Aset_belum_register', [SiapBmnController::class, 'Import_Aset_belum_register']);
Route::get('/Import_Aset_belum_register/Export_Aset_belum_register', [SiapBmnController::class, 'Export_Aset_belum_register']);
Route::post('/Import_Aset_belum_register/Import_Excel_Aset_belum_register', [SiapBmnController::class, 'Import_Excel_Aset_belum_register']);
Route::get('/Import_Aset_belum_register/Pengosongan_Aset_belum_register', [SiapBmnController::class, 'Pengosongan_Aset_belum_register']);
Route::get('/Pelaksana_Aset_belum_register', [SiapBmnController::class, 'Pelaksana_Aset_belum_register']);
Route::get('/Pelaksana_Aset_belum_register/Pengosongan_Aset_belum_register_Pelaksana', [SiapBmnController::class, 'Pengosongan_Aset_belum_register_Pelaksana']);
Route::post('/Pelaksana_Aset_belum_register/Import_Excel_Aset_belum_register_Pelaksana', [SiapBmnController::class, 'Import_Excel_Aset_belum_register_Pelaksana']);
Route::get('/Pelaksana_Aset_belum_register/Sync_data_Aset_belum_register_tmp', [SiapBmnController::class, 'Sync_data_Aset_belum_register_tmp']);
Route::get('/Kepala_bagian_Aset_belum_register', [SiapBmnController::class, 'Kepala_bagian_Aset_belum_register']);
Route::delete('/Kepala_bagian_Aset_belum_register/Analisaok_Aset_belum_register', [SiapBmnController::class, 'Analisaok_Aset_belum_register']);
Route::delete('/Kepala_bagian_Aset_belum_register/Analisanok_Aset_belum_register', [SiapBmnController::class, 'Analisanok_Aset_belum_register']);
Route::get('/Import_Aset_belum_register/Export_Aset_belum_register_AnalisaData', [SiapBmnController::class, 'Export_Aset_belum_register_AnalisaData']);
Route::get('/LA_Aset_belum_register', [SiapBmnController::class, 'LA_Aset_belum_register']);

//Nilai_perolehan_minus
Route::get('/Import_Nilai_perolehan_minus', [SiapBmnController::class, 'Import_Nilai_perolehan_minus']);
Route::get('/Import_Nilai_perolehan_minus/Export_Nilai_perolehan_minus', [SiapBmnController::class, 'Export_Nilai_perolehan_minus']);
Route::post('/Import_Nilai_perolehan_minus/Import_Excel_Nilai_perolehan_minus', [SiapBmnController::class, 'Import_Excel_Nilai_perolehan_minus']);
Route::get('/Import_Nilai_perolehan_minus/Pengosongan_Nilai_perolehan_minus', [SiapBmnController::class, 'Pengosongan_Nilai_perolehan_minus']);
Route::get('/Pelaksana_Nilai_perolehan_minus', [SiapBmnController::class, 'Pelaksana_Nilai_perolehan_minus']);
Route::get('/Pelaksana_Nilai_perolehan_minus/Pengosongan_Nilai_perolehan_minus_Pelaksana', [SiapBmnController::class, 'Pengosongan_Nilai_perolehan_minus_Pelaksana']);
Route::post('/Pelaksana_Nilai_perolehan_minus/Import_Excel_Nilai_perolehan_minus_Pelaksana', [SiapBmnController::class, 'Import_Excel_Nilai_perolehan_minus_Pelaksana']);
Route::get('/Pelaksana_Nilai_perolehan_minus/Sync_data_Nilai_perolehan_minus_tmp', [SiapBmnController::class, 'Sync_data_Nilai_perolehan_minus_tmp']);
Route::get('/Kepala_bagian_Nilai_perolehan_minus', [SiapBmnController::class, 'Kepala_bagian_Nilai_perolehan_minus']);
Route::delete('/Kepala_bagian_Nilai_perolehan_minus/Analisaok_Nilai_perolehan_minus', [SiapBmnController::class, 'Analisaok_Nilai_perolehan_minus']);
Route::delete('/Kepala_bagian_Nilai_perolehan_minus/Analisanok_Nilai_perolehan_minus', [SiapBmnController::class, 'Analisanok_Nilai_perolehan_minus']);
Route::get('/Import_Nilai_perolehan_minus/Export_Nilai_perolehan_minus_AnalisaData', [SiapBmnController::class, 'Export_Nilai_perolehan_minus_AnalisaData']);
Route::get('/LA_Nilai_perolehan_minus', [SiapBmnController::class, 'LA_Nilai_perolehan_minus']);

//Nilai_buku_minus
Route::get('/Import_Nilai_buku_minus', [SiapBmnController::class, 'Import_Nilai_buku_minus']);
Route::get('/Import_Nilai_buku_minus/Export_Nilai_buku_minus', [SiapBmnController::class, 'Export_Nilai_buku_minus']);
Route::post('/Import_Nilai_buku_minus/Import_Excel_Nilai_buku_minus', [SiapBmnController::class, 'Import_Excel_Nilai_buku_minus']);
Route::get('/Import_Nilai_buku_minus/Pengosongan_Nilai_buku_minus', [SiapBmnController::class, 'Pengosongan_Nilai_buku_minus']);
Route::get('/Pelaksana_Nilai_buku_minus', [SiapBmnController::class, 'Pelaksana_Nilai_buku_minus']);
Route::get('/Pelaksana_Nilai_buku_minus/Pengosongan_Nilai_buku_minus_Pelaksana', [SiapBmnController::class, 'Pengosongan_Nilai_buku_minus_Pelaksana']);
Route::post('/Pelaksana_Nilai_buku_minus/Import_Excel_Nilai_buku_minus_Pelaksana', [SiapBmnController::class, 'Import_Excel_Nilai_buku_minus_Pelaksana']);
Route::get('/Pelaksana_Nilai_buku_minus/Sync_data_Nilai_buku_minus_tmp', [SiapBmnController::class, 'Sync_data_Nilai_buku_minus_tmp']);
Route::get('/Kepala_bagian_Nilai_buku_minus', [SiapBmnController::class, 'Kepala_bagian_Nilai_buku_minus']);
Route::delete('/Kepala_bagian_Nilai_buku_minus/Analisaok_Nilai_buku_minus', [SiapBmnController::class, 'Analisaok_Nilai_buku_minus']);
Route::delete('/Kepala_bagian_Nilai_buku_minus/Analisanok_Nilai_buku_minus', [SiapBmnController::class, 'Analisanok_Nilai_buku_minus']);
Route::get('/Import_Nilai_buku_minus/Export_Nilai_buku_minus_AnalisaData', [SiapBmnController::class, 'Export_Nilai_buku_minus_AnalisaData']);
Route::get('/LA_Nilai_buku_minus', [SiapBmnController::class, 'LA_Nilai_buku_minus']);

//Tanggal_buku_minus
Route::get('/Import_Tanggal_buku_minus', [SiapBmnController::class, 'Import_Tanggal_buku_minus']);
Route::get('/Import_Tanggal_buku_minus/Export_Tanggal_buku_minus', [SiapBmnController::class, 'Export_Tanggal_buku_minus']);
Route::post('/Import_Tanggal_buku_minus/Import_Excel_Tanggal_buku_minus', [SiapBmnController::class, 'Import_Excel_Tanggal_buku_minus']);
Route::get('/Import_Tanggal_buku_minus/Pengosongan_Tanggal_buku_minus', [SiapBmnController::class, 'Pengosongan_Tanggal_buku_minus']);
Route::get('/Pelaksana_Tanggal_buku_minus', [SiapBmnController::class, 'Pelaksana_Tanggal_buku_minus']);
Route::get('/Pelaksana_Tanggal_buku_minus/Pengosongan_Tanggal_buku_minus_Pelaksana', [SiapBmnController::class, 'Pengosongan_Tanggal_buku_minus_Pelaksana']);
Route::post('/Pelaksana_Tanggal_buku_minus/Import_Excel_Tanggal_buku_minus_Pelaksana', [SiapBmnController::class, 'Import_Excel_Tanggal_buku_minus_Pelaksana']);
Route::get('/Pelaksana_Tanggal_buku_minus/Sync_data_Tanggal_buku_minus_tmp', [SiapBmnController::class, 'Sync_data_Tanggal_buku_minus_tmp']);
Route::get('/Kepala_bagian_Tanggal_buku_minus', [SiapBmnController::class, 'Kepala_bagian_Tanggal_buku_minus']);
Route::delete('/Kepala_bagian_Tanggal_buku_minus/Analisaok_Tanggal_buku_minus', [SiapBmnController::class, 'Analisaok_Tanggal_buku_minus']);
Route::delete('/Kepala_bagian_Tanggal_buku_minus/Analisanok_Tanggal_buku_minus', [SiapBmnController::class, 'Analisanok_Tanggal_buku_minus']);
Route::get('/Import_Tanggal_buku_minus/Export_Tanggal_buku_minus_AnalisaData', [SiapBmnController::class, 'Export_Tanggal_buku_minus_AnalisaData']);
Route::get('/LA_Tanggal_buku_minus', [SiapBmnController::class, 'LA_Tanggal_buku_minus']);

//Pengaturan_wilayah
Route::get('/Pengaturan_wilayah', [SiapBmnController::class, 'Pengaturan_wilayah']);
Route::get('/Pengaturan_wilayah/edit/{id}', [SiapBmnController::class, 'edit']);
Route::put('/Pengaturan_wilayah/update/{id}', [SiapBmnController::class, 'update']);