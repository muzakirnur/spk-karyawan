<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\HasilDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HasilAkhirController extends Controller
{
    public function index(Request $request)
    {
        $getAllYear = Hasil::all();
        $checkYear = date('Y', strtotime(now()));
        if($request->has('tahun')){
            $checkYear = $request->tahun;
        }
        $hasil = Hasil::query()->where('tahun', $checkYear)->first();
        if(!$hasil){
            $hasil = Hasil::query()->latest('tahun', 'DESC')->first();
        }
        $hasilDetail = HasilDetail::query()->with('pelamar', 'hasil')->where('hasil_id', $hasil->id)->orderBy('nilai', 'DESC')->paginate(10);
        return view('pages.admin.hasil.hasil-akhir.index', compact('hasilDetail', 'getAllYear'));
    }

    public function export(Request $request)
    {
        $checkYear = date('Y', strtotime(now()));
        if($request->tahun != null){
            $checkYear = $request->tahun;
        }
        $hasil = Hasil::query()->where('tahun', $checkYear)->first();
        $data = HasilDetail::query()->with('pelamar', 'hasil')->where('hasil_id', $hasil->id)->orderBy('nilai', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.exportHasil', ['data'=> $data]);
        return $pdf->download('hasilAkhir.pdf');
    }
}
