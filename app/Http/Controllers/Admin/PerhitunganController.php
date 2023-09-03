<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Hasil;
use App\Models\HasilDetail;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriterias = Criteria::all();
        $pelamars = Pelamar::query()->whereRelation('penilaian', 'pelamar_id', '!=', null)->get();
        $penilaians = new Penilaian;
        return view('pages.admin.perhitungan.index', compact('kriterias', 'pelamars', 'penilaians'));
    }

    public function save(Request $request)
    {
        $tahun = date('Y', strtotime(now()));
        $hasil = Hasil::query()->where('tahun', $tahun)->first();
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
