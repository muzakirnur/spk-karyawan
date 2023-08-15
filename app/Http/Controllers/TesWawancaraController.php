<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pelamar;
use App\Models\Pertanyaan;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\isEmpty;

class TesWawancaraController extends Controller
{
    public function index()
    {
        $pelamar = Pelamar::query()->where('user_id', auth()->id())->first();
        if($pelamar == null){
            return redirect()->route('pelamar.index')->with('error', 'Harap mengisis data diri terlebih dahulu!');
        }
        $tesWawancara = Wawancara::query()->where('pelamar_id', $pelamar->id)->get();
        if(!$tesWawancara->isEmpty()){
            return redirect()->route('tes-wawancara.show', Crypt::encrypt($pelamar->id));
        }
        $pertanyaans = Pertanyaan::query()->where('kategori', 'WAWANCARA')->get();
        return view('pages.pelamar.tes-wawancara.index', compact('pertanyaans'));
    }

    public function save(Request $request)
    {
        $pertanyaans = Pertanyaan::query()->where('kategori', 'WAWANCARA')->get();
        $pelamar = Pelamar::query()->where('user_id',auth()->id())->first();
        foreach($pertanyaans as $pertanyaan){
            Wawancara::create([
                'tanggal' => date(now()),
                'pelamar_id' => $pelamar->id,
                'pertanyaan_id' => $pertanyaan->id,
                'jawaban' => $request->jawaban[$pertanyaan->id],
            ]);
        }
        return redirect()->route('dashboard-pelamar')->with('success', 'Data Tes berhasil disubmit!');
    }

    private function penilaian($pertanyaan, $jawaban)
    {
        $pertanyaan = Pertanyaan::findOrFail($pertanyaan);
        $jawaban = Jawaban::findOrFail($jawaban);
        if($pertanyaan->jawaban_benar == $jawaban->pilihan){
            return 10;
        } else {
            return 0;
        }
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $wawancara = Wawancara::query()->with('pertanyaan', 'jawaban')->where('pelamar_id', $id)->get();
        return view('pages.pelamar.tes-wawancara.show', compact('wawancara'));
    }
}


