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
    public function index()
    {
        $checkYear = date('Y', strtotime(now()));
        $hasil = Hasil::query()->where('tahun', $checkYear)->first();
        if (request()->ajax()) {
            $hasilDetail = HasilDetail::query()->with('pelamar', 'hasil')->where('hasil_id', $hasil->id);
            return DataTables::eloquent($hasilDetail)
                ->order(function($query){
                    $query->orderBy('nilai', 'DESC');
                })
                ->orderColumn('nilai', function($query, $order){
                    $query->orderBy('nilai', $order);
                })
                ->addIndexColumn()
                ->make();
        }
        return view('pages.admin.hasil.hasil-akhir.index');
    }

    public function export()
    {
        $checkYear = date('Y', strtotime(now()));
        $hasil = Hasil::query()->where('tahun', $checkYear)->first();
        $data = HasilDetail::query()->with('pelamar', 'hasil')->where('hasil_id', $hasil->id)->orderBy('nilai', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.exportHasil', ['data'=> $data]);
        return $pdf->download('hasilAkhir.pdf');
    }
}
