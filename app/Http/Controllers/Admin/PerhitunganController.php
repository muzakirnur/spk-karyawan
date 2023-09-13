<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        $checkPenilaian = Penilaian::query()->where('created_at', date('Y', strtotime(now())))->count();
        $kriterias = Criteria::all();
        $pelamars = DB::table('penilaians')
            ->select('penilaians.pelamar_id', DB::raw('count(*) as total'), 'pelamars.nama')
            ->join('pelamars', 'pelamars.id', '=', 'penilaians.pelamar_id')
            ->whereYear('penilaians.created_at', date('Y', strtotime(now())))
            ->groupBy('pelamar_id')
            ->get();
        // $pelamars = Penilaian::query()->groupBy('pelamar_id')->with('pelamar')->whereYear('created_at', date('Y', strtotime(now())))->get();
        $penilaians = new Penilaian;
        return view('pages.admin.perhitungan.index', compact('kriterias', 'pelamars', 'penilaians', 'checkPenilaian'));
    }

    public function save(Request $request)
    {
        $tahun = date('Y', strtotime(now()));
        $hasil = Hasil::query()->whereYear('tahun', $tahun)->first();
        if($hasil == null){
            $hasil = Hasil::create([
                'tahun' => $tahun,
            ]);
            foreach($request->id as $key => $value){
                HasilDetail::create([
                    'hasil_id' => $hasil->id,
                    'pelamar_id' => $request->id[$key],
                    'nilai' => $request->nilai[$key],
                ]);
            }
        } else {
            foreach($request->id as $key => $value){
                $hasil = HasilDetail::query()->where('pelamar_id', $value)->first();
                $hasil->update([
                    'nilai' => $request->nilai[$key],
                ]);
            }
        }
        return redirect()->route('dashboard')->with('success', 'Hasil Penilai Berhasil disimpan!');
    }
}
