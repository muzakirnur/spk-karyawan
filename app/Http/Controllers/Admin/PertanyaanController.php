<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class PertanyaanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $pertanyaans = Pertanyaan::query();
            return DataTables::eloquent($pertanyaans)
                ->addColumn('action', '<a href="{{ route("admin.pertanyaan.show", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
                <i class="fa-solid fa-eye"></i> Lihat
            </a> <a href="{{ route("admin.pertanyaan.delete", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-red-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
            <i class="fa-solid fa-trash"></i> Hapus
        </a>')
                ->rawColumns(['action'])
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
        if($request->kategori == "TEORI"){
            $validatedPertanyaan = $request->validate([
                'pertanyaan' => ['required'],
                'kategori' => ['required'],
                'jawaban_benar' => ['required'],
            ]);
            $validatedJawaban = $request->validate([
                'jawaban' => ['required'],
            ]);
        } else {
            $validatedPertanyaan = $request->validate([
                'pertanyaan' => ['required'],
                'kategori' => ['required'],
            ]);
            $validatedPertanyaan['jawaban_benar'] = "Essay";
        }
        $pertanyaan = Pertanyaan::create($validatedPertanyaan);

        if($request->kategori == "TEORI"){
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
        }
        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $pertanyaan = Pertanyaan::findOrFail($id);
        $jawabans = Jawaban::query()->where('pertanyaan_id', $id)->get();
        return view('pages.admin.pertanyaan.show', compact('pertanyaan', 'jawabans'));
    }

    public function update($id, Request $request)
    {
        if($request->kategori == "TEORI"){
            $validatedPertanyaan = $request->validate([
                'pertanyaan' => ['required'],
                'kategori' => ['required'],
                'jawaban_benar' => ['required'],
            ]);
            $validatedJawaban = $request->validate([
                'jawaban' => ['required'],
            ]);
        } else {
            $validatedPertanyaan = $request->validate([
                'pertanyaan' => ['required'],
                'kategori' => ['required'],
            ]);
            $validatedPertanyaan['jawaban_benar'] = "Essay";
        }

        $id = Crypt::decrypt($id);
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($validatedPertanyaan);
        if($request->kategori == "TEORI"){
            $jawabanA = Jawaban::query()->where('pertanyaan_id', $id)->where('pilihan', '=', "A")->first();
            $jawabanA->update([
                'jawaban' => $validatedJawaban['jawaban']['A'],
            ]);
    
            $jawabanB = Jawaban::query()->where('pertanyaan_id', $id)->where('pilihan', '=', "B")->first();
            $jawabanB->update([
                'jawaban' => $validatedJawaban['jawaban']['B'],
            ]);
            $jawabanC = Jawaban::query()->where('pertanyaan_id', $id)->where('pilihan', '=', "C")->first();
            $jawabanC->update([
                'jawaban' => $validatedJawaban['jawaban']['C'],
            ]);
            $jawabanD = Jawaban::query()->where('pertanyaan_id', $id)->where('pilihan', '=', "D")->first();
            $jawabanD->update([
                'jawaban' => $validatedJawaban['jawaban']['D'],
            ]);
            
        }

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Data Pertanyaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $pertanyaan = Pertanyaan::findOrFail($id);
        if($pertanyaan->kategori == "TEORI"){
            $jawabans = Jawaban::query()->where('pertanyaan_id', $id)->get();
            foreach ($jawabans as $jw){
                $jw->delete();
            }
        }
        $pertanyaan->delete();
        return redirect()->route('admin.pertanyaan.index')->with('success', 'Data pertanyaan berhasil dihapus!');
    }
}