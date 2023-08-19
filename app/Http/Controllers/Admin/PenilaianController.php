<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Pelamar;
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
        $subKriteria = new SubCriteria;
        return view('pages.admin.penilaian.create', compact('pelamar', 'kriteria', 'subKriteria'));
    }

    public function save($id)
    {
        $id = Crypt::decrypt($id);
    }
}
