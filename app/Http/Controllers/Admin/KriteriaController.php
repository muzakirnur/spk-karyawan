<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KriteriaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $criterias = Criteria::query();
            return DataTables::eloquent($criterias)
                ->make();
        }
      return view('pages.admin.kriteria.index');
    }

    public function create()
    {
        return view('pages.admin.kriteria.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'max:255'],
            'kode_kriteria' => ['required', 'unique:criterias,kode_kriteria'],
            'bobot' => ['required'],
        ]);

        Criteria::create($validated);
        return redirect()->route('admin.kriteria.index')->with('success', 'Data Kriteria Berhasil ditambahkan!');
    }
}
