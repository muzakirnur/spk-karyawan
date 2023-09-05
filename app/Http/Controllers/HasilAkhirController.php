<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HasilAkhirController extends Controller
{
    public function index()
    {
        $pelamarID = Pelamar::query()->where('user_id', auth()->id())->first();
        $getHasilDetail = HasilDetail::query()->where('pelamar_id', $pelamarID->id)->first();
        if (request()->ajax()) {
            $hasilDetail = HasilDetail::query()->with('pelamar', 'hasil')->where('hasil_id', $getHasilDetail->hasil_id);
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
        return view('pages.pelamar.hasil-akhir.index');
    }
}
