<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pelamar;
use App\Models\Pertanyaan;
use App\Models\TesTeori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TesTeoriController extends Controller
{
    public function index()
    {
        $pelamar = Pelamar::query()->where('user_id', auth()->id())->first();
        if($pelamar == null){
            return redirect()->route('pelamar.index')->with('error', 'Harap mengisis data diri terlebih dahulu!');
        }
        $tesTeori = TesTeori::query()->where('pelamar_id', $pelamar->id);
        if($tesTeori != null){
            return redirect()->route('tes-teori.show', Crypt::encrypt($pelamar->id));
        }
        $pertanyaans = Pertanyaan::query()->where('kategori', 'TEORI')->get();
        $jawaban = new Jawaban;
        return view('pages.pelamar.tes-teori.index', compact('pertanyaans', 'jawaban'));
    }

    public function save(Request $request)
    {
        $pertanyaans = Pertanyaan::query()->where('kategori', 'TEORI')->get();
        $pelamar = Pelamar::query()->where('user_id',auth()->id())->first();
        foreach($pertanyaans as $pertanyaan){
            TesTeori::create([
                'pelamar_id' => $pelamar->id,
                'pertanyaan_id' => $pertanyaan->id,
                'jawaban_id' => $request->jawaban[$pertanyaan->id],
                'nilai' => $this->penilaian($pertanyaan->id, $request->jawaban[$pertanyaan->id]),
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
        $tesTeori = TesTeori::query()->with('pertanyaan', 'jawaban')->where('pelamar_id', $id)->get();
        return view('pages.pelamar.tes-teori.show', compact('tesTeori'));
    }
}
