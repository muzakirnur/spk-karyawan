<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Pelamar;
use App\Models\Penilaian;
use App\Models\Pertanyaan;
use App\Models\SubCriteria;
use App\Models\TesTeori;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class PenilaianController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $pelamars = Pelamar::query()->with('tesTeori', 'wawancara');
            return DataTables::eloquent($pelamars)
            ->addColumn('action', '<a href="{{ route("admin.penilaian.create", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
            <i class="fa-solid fa-pen"></i></a>')
            ->addColumn('tes_teori', function($pelamars){
                $tesTeori = TesTeori::query()->where('pelamar_id', $pelamars->id)->first();
                return $tesTeori != null ? "SUDAH" : "BELUM";
            })
            ->addColumn('wawancara', function($pelamars){
                $wawancara = Wawancara::query()->where('pelamar_id', $pelamars->id)->first();
                return $wawancara != null ? "SUDAH" : "BELUM";
            })
            ->rawColumns(['action'])
            ->make();
          }
        return view('pages.admin.penilaian.index');
    }

    public function create($id)
    {
        $id = Crypt::decrypt($id);
        $pelamar = Pelamar::findOrFail($id);
        $kriteria = Criteria::all();
        $pertanyaanTeori = Pertanyaan::query()->where('kategori', "TEORI")->get();
        $subKriteria = new SubCriteria;
        $tesTeori = TesTeori::query()->where('pelamar_id', $id)->get();
        $nilaiTeori = $tesTeori->sum('nilai') / $pertanyaanTeori->count() * 10;
        $wawancara = Wawancara::query()->where('pelamar_id', $id)->get();
        $penilaian = Penilaian::query()->where('pelamar_id', $id)->get();
        return view('pages.admin.penilaian.create', compact('pelamar', 'kriteria', 'subKriteria', 'nilaiTeori', 'wawancara', 'penilaian'));
    }

    public function save($id, Request $request)
    {
        $kriteria = Criteria::all();
        $id = Crypt::decrypt($id);
        if($this->checkExist($id) == true){
            foreach($kriteria as $kr){
                $nilai = SubCriteria::findOrFail($request->penilaian[$kr->id]);
                Penilaian::create([
                    'pelamar_id' => $id,
                    'criteria_id' => $kr->id,
                    'sub_criteria_id' => $request->penilaian[$kr->id],
                    'nilai' => $nilai->nilai,
                ]);
            }
        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil disubmit!');
        } else {
            foreach($kriteria as $kr){
                $nilai = SubCriteria::findOrFail($request->penilaian[$kr->id]);
                $penilaian = Penilaian::query()->where('pelamar_id', $id)->where('criteria_id', $kr->id)->first();
                $penilaian->update([
                    'sub_criteria_id' => $request->penilaian[$kr->id],
                    'nilai' => $nilai->nilai
                ]);
            }
        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil diupdate!');
        }
    }

    private function checkExist($id)
    {
        $penilaian = Penilaian::query()->where('pelamar_id', $id)->get();
        if($penilaian->count() == 0){
            return true;
        } else {
            return false;
        }
        
    }
}
