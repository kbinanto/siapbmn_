<?php

namespace App\Http\Controllers;

use App\Exports\RekonsiliasiInternalExport;
use App\Exports\Sp2d53Export;
use App\Exports\GlbmnExport;
use App\Exports\TktmExport;
use App\Exports\Tktm_persediaanExport;
use App\Exports\Reklasifikasi_asetExport;
use App\Exports\Saldo_tidak_normalExport;
use App\Exports\Aset_belum_registerExport;
use App\Exports\Nilai_buku_minusExport;
use App\Exports\Nilai_perolehan_minusExport;
use App\Exports\Tanggal_buku_minusExport;

use App\Exports\RekonsiliasiInternalExport_AnalisaData;
use App\Exports\Sp2d53Export_AnalisaData;
use App\Exports\GlbmnExport_AnalisaData;
use App\Exports\TktmExport_AnalisaData;
use App\Exports\Tktm_persediaanExport_AnalisaData;
use App\Exports\Reklasifikasi_asetExport_AnalisaData;
use App\Exports\Saldo_tidak_normalExport_AnalisaData;
use App\Exports\Aset_belum_registerExport_AnalisaData;
use App\Exports\Nilai_buku_minusExport_AnalisaData;
use App\Exports\Nilai_perolehan_minusExport_AnalisaData;
use App\Exports\Tanggal_buku_minusExport_AnalisaData;


use App\Imports\RekonsiliasiInternalImport;
use App\Imports\RekonsiliasiInternalImport_tmp;
use App\Imports\Sp2d53Import;
use App\Imports\Sp2d53Import_tmp;
use App\Imports\GlbmnImport;
use App\Imports\GlbmnImport_tmp;
use App\Imports\TktmImport;
use App\Imports\TktmImport_tmp;
use App\Imports\Tktm_persediaanImport;
use App\Imports\Tktm_persediaanImport_tmp;
use App\Imports\Reklasifikasi_asetImport;
use App\Imports\Reklasifikasi_asetImport_tmp;
use App\Imports\Saldo_tidak_normalImport;
use App\Imports\Saldo_tidak_normalImport_tmp;
use App\Imports\Aset_belum_registerImport;
use App\Imports\Aset_belum_registerImport_tmp;
use App\Imports\Nilai_buku_minusImport;
use App\Imports\Nilai_buku_minusImport_tmp;
use App\Imports\Nilai_perolehan_minusImport;
use App\Imports\Nilai_perolehan_minusImport_tmp;
use App\Imports\Tanggal_buku_minusImport;
use App\Imports\Tanggal_buku_minusImport_tmp;

use App\Models\RekonsiliasiInternal;
use App\Models\RekonsiliasiInternal_tmp;
use App\Models\Sp2d53;
use App\Models\Sp2d53_tmp;
use App\Models\Glbmn;
use App\Models\Glbmn_tmp;
use App\Models\Tktm;
use App\Models\Tktm_tmp;
use App\Models\Tktm_persediaan;
use App\Models\Tktm_persediaan_tmp;
use App\Models\Reklasifikasi_aset;
use App\Models\Reklasifikasi_aset_tmp;
use App\Models\Saldo_tidak_normal;
use App\Models\Saldo_tidak_normal_tmp;
use App\Models\Aset_belum_register;
use App\Models\Aset_belum_register_tmp;
use App\Models\Nilai_buku_minus;
use App\Models\Nilai_buku_minus_tmp;
use App\Models\Nilai_perolehan_minus;
use App\Models\Nilai_perolehan_minus_tmp;
use App\Models\Tanggal_buku_minus;
use App\Models\Tanggal_buku_minus_tmp;
use App\Models\Referensi_wilayah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use PDF;


