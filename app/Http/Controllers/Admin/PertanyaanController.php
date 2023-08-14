<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PertanyaanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $pertanyaans = Pertanyaan::query();
            return DataTables::eloquent($pertanyaans)
                ->make();
        }
        return view('pages.admin.pertanyaan.index');
    }

    public function create()
    {
        return view('pages.admin.pertanyaan.create');
    }

    public function save(Request $request)
    {
        $validatedPertanyaan = $request->validate([
            'pertanyaan' => ['required'],
            'kategori' => ['required'],
            'jawaban_benar' => ['required'],
        ]);
        $validatedJawaban = $request->validate([
            'jawaban' => ['required'],
        ]);

        $pertanyaan = Pertanyaan::create($validatedPertanyaan);
        $validatedJawaban['pertanyaan_id'] = $pertanyaan->id;

        $jawabanA = Jawaban::create([
           'pertanyaan_id' => $validatedJawaban['pertanyaan_id'],
           'pilihan' => "A",
           'jawaban' => $validatedJawaban['jawaban']['A'], 
        ]);
        $jawabanB = Jawaban::create([
           'pertanyaan_id' => $validatedJawaban['pertanyaan_id'],
           'pilihan' => "B",
           'jawaban' => $validatedJawaban['jawaban']['B'], 
        ]);
        $jawabanC = Jawaban::create([
           'pertanyaan_id' => $validatedJawaban['pertanyaan_id'],
           'pilihan' => "C",
           'jawaban' => $validatedJawaban['jawaban']['C'], 
        ]);
        $jawabanD = Jawaban::create([
           'pertanyaan_id' => $validatedJawaban['pertanyaan_id'],
           'pilihan' => "D",
           'jawaban' => $validatedJawaban['jawaban']['D'], 
        ]);
        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }
}