class SiapBmnController extends Controller
{
    public function Import_RekonsiliasiInternal()
    {
        $RekonsiliasiInternal = RekonsiliasiInternal::all();
        return view('menu_importdata.rekonsiliasiinternal', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
    }

    public function Pelaksana_RekonsiliasiInternal()
    {
        $RekonsiliasiInternal = DB::table('rekonsiliasi_internal')
            ->join('referensi_wilayah', 'rekonsiliasi_internal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'rekonsiliasi_internal.kode_satker',
                'rekonsiliasi_internal.nama_satker',
                'rekonsiliasi_internal.akun',
                'rekonsiliasi_internal.uraian',
                'rekonsiliasi_internal.rph_saiba',
                'rekonsiliasi_internal.rph_simak',
                'rekonsiliasi_internal.rph_selisih',
                'rekonsiliasi_internal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('rekonsiliasi_internal.penjelasan')
            ->get();

        return view('menu_pelaksana.rekonsiliasiinternal_pelaksana', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
    }

    public function Sync_data_rekonsiliasi_internal_tmp()
    {
        $RekonsiliasiInternal = RekonsiliasiInternal::all();


        return view('menu_pelaksana.rekonsiliasiinternal_pelaksana', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
    }

    public function Export_RekonsiliasiInternal()
    {
        return Excel::download(new RekonsiliasiInternalExport, 'RekonsiliasiInternalExport.xlsx');
    }

    public function Export_RekonsiliasiInternal_AnalisaData()
    {
        return Excel::download(new RekonsiliasiInternalExport_AnalisaData, 'RekonsiliasiInternalExport_AnalisaData.xlsx');
    }

    public function Import_Excel_RekonsiliasiInternal(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_rekoninternal', $nama_file);

        // import data
        Excel::import(new RekonsiliasiInternalImport, public_path('/imp_rekoninternal/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');

        // alihkan halaman kembali
        return redirect('/Import_RekonsiliasiInternal');
    }



    public function Pengosongan_RekonsiliasiInternal()
    {
        RekonsiliasiInternal::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_RekonsiliasiInternal_Pelaksana()
    {
        RekonsiliasiInternal_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_RekonsiliasiInternal_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_rekoninternal', $nama_file);

        // import data
        Excel::import(new RekonsiliasiInternalImport_tmp, public_path('/imp_rekoninternal/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_RekonsiliasiInternal');
    }

    public function Kepala_bagian_RekonsiliasiInternal()
    {
        $RekonsiliasiInternal = DB::table('rekonsiliasi_internal')
            ->join('referensi_wilayah', 'rekonsiliasi_internal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'rekonsiliasi_internal.id',
                'rekonsiliasi_internal.kode_satker',
                'rekonsiliasi_internal.nama_satker',
                'rekonsiliasi_internal.akun',
                'rekonsiliasi_internal.uraian',
                'rekonsiliasi_internal.rph_saiba',
                'rekonsiliasi_internal.rph_simak',
                'rekonsiliasi_internal.rph_selisih',
                'rekonsiliasi_internal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('rekonsiliasi_internal.penjelasan')
            ->where('rekonsiliasi_internal.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.rekonsiliasiinternal_kepala_bagian', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
    }

    public function LA_RekonsiliasiInternal()
    {
        $RekonsiliasiInternal = DB::table('rekonsiliasi_internal')
            ->join('referensi_wilayah', 'rekonsiliasi_internal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'rekonsiliasi_internal.id',
                'rekonsiliasi_internal.kode_satker',
                'rekonsiliasi_internal.nama_satker',
                'rekonsiliasi_internal.akun',
                'rekonsiliasi_internal.uraian',
                'rekonsiliasi_internal.rph_saiba',
                'rekonsiliasi_internal.rph_simak',
                'rekonsiliasi_internal.rph_selisih',
                'rekonsiliasi_internal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('rekonsiliasi_internal.penjelasan')
            ->where('rekonsiliasi_internal.checklist', '=', '1')
            ->get();

        return view('menu_la.rekonsiliasiinternal_la', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
    }

    public function Analisaok(Request $request)
    {
        $ids = $request->ids;
        DB::table("rekonsiliasi_internal")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok(Request $request)
    {
        $ids = $request->ids;
        DB::table("rekonsiliasi_internal")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Cetak_pdf()
    {
        $RekonsiliasiInternal = DB::table('rekonsiliasi_internal')
            ->join('referensi_wilayah', 'rekonsiliasi_internal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'rekonsiliasi_internal.id',
                'rekonsiliasi_internal.kode_satker',
                'rekonsiliasi_internal.nama_satker',
                'rekonsiliasi_internal.akun',
                'rekonsiliasi_internal.uraian',
                'rekonsiliasi_internal.rph_saiba',
                'rekonsiliasi_internal.rph_simak',
                'rekonsiliasi_internal.rph_selisih',
                'rekonsiliasi_internal.penjelasan',
                'rekonsiliasi_internal.created_at',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('rekonsiliasi_internal.penjelasan')
            ->where('rekonsiliasi_internal.checklist', '=', '1')
            ->get();
        $pdf = PDF::loadview('menu_pdf.rekonsiliasiinternal_pdf', ['RekonsiliasiInternal' => $RekonsiliasiInternal]);
        return $pdf->download('laporan-rekonsiliasiinternal.pdf');
    }



    public function Import_Sp2d53()
    {
        $Sp2d53 = Sp2d53::all();
        return view('menu_importdata.sp2d53', ['Sp2d53' => $Sp2d53]);
    }

    public function Pelaksana_Sp2d53()
    {
        $Sp2d53 = DB::table('Sp2d53')
            ->join('referensi_wilayah', 'Sp2d53.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Sp2d53.kode_satker',
                'Sp2d53.nama_satker',
                'Sp2d53.akun',
                'Sp2d53.no_dokumen',
                'Sp2d53.tgl_dokumen',
                'Sp2d53.rph_saiba',
                'Sp2d53.rph_simak',
                'Sp2d53.rph_selisih',
                'Sp2d53.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Sp2d53.penjelasan')
            ->get();

        return view('menu_pelaksana.Sp2d53_pelaksana', ['Sp2d53' => $Sp2d53]);
    }

    public function Sync_data_Sp2d53_tmp()
    {
        $Sp2d53 = Sp2d53::all();
        return view('menu_pelaksana.Sp2d53_pelaksana', ['Sp2d53' => $Sp2d53]);
    }

    public function Export_Sp2d53()
    {
        return Excel::download(new Sp2d53Export, 'Sp2d53Export.xlsx');
    }

    public function Export_Sp2d53_AnalisaData()
    {
        return Excel::download(new Sp2d53Export_AnalisaData, 'Sp2d53Export_AnalisaData.xlsx');
    }

    public function Import_Excel_Sp2d53(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_sp2d53', $nama_file);

        // import data
        Excel::import(new Sp2d53Import, public_path('/imp_sp2d53/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Sp2d53');
    }

    public function Pengosongan_Sp2d53()
    {
        Sp2d53::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Sp2d53_Pelaksana()
    {
        Sp2d53_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Sp2d53_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_sp2d53', $nama_file);

        // import data
        Excel::import(new Sp2d53Import_tmp, public_path('/imp_sp2d53/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Sp2d53');
    }

    public function Kepala_bagian_Sp2d53()
    {
        $Sp2d53 = DB::table('Sp2d53')
            ->join('referensi_wilayah', 'Sp2d53.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Sp2d53.id',
                'Sp2d53.kode_satker',
                'Sp2d53.nama_satker',
                'Sp2d53.akun',
                'Sp2d53.no_dokumen',
                'Sp2d53.tgl_dokumen',
                'Sp2d53.rph_saiba',
                'Sp2d53.rph_simak',
                'Sp2d53.rph_selisih',
                'Sp2d53.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Sp2d53.penjelasan')
            ->where('Sp2d53.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.sp2d53_kepala_bagian', ['Sp2d53' => $Sp2d53]);
    }

    public function LA_Sp2d53()
    {
        $Sp2d53 = DB::table('Sp2d53')
            ->join('referensi_wilayah', 'Sp2d53.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Sp2d53.id',
                'Sp2d53.kode_satker',
                'Sp2d53.nama_satker',
                'Sp2d53.akun',
                'Sp2d53.no_dokumen',
                'Sp2d53.tgl_dokumen',
                'Sp2d53.rph_saiba',
                'Sp2d53.rph_simak',
                'Sp2d53.rph_selisih',
                'Sp2d53.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Sp2d53.penjelasan')
            ->where('Sp2d53.checklist', '=', NULL)
            ->get();

        return view('menu_la.sp2d53_la', ['Sp2d53' => $Sp2d53]);
    }

    public function Analisaok_Sp2d53(Request $request)
    {
        $ids = $request->ids;
        DB::table("sp2d53")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_sp2d53(Request $request)
    {
        $ids = $request->ids;
        DB::table("sp2d53")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Glbmn()
    {
        $Glbmn = Glbmn::all();
        return view('menu_importdata.Glbmn', ['Glbmn' => $Glbmn]);
    }

    public function Pelaksana_Glbmn()
    {
        $Glbmn = DB::table('Glbmn')
            ->join('referensi_wilayah', 'Glbmn.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Glbmn.kode_satker',
                'Glbmn.nama_satker',
                'Glbmn.akun',
                'Glbmn.uraian',
                'Glbmn.rph_saiba',
                'Glbmn.rph_intra',
                'Glbmn.rph_kdp',
                'Glbmn.rph_ekstra',
                'Glbmn.rph_selisih',
                'Glbmn.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Glbmn.penjelasan')
            ->get();

        return view('menu_pelaksana.Glbmn_pelaksana', ['Glbmn' => $Glbmn]);
    }



    public function Sync_data_Glbmn_tmp()
    {
        $Glbmn = Glbmn::all();
        return view('menu_pelaksana.Glbmn_pelaksana', ['Glbmn' => $Glbmn]);
    }

    public function Export_Glbmn()
    {
        return Excel::download(new GlbmnExport, 'GlbmnExport.xlsx');
    }

    public function Export_Glbmn_AnalisaData()
    {
        return Excel::download(new GlbmnExport_AnalisaData, 'GlbmnExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Glbmn(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_glbmn', $nama_file);

        // import data
        Excel::import(new GlbmnImport, public_path('/imp_glbmn/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Glbmn');
    }

    public function Pengosongan_Glbmn()
    {
        Glbmn::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Glbmn_Pelaksana()
    {
        Glbmn_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Glbmn_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_glbmn', $nama_file);

        // import data
        Excel::import(new GlbmnImport_tmp, public_path('/imp_glbmn/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Glbmn');
    }

    public function Kepala_bagian_glbmn()
    {
        $Glbmn = DB::table('Glbmn')
            ->join('referensi_wilayah', 'Glbmn.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(

                'Glbmn.id',
                'Glbmn.kode_satker',
                'Glbmn.nama_satker',
                'Glbmn.akun',
                'Glbmn.uraian',
                'Glbmn.rph_saiba',
                'Glbmn.rph_intra',
                'Glbmn.rph_kdp',
                'Glbmn.rph_ekstra',
                'Glbmn.rph_selisih',
                'Glbmn.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Glbmn.penjelasan')
            ->where('Glbmn.checklist', '=', NULL)
            ->get();
        return view('menu_kepala_bagian.glbmn_kepala_bagian', ['Glbmn' => $Glbmn]);
    }

    public function LA_glbmn()
    {
        $Glbmn = DB::table('Glbmn')
            ->join('referensi_wilayah', 'Glbmn.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(

                'Glbmn.id',
                'Glbmn.kode_satker',
                'Glbmn.nama_satker',
                'Glbmn.akun',
                'Glbmn.uraian',
                'Glbmn.rph_saiba',
                'Glbmn.rph_intra',
                'Glbmn.rph_kdp',
                'Glbmn.rph_ekstra',
                'Glbmn.rph_selisih',
                'Glbmn.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Glbmn.penjelasan')
            ->where('Glbmn.checklist', '=', NULL)
            ->get();
        return view('menu_la.glbmn_la', ['Glbmn' => $Glbmn]);
    }

    public function Analisaok_Glbmn(Request $request)
    {
        $ids = $request->ids;
        DB::table("glbmn")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_glbmn(Request $request)
    {
        $ids = $request->ids;
        DB::table("glbmn")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }


    public function Import_Tktm()
    {
        $Tktm = Tktm::all();
        return view('menu_importdata.Tktm', ['Tktm' => $Tktm]);
    }

    public function Pelaksana_Tktm()
    {
        $Tktm = DB::table('Tktm')
            ->join('referensi_wilayah', function ($join) {
                $join->on('tktm.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('tktm.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm.kode_satker_pengirim',
                'Tktm.nama_satker_pengirim',
                'Tktm.kode_akun_pengirim',
                'Tktm.uraian_akun_pengirim',
                'Tktm.transfer_keluar',
                'Tktm.kode_satker_penerima',
                'Tktm.nama_satker_penerima',
                'Tktm.transfer_masuk',
                'Tktm.selisih',
                'Tktm.penjelasan'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Tktm.penjelasan')
            ->distinct('Tktm.id')
            ->get();

        return view('menu_pelaksana.Tktm_pelaksana', ['Tktm' => $Tktm]);
    }

    public function Sync_data_Tktm_tmp()
    {
        $Tktm = Tktm::all();
        return view('menu_pelaksana.Tktm_pelaksana', ['Tktm' => $Tktm]);
    }

    public function Export_Tktm()
    {
        return Excel::download(new TktmExport, 'TktmExport.xlsx');
    }

    public function Export_Tktm_AnalisaData()
    {
        return Excel::download(new TktmExport_AnalisaData, 'TktmExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Tktm(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tktm', $nama_file);

        // import data
        Excel::import(new TktmImport, public_path('/imp_tktm/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Tktm');
    }

    public function Pengosongan_Tktm()
    {
        Tktm::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Tktm_Pelaksana()
    {
        Tktm_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Tktm_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tktm', $nama_file);

        // import data
        Excel::import(new TktmImport_tmp, public_path('/imp_tktm/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Tktm');
    }

    public function Kepala_bagian_Tktm()
    {
        $Tktm = DB::table('Tktm')
            ->join('referensi_wilayah', function ($join) {
                $join->on('tktm.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('tktm.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm.id',
                'Tktm.kode_satker_pengirim',
                'Tktm.nama_satker_pengirim',
                'Tktm.kode_akun_pengirim',
                'Tktm.uraian_akun_pengirim',
                'Tktm.transfer_keluar',
                'Tktm.kode_satker_penerima',
                'Tktm.nama_satker_penerima',
                'Tktm.transfer_masuk',
                'Tktm.selisih',
                'Tktm.penjelasan'
            )
            ->whereNotNull('Tktm.penjelasan')
            ->where('Tktm.checklist', '=', NULL)
            ->distinct('Tktm.id')
            ->get();

        return view('menu_kepala_bagian.Tktm_kepala_bagian', ['Tktm' => $Tktm]);
    }


    public function LA_Tktm()
    {
        $Tktm = DB::table('Tktm')
            ->join('referensi_wilayah', function ($join) {
                $join->on('tktm.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('tktm.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm.id',
                'Tktm.kode_satker_pengirim',
                'Tktm.nama_satker_pengirim',
                'Tktm.kode_akun_pengirim',
                'Tktm.uraian_akun_pengirim',
                'Tktm.transfer_keluar',
                'Tktm.kode_satker_penerima',
                'Tktm.nama_satker_penerima',
                'Tktm.transfer_masuk',
                'Tktm.selisih',
                'Tktm.penjelasan'
            )
            ->whereNotNull('Tktm.penjelasan')
            ->where('Tktm.checklist', '=', NULL)
            ->distinct('Tktm.id')
            ->get();

        return view('menu_la.Tktm_la', ['Tktm' => $Tktm]);
    }

    public function Analisaok_Tktm(Request $request)
    {
        $ids = $request->ids;
        DB::table("tktm")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Tktm(Request $request)
    {
        $ids = $request->ids;
        DB::table("tktm")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Tktm_persediaan()
    {
        $Tktm_persediaan = Tktm_persediaan::all();
        return view('menu_importdata.Tktm_persediaan', ['Tktm_persediaan' => $Tktm_persediaan]);
    }

    public function Pelaksana_Tktm_persediaan()
    {
        $Tktm = DB::table('Tktm_persediaan')
            ->join('referensi_wilayah', function ($join) {
                $join->on('Tktm_persediaan.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('Tktm_persediaan.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm_persediaan.kode_satker_pengirim',
                'Tktm_persediaan.nama_satker_pengirim',
                'Tktm_persediaan.kode_barang_pengirim',
                'Tktm_persediaan.uraian_barang_pengirim',
                'Tktm_persediaan.kuantitas_pengirim',
                'Tktm_persediaan.rp_transferkeluar',
                'Tktm_persediaan.kode_satker_penerima',
                'Tktm_persediaan.nama_satker_penerima',
                'Tktm_persediaan.kuantitas_penerima',
                'Tktm_persediaan.rp_transfermasuk',
                'Tktm_persediaan.selisih_kuantitas',
                'Tktm_persediaan.selisih_rp',
                'Tktm_persediaan.penjelasan',

            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Tktm_persediaan.penjelasan')
            ->distinct('Tktm_persediaan.id')
            ->get();

        return view('menu_pelaksana.Tktm_persediaan_la', ['Tktm_persediaan' => $Tktm]);
    }



    public function Sync_data_Tktm_persediaan_tmp()
    {
        $Tktm_persediaan = Tktm_persediaan::all();
        return view('menu_pelaksana.Tktm_persediaan_pelaksana', ['Tktm_persediaan' => $Tktm_persediaan]);
    }

    public function Export_Tktm_persediaan()
    {
        return Excel::download(new Tktm_persediaanExport, 'Tktm_persediaanExport.xlsx');
    }

    public function Export_Tktm_persediaan_AnalisaData()
    {
        return Excel::download(new Tktm_persediaanExport_AnalisaData, 'Tktm_persediaanExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Tktm_persediaan(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tktm_persediaan', $nama_file);

        // import data
        Excel::import(new Tktm_persediaanImport, public_path('/imp_tktm_persediaan/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Tktm_persediaan');
    }

    public function Pengosongan_Tktm_persediaan()
    {
        Tktm_persediaan::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Tktm_persediaan_Pelaksana()
    {
        Tktm_persediaan_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Tktm_persediaan_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tktm_persediaan', $nama_file);

        // import data
        Excel::import(new Tktm_persediaanImport_tmp, public_path('/imp_tktm_persediaan/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Tktm_persediaan');
    }

    public function Kepala_bagian_Tktm_persediaan()
    {
        $Tktm = DB::table('Tktm_persediaan')
            ->join('referensi_wilayah', function ($join) {
                $join->on('Tktm_persediaan.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('Tktm_persediaan.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm_persediaan.id',
                'Tktm_persediaan.kode_satker_pengirim',
                'Tktm_persediaan.nama_satker_pengirim',
                'Tktm_persediaan.kode_barang_pengirim',
                'Tktm_persediaan.uraian_barang_pengirim',
                'Tktm_persediaan.kuantitas_pengirim',
                'Tktm_persediaan.rp_transferkeluar',
                'Tktm_persediaan.kode_satker_penerima',
                'Tktm_persediaan.nama_satker_penerima',
                'Tktm_persediaan.kuantitas_penerima',
                'Tktm_persediaan.rp_transfermasuk',
                'Tktm_persediaan.selisih_kuantitas',
                'Tktm_persediaan.selisih_rp',
                'Tktm_persediaan.penjelasan',

            )
            ->whereNotNull('Tktm_persediaan.penjelasan')
            ->where('Tktm_persediaan.checklist', '=', NULL)
            ->distinct('Tktm_persediaan.id')
            ->get();

        return view('menu_kepala_bagian.Tktm_persediaan_kepala_bagian', ['Tktm_persediaan' => $Tktm]);
    }

    public function LA_Tktm_persediaan()
    {
        $Tktm = DB::table('Tktm_persediaan')
            ->join('referensi_wilayah', function ($join) {
                $join->on('Tktm_persediaan.6digit_kodesatkerpengirim', '=', 'referensi_wilayah.kode_satker')
                    ->orOn('Tktm_persediaan.6digit_kodesatkerpenerima', '=', 'referensi_wilayah.kode_satker');
            })
            ->select(
                'Tktm_persediaan.id',
                'Tktm_persediaan.kode_satker_pengirim',
                'Tktm_persediaan.nama_satker_pengirim',
                'Tktm_persediaan.kode_barang_pengirim',
                'Tktm_persediaan.uraian_barang_pengirim',
                'Tktm_persediaan.kuantitas_pengirim',
                'Tktm_persediaan.rp_transferkeluar',
                'Tktm_persediaan.kode_satker_penerima',
                'Tktm_persediaan.nama_satker_penerima',
                'Tktm_persediaan.kuantitas_penerima',
                'Tktm_persediaan.rp_transfermasuk',
                'Tktm_persediaan.selisih_kuantitas',
                'Tktm_persediaan.selisih_rp',
                'Tktm_persediaan.penjelasan',

            )
            ->whereNotNull('Tktm_persediaan.penjelasan')
            ->where('Tktm_persediaan.checklist', '=', NULL)
            ->distinct('Tktm_persediaan.id')
            ->get();

        return view('menu_la.Tktm_persediaan_la', ['Tktm_persediaan' => $Tktm]);
    }

    public function Analisaok_Tktm_persediaan(Request $request)
    {
        $ids = $request->ids;
        DB::table("tktm_persediaan")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Tktm_persediaan(Request $request)
    {
        $ids = $request->ids;
        DB::table("tktm_persediaan")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Reklasifikasi_aset()
    {
        $Reklasifikasi_aset = Reklasifikasi_aset::all();
        return view('menu_importdata.Reklasifikasi_aset', ['Reklasifikasi_aset' => $Reklasifikasi_aset]);
    }

    public function Pelaksana_Reklasifikasi_aset()
    {
        $Reklasifikasi_aset = DB::table('Reklasifikasi_aset')
            ->join('referensi_wilayah', 'Reklasifikasi_aset.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Reklasifikasi_aset.kode_satker',
                'Reklasifikasi_aset.nama_satker',
                'Reklasifikasi_aset.reklas_keluar',
                'Reklasifikasi_aset.reklas_masuk',
                'Reklasifikasi_aset.selisih',
                'Reklasifikasi_aset.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Reklasifikasi_aset.penjelasan')
            ->get();

        return view('menu_pelaksana.Reklasifikasi_aset_pelaksana', ['Reklasifikasi_aset' => $Reklasifikasi_aset]);
    }


    public function Sync_data_Reklasifikasi_aset_tmp()
    {
        $Reklasifikasi_aset = Reklasifikasi_aset::all();
        return view('menu_pelaksana.Reklasifikasi_aset_pelaksana', ['Reklasifikasi_aset' => $Reklasifikasi_aset]);
    }

    public function Export_Reklasifikasi_aset()
    {
        return Excel::download(new Reklasifikasi_asetExport, 'Reklasifikasi_asetExport.xlsx');
    }

    public function Export_Reklasifikasi_aset_AnalisaData()
    {
        return Excel::download(new Reklasifikasi_asetExport_AnalisaData, 'Reklasifikasi_asetExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Reklasifikasi_aset(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_reklasifikasi_aset', $nama_file);

        // import data
        Excel::import(new Reklasifikasi_asetImport, public_path('/imp_reklasifikasi_aset/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Reklasifikasi_aset');
    }

    public function Pengosongan_Reklasifikasi_aset()
    {
        Reklasifikasi_aset::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Reklasifikasi_aset_Pelaksana()
    {
        Reklasifikasi_aset_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Reklasifikasi_aset_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_reklasifikasi_aset', $nama_file);

        // import data
        Excel::import(new Reklasifikasi_asetImport_tmp, public_path('/imp_reklasifikasi_aset/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Reklasifikasi_aset');
    }

    public function Kepala_bagian_Reklasifikasi_aset()
    {
        $Reklasifikasi_aset = DB::table('Reklasifikasi_aset')
            ->join('referensi_wilayah', 'Reklasifikasi_aset.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Reklasifikasi_aset.id',
                'Reklasifikasi_aset.kode_satker',
                'Reklasifikasi_aset.nama_satker',
                'Reklasifikasi_aset.reklas_keluar',
                'Reklasifikasi_aset.reklas_masuk',
                'Reklasifikasi_aset.selisih',
                'Reklasifikasi_aset.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Reklasifikasi_aset.penjelasan')
            ->where('Reklasifikasi_aset.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Reklasifikasi_aset_kepala_bagian', ['Reklasifikasi_aset' => $Reklasifikasi_aset]);
    }

    public function LA_Reklasifikasi_aset()
    {
        $Reklasifikasi_aset = DB::table('Reklasifikasi_aset')
            ->join('referensi_wilayah', 'Reklasifikasi_aset.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Reklasifikasi_aset.id',
                'Reklasifikasi_aset.kode_satker',
                'Reklasifikasi_aset.nama_satker',
                'Reklasifikasi_aset.reklas_keluar',
                'Reklasifikasi_aset.reklas_masuk',
                'Reklasifikasi_aset.selisih',
                'Reklasifikasi_aset.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Reklasifikasi_aset.penjelasan')
            ->where('Reklasifikasi_aset.checklist', '=', NULL)
            ->get();

        return view('menu_la.Reklasifikasi_aset_la', ['Reklasifikasi_aset' => $Reklasifikasi_aset]);
    }

    public function Analisaok_Reklasifikasi_aset(Request $request)
    {
        $ids = $request->ids;
        DB::table("reklasifikasi_aset")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Reklasifikasi_aset(Request $request)
    {
        $ids = $request->ids;
        DB::table("reklasifikasi_aset")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }



    public function Import_Saldo_tidak_normal()
    {
        $Saldo_tidak_normal = Saldo_tidak_normal::all();
        return view('menu_importdata.Saldo_tidak_normal', ['Saldo_tidak_normal' => $Saldo_tidak_normal]);
    }

    public function Pelaksana_Saldo_tidak_normal()
    {
        $Saldo_tidak_normal = DB::table('Saldo_tidak_normal')
            ->join('referensi_wilayah', 'Saldo_tidak_normal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Saldo_tidak_normal.kode_satker',
                'Saldo_tidak_normal.nama_satker',
                'Saldo_tidak_normal.trn',
                'Saldo_tidak_normal.akun',
                'Saldo_tidak_normal.uraian_akun',
                'Saldo_tidak_normal.debet',
                'Saldo_tidak_normal.kredit',
                'Saldo_tidak_normal.saldo_normal',
                'Saldo_tidak_normal.keterangan',
                'Saldo_tidak_normal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Saldo_tidak_normal.penjelasan')
            ->get();

        return view('menu_pelaksana.Saldo_tidak_normal_pelaksana', ['Saldo_tidak_normal' => $Saldo_tidak_normal]);
    }



    public function Sync_data_Saldo_tidak_normal_tmp()
    {
        $Saldo_tidak_normal = Saldo_tidak_normal::all();
        return view('menu_pelaksana.Saldo_tidak_normal_pelaksana', ['Saldo_tidak_normal' => $Saldo_tidak_normal]);
    }

    public function Export_Saldo_tidak_normal()
    {
        return Excel::download(new Saldo_tidak_normalExport, 'Saldo_tidak_normalExport.xlsx');
    }

    public function Export_Saldo_tidak_normal_AnalisaData()
    {
        return Excel::download(new Saldo_tidak_normalExport_AnalisaData, 'Saldo_tidak_normalExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Saldo_tidak_normal(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_saldo_tidak_normal', $nama_file);

        // import data
        Excel::import(new Saldo_tidak_normalImport, public_path('/imp_saldo_tidak_normal/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Saldo_tidak_normal');
    }

    public function Pengosongan_Saldo_tidak_normal()
    {
        Saldo_tidak_normal::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Saldo_tidak_normal_Pelaksana()
    {
        Saldo_tidak_normal_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Saldo_tidak_normal_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_saldo_tidak_normal', $nama_file);

        // import data
        Excel::import(new Saldo_tidak_normalImport_tmp, public_path('/imp_saldo_tidak_normal/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Saldo_tidak_normal');
    }

    public function Kepala_bagian_Saldo_tidak_normal()
    {
        $Saldo_tidak_normal = DB::table('Saldo_tidak_normal')
            ->join('referensi_wilayah', 'Saldo_tidak_normal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Saldo_tidak_normal.id',
                'Saldo_tidak_normal.kode_satker',
                'Saldo_tidak_normal.nama_satker',
                'Saldo_tidak_normal.trn',
                'Saldo_tidak_normal.akun',
                'Saldo_tidak_normal.uraian_akun',
                'Saldo_tidak_normal.debet',
                'Saldo_tidak_normal.kredit',
                'Saldo_tidak_normal.saldo_normal',
                'Saldo_tidak_normal.keterangan',
                'Saldo_tidak_normal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Saldo_tidak_normal.penjelasan')
            ->where('Saldo_tidak_normal.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Saldo_tidak_normal_kepala_bagian', ['Saldo_tidak_normal' => $Saldo_tidak_normal]);
    }


    public function LA_Saldo_tidak_normal()
    {
        $Saldo_tidak_normal = DB::table('Saldo_tidak_normal')
            ->join('referensi_wilayah', 'Saldo_tidak_normal.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Saldo_tidak_normal.id',
                'Saldo_tidak_normal.kode_satker',
                'Saldo_tidak_normal.nama_satker',
                'Saldo_tidak_normal.trn',
                'Saldo_tidak_normal.akun',
                'Saldo_tidak_normal.uraian_akun',
                'Saldo_tidak_normal.debet',
                'Saldo_tidak_normal.kredit',
                'Saldo_tidak_normal.saldo_normal',
                'Saldo_tidak_normal.keterangan',
                'Saldo_tidak_normal.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Saldo_tidak_normal.penjelasan')
            ->where('Saldo_tidak_normal.checklist', '=', NULL)
            ->get();

        return view('menu_la.Saldo_tidak_normal_la', ['Saldo_tidak_normal' => $Saldo_tidak_normal]);
    }


    public function Analisaok_Saldo_tidak_normal(Request $request)
    {
        $ids = $request->ids;
        DB::table("saldo_tidak_normal")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Saldo_tidak_normal(Request $request)
    {
        $ids = $request->ids;
        DB::table("saldo_tidak_normal")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Aset_belum_register()
    {
        $Aset_belum_register = Aset_belum_register::all();
        return view('menu_importdata.Aset_belum_register', ['Aset_belum_register' => $Aset_belum_register]);
    }

    public function Pelaksana_Aset_belum_register()
    {
        $Aset_belum_register = DB::table('Aset_belum_register')
            ->join('referensi_wilayah', 'Aset_belum_register.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Aset_belum_register.kode_satker',
                'Aset_belum_register.nama_satker',
                'Aset_belum_register.akun',
                'Aset_belum_register.nama_akun',
                'Aset_belum_register.rupiah',
                'Aset_belum_register.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Aset_belum_register.penjelasan')
            ->get();

        return view('menu_pelaksana.Aset_belum_register_pelaksana', ['Aset_belum_register' => $Aset_belum_register]);
    }


    public function Sync_data_Aset_belum_register_tmp()
    {
        $Aset_belum_register = Aset_belum_register::all();
        return view('menu_pelaksana.Aset_belum_register_pelaksana', ['Aset_belum_register' => $Aset_belum_register]);
    }


    public function Export_Aset_belum_register()
    {
        return Excel::download(new Aset_belum_registerExport, 'Aset_belum_registerExport.xlsx');
    }

    public function Export_Aset_belum_register_AnalisaData()
    {
        return Excel::download(new Aset_belum_registerExport_AnalisaData, 'Aset_belum_registerExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Aset_belum_register(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_aset_belum_register', $nama_file);

        // import data
        Excel::import(new Aset_belum_registerImport, public_path('/imp_aset_belum_register/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Aset_belum_register');
    }

    public function Pengosongan_Aset_belum_register()
    {
        Aset_belum_register::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Aset_belum_register_Pelaksana()
    {
        Aset_belum_register_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Aset_belum_register_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_aset_belum_register', $nama_file);

        // import data
        Excel::import(new Aset_belum_registerImport_tmp, public_path('/imp_aset_belum_register/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Aset_belum_register');
    }

    public function Kepala_bagian_Aset_belum_register()
    {
        $Aset_belum_register = DB::table('Aset_belum_register')
            ->join('referensi_wilayah', 'Aset_belum_register.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Aset_belum_register.id',
                'Aset_belum_register.kode_satker',
                'Aset_belum_register.nama_satker',
                'Aset_belum_register.akun',
                'Aset_belum_register.nama_akun',
                'Aset_belum_register.rupiah',
                'Aset_belum_register.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Aset_belum_register.penjelasan')
            ->where('Aset_belum_register.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Aset_belum_register_kepala_bagian', ['Aset_belum_register' => $Aset_belum_register]);
    }

    public function LA_Aset_belum_register()
    {
        $Aset_belum_register = DB::table('Aset_belum_register')
            ->join('referensi_wilayah', 'Aset_belum_register.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Aset_belum_register.id',
                'Aset_belum_register.kode_satker',
                'Aset_belum_register.nama_satker',
                'Aset_belum_register.akun',
                'Aset_belum_register.nama_akun',
                'Aset_belum_register.rupiah',
                'Aset_belum_register.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Aset_belum_register.penjelasan')
            ->where('Aset_belum_register.checklist', '=', NULL)
            ->get();

        return view('menu_la.Aset_belum_register_la', ['Aset_belum_register' => $Aset_belum_register]);
    }

    public function Analisaok_Aset_belum_register(Request $request)
    {
        $ids = $request->ids;
        DB::table("aset_belum_register")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Aset_belum_register(Request $request)
    {
        $ids = $request->ids;
        DB::table("aset_belum_register")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }


    public function Import_Nilai_perolehan_minus()
    {
        $Nilai_perolehan_minus = Nilai_perolehan_minus::all();
        return view('menu_importdata.Nilai_perolehan_minus', ['Nilai_perolehan_minus' => $Nilai_perolehan_minus]);
    }

    public function Pelaksana_Nilai_perolehan_minus()
    {
        $Nilai_perolehan_minus = DB::table('Nilai_perolehan_minus')
            ->join('referensi_wilayah', 'Nilai_perolehan_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_perolehan_minus.sap',
                'Nilai_perolehan_minus.kode_satker',
                'Nilai_perolehan_minus.nama_satker',
                'Nilai_perolehan_minus.kode_barang',
                'Nilai_perolehan_minus.nama_barang',
                'Nilai_perolehan_minus.nomor_aset',
                'Nilai_perolehan_minus.rph_aset',
                'Nilai_perolehan_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Nilai_perolehan_minus.penjelasan')
            ->get();

        return view('menu_pelaksana.Nilai_perolehan_minus_pelaksana', ['Nilai_perolehan_minus' => $Nilai_perolehan_minus]);
    }


    public function Sync_data_Nilai_perolehan_minus_tmp()
    {
        $Nilai_perolehan_minus = Nilai_perolehan_minus::all();
        return view('menu_pelaksana.Nilai_perolehan_minus_pelaksana', ['Nilai_perolehan_minus' => $Nilai_perolehan_minus]);
    }

    public function Export_Nilai_perolehan_minus()
    {
        return Excel::download(new Nilai_perolehan_minusExport, 'Nilai_perolehan_minusExport.xlsx');
    }

    public function Export_Nilai_perolehan_minus_AnalisaData()
    {
        return Excel::download(new Nilai_perolehan_minusExport_AnalisaData, 'Nilai_perolehan_minusExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Nilai_perolehan_minus(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_nilai_perolehan_minus', $nama_file);

        // import data
        Excel::import(new Nilai_perolehan_minusImport, public_path('/imp_nilai_perolehan_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Nilai_perolehan_minus');
    }

    public function Pengosongan_Nilai_perolehan_minus()
    {
        Nilai_perolehan_minus::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }
    public function Pengosongan_Nilai_perolehan_minus_Pelaksana()
    {
        Nilai_perolehan_minus_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Nilai_perolehan_minus_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_nilai_perolehan_minus', $nama_file);

        // import data
        Excel::import(new Nilai_perolehan_minusImport_tmp, public_path('/imp_nilai_perolehan_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Nilai_perolehan_minus');
    }

    public function Kepala_bagian_Nilai_perolehan_minus()
    {
        $Nilai_perolehan_minus = DB::table('Nilai_perolehan_minus')
            ->join('referensi_wilayah', 'Nilai_perolehan_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_perolehan_minus.id',
                'Nilai_perolehan_minus.sap',
                'Nilai_perolehan_minus.kode_satker',
                'Nilai_perolehan_minus.nama_satker',
                'Nilai_perolehan_minus.kode_barang',
                'Nilai_perolehan_minus.nama_barang',
                'Nilai_perolehan_minus.nomor_aset',
                'Nilai_perolehan_minus.rph_aset',
                'Nilai_perolehan_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Nilai_perolehan_minus.penjelasan')
            ->where('Nilai_perolehan_minus.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Nilai_perolehan_minus_kepala_bagian', ['Nilai_perolehan_minus' => $Nilai_perolehan_minus]);
    }

    public function LA_Nilai_perolehan_minus()
    {
        $Nilai_perolehan_minus = DB::table('Nilai_perolehan_minus')
            ->join('referensi_wilayah', 'Nilai_perolehan_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_perolehan_minus.id',
                'Nilai_perolehan_minus.sap',
                'Nilai_perolehan_minus.kode_satker',
                'Nilai_perolehan_minus.nama_satker',
                'Nilai_perolehan_minus.kode_barang',
                'Nilai_perolehan_minus.nama_barang',
                'Nilai_perolehan_minus.nomor_aset',
                'Nilai_perolehan_minus.rph_aset',
                'Nilai_perolehan_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Nilai_perolehan_minus.penjelasan')
            ->where('Nilai_perolehan_minus.checklist', '=', NULL)
            ->get();

        return view('menu_la.Nilai_perolehan_minus_la', ['Nilai_perolehan_minus' => $Nilai_perolehan_minus]);
    }

    public function Analisaok_Nilai_perolehan_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("nilai_perolehan_minus")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_nilai_perolehan_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("nilai_perolehan_minus")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Nilai_buku_minus()
    {
        $Nilai_buku_minus = Nilai_buku_minus::all();
        return view('menu_importdata.Nilai_buku_minus', ['Nilai_buku_minus' => $Nilai_buku_minus]);
    }

    public function Pelaksana_Nilai_buku_minus()
    {
        $Nilai_buku_minus = DB::table('Nilai_buku_minus')
            ->join('referensi_wilayah', 'Nilai_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_buku_minus.sap',
                'Nilai_buku_minus.kode_satker',
                'Nilai_buku_minus.6digit_kodesatker',
                'Nilai_buku_minus.nama_satker',
                'Nilai_buku_minus.kode_barang',
                'Nilai_buku_minus.nama_barang',
                'Nilai_buku_minus.nomor_aset',
                'Nilai_buku_minus.rph_aset',
                'Nilai_buku_minus.rph_susut',
                'Nilai_buku_minus.rph_buku',
                'Nilai_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Nilai_buku_minus.penjelasan')
            ->get();

        return view('menu_pelaksana.Nilai_buku_minus_pelaksana', ['Nilai_buku_minus' => $Nilai_buku_minus]);
    }


    public function Sync_data_Nilai_buku_minus_tmp()
    {
        $Nilai_buku_minus = Nilai_buku_minus::all();
        return view('menu_pelaksana.Nilai_buku_minus_pelaksana', ['Nilai_buku_minus' => $Nilai_buku_minus]);
    }

    public function Export_Nilai_buku_minus()
    {
        return Excel::download(new Nilai_buku_minusExport, 'Nilai_buku_minusExport.xlsx');
    }

    public function Export_Nilai_buku_minus_AnalisaData()
    {
        return Excel::download(new Nilai_buku_minusExport_AnalisaData, 'Nilai_buku_minusExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Nilai_buku_minus(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_nilai_buku_minus', $nama_file);

        // import data
        Excel::import(new Nilai_buku_minusImport, public_path('/imp_nilai_buku_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Nilai_buku_minus');
    }

    public function Pengosongan_Nilai_buku_minus()
    {
        Nilai_buku_minus::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Nilai_buku_minus_Pelaksana()
    {
        Nilai_buku_minus_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Nilai_buku_minus_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_Nilai_buku_minus', $nama_file);

        // import data
        Excel::import(new Nilai_buku_minusImport_tmp, public_path('/imp_Nilai_buku_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Nilai_buku_minus');
    }

    public function Kepala_bagian_Nilai_buku_minus()
    {
        $Nilai_buku_minus = DB::table('Nilai_buku_minus')
            ->join('referensi_wilayah', 'Nilai_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_buku_minus.id',
                'Nilai_buku_minus.sap',
                'Nilai_buku_minus.kode_satker',
                'Nilai_buku_minus.6digit_kodesatker',
                'Nilai_buku_minus.nama_satker',
                'Nilai_buku_minus.kode_barang',
                'Nilai_buku_minus.nama_barang',
                'Nilai_buku_minus.nomor_aset',
                'Nilai_buku_minus.rph_aset',
                'Nilai_buku_minus.rph_susut',
                'Nilai_buku_minus.rph_buku',
                'Nilai_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Nilai_buku_minus.penjelasan')
            ->where('Nilai_buku_minus.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Nilai_buku_minus_kepala_bagian', ['Nilai_buku_minus' => $Nilai_buku_minus]);
    }

    public function LA_Nilai_buku_minus()
    {
        $Nilai_buku_minus = DB::table('Nilai_buku_minus')
            ->join('referensi_wilayah', 'Nilai_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Nilai_buku_minus.id',
                'Nilai_buku_minus.sap',
                'Nilai_buku_minus.kode_satker',
                'Nilai_buku_minus.6digit_kodesatker',
                'Nilai_buku_minus.nama_satker',
                'Nilai_buku_minus.kode_barang',
                'Nilai_buku_minus.nama_barang',
                'Nilai_buku_minus.nomor_aset',
                'Nilai_buku_minus.rph_aset',
                'Nilai_buku_minus.rph_susut',
                'Nilai_buku_minus.rph_buku',
                'Nilai_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Nilai_buku_minus.penjelasan')
            ->where('Nilai_buku_minus.checklist', '=', NULL)
            ->get();

        return view('menu_la.Nilai_buku_minus_la', ['Nilai_buku_minus' => $Nilai_buku_minus]);
    }

    public function Analisaok_Nilai_buku_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("nilai_buku_minus")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Nilai_buku_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("nilai_buku_minus")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Import_Tanggal_buku_minus()
    {
        $Tanggal_buku_minus = Tanggal_buku_minus::all();
        return view('menu_importdata.Tanggal_buku_minus', ['Tanggal_buku_minus' => $Tanggal_buku_minus]);
    }

    public function Pelaksana_Tanggal_buku_minus()
    {
        $Tanggal_buku_minus = DB::table('Tanggal_buku_minus')
            ->join('referensi_wilayah', 'Tanggal_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Tanggal_buku_minus.kode_satker',
                'Tanggal_buku_minus.nama_satker',
                'Tanggal_buku_minus.kode_barang',
                'Tanggal_buku_minus.nomor_aset',
                'Tanggal_buku_minus.tgl_buku',
                'Tanggal_buku_minus.tgl_perolehan',
                'Tanggal_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->where('referensi_wilayah.kode_pembina', '=', Auth::user()->name)
            ->whereNull('Tanggal_buku_minus.penjelasan')
            ->get();

        return view('menu_pelaksana.Tanggal_buku_minus_pelaksana', ['Tanggal_buku_minus' => $Tanggal_buku_minus]);
    }


    public function Sync_data_Tanggal_buku_minus_tmp()
    {
        $Tanggal_buku_minus = Tanggal_buku_minus::all();
        return view('menu_pelaksana.Tanggal_buku_minus_pelaksana', ['Tanggal_buku_minus' => $Tanggal_buku_minus]);
    }

    public function Export_Tanggal_buku_minus()
    {
        return Excel::download(new Tanggal_buku_minusExport, 'Tanggal_buku_minusExport.xlsx');
    }

    public function Export_Tanggal_buku_minus_AnalisaData()
    {
        return Excel::download(new Tanggal_buku_minusExport_AnalisaData, 'Tanggal_buku_minusExport_AnalisaData.xlsx');
    }

    public function Import_Excel_Tanggal_buku_minus(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tanggal_buku_minus', $nama_file);

        // import data
        Excel::import(new Tanggal_buku_minusImport, public_path('/imp_tanggal_buku_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import File Berhasil');



        // alihkan halaman kembali
        return redirect('/Import_Tanggal_buku_minus');
    }

    public function Pengosongan_Tanggal_buku_minus()
    {
        Tanggal_buku_minus::truncate();
        Session::flash('pengosongan', 'Pengosongan Data Berhasil');
        return
            redirect()->back();
    }

    public function Pengosongan_Tanggal_buku_minus_Pelaksana()
    {
        Tanggal_buku_minus_tmp::truncate();
        Session::flash('pengosongan', 'Pengosongan Data .tmp Berhasil');
        return
            redirect()->back();
    }

    public function Import_Excel_Tanggal_buku_minus_Pelaksana(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('imp_tanggal_buku_minus', $nama_file);

        // import data
        Excel::import(new Tanggal_buku_minusImport_tmp, public_path('/imp_tanggal_buku_minus/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Import file kedalam tabel .tmp berhasil ');

        // alihkan halaman kembali
        return redirect('/Pelaksana_Tanggal_buku_minus');
    }

    public function Kepala_bagian_Tanggal_buku_minus()
    {
        $Tanggal_buku_minus = DB::table('Tanggal_buku_minus')
            ->join('referensi_wilayah', 'Tanggal_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Tanggal_buku_minus.id',
                'Tanggal_buku_minus.kode_satker',
                'Tanggal_buku_minus.nama_satker',
                'Tanggal_buku_minus.kode_barang',
                'Tanggal_buku_minus.nomor_aset',
                'Tanggal_buku_minus.tgl_buku',
                'Tanggal_buku_minus.tgl_perolehan',
                'Tanggal_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Tanggal_buku_minus.penjelasan')
            ->where('Tanggal_buku_minus.checklist', '=', NULL)
            ->get();

        return view('menu_kepala_bagian.Tanggal_buku_minus_kepala_bagian', ['Tanggal_buku_minus' => $Tanggal_buku_minus]);
    }

    public function LA_Tanggal_buku_minus()
    {
        $Tanggal_buku_minus = DB::table('Tanggal_buku_minus')
            ->join('referensi_wilayah', 'Tanggal_buku_minus.6digit_kodesatker', '=', 'referensi_wilayah.kode_satker')
            ->select(
                'Tanggal_buku_minus.id',
                'Tanggal_buku_minus.kode_satker',
                'Tanggal_buku_minus.nama_satker',
                'Tanggal_buku_minus.kode_barang',
                'Tanggal_buku_minus.nomor_aset',
                'Tanggal_buku_minus.tgl_buku',
                'Tanggal_buku_minus.tgl_perolehan',
                'Tanggal_buku_minus.penjelasan',
                'referensi_wilayah.kode_pembina'
            )
            ->whereNotNull('Tanggal_buku_minus.penjelasan')
            ->where('Tanggal_buku_minus.checklist', '=', NULL)
            ->get();

        return view('menu_la.Tanggal_buku_minus_la', ['Tanggal_buku_minus' => $Tanggal_buku_minus]);
    }

    public function Analisaok_Tanggal_buku_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("tanggal_buku_minus")->whereIn('id', explode(",", $ids))->update(['checklist' => '1']);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    public function Analisanok_Tanggal_buku_minus(Request $request)
    {
        $ids = $request->ids;
        DB::table("tanggal_buku_minus")->whereIn('id', explode(",", $ids))->update(['penjelasan' => NULL, 'checklist' => NULL]);
        return response()->json(['success' => "Data telah diperbarui. Refresh Halaman web jika ingin melihat perubahan"]);
    }

    //Pengaturan_wilayah
    public function Pengaturan_wilayah()
    {
        $Referensi_wilayah = Referensi_wilayah::all();
        $User = User::all();
        return view('menu_pengaturanwilayah.pengaturan_wilayah', compact('Referensi_wilayah', 'User'));
    }

    public function edit($id)
    {
        $Referensi_wilayah = Referensi_wilayah::find($id);
        $User = User::all();
        return view('menu_pengaturanwilayah.pengaturan_wilayah_edit', compact('Referensi_wilayah', 'User'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'baes1' => 'required',
            'wilayah_satker' => 'required',
            'kode_satker' => 'required',
            'nama_satker' => 'required',
            'kode_pembina' => 'required',
        ]);

        $Referensi_wilayah = Referensi_wilayah::find($id);
        $Referensi_wilayah->baes1 = $request->baes1;
        $Referensi_wilayah->wilayah_satker = $request->wilayah_satker;
        $Referensi_wilayah->kode_satker = $request->kode_satker;
        $Referensi_wilayah->nama_satker = $request->nama_satker;
        $Referensi_wilayah->kode_pembina = $request->kode_pembina;
        $Referensi_wilayah->save();
        return redirect('/Pengaturan_wilayah');
    }
}