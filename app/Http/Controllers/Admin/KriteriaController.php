<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class KriteriaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $criterias = Criteria::query();
            return DataTables::eloquent($criterias)
                ->addColumn('action', '<a href="{{ route("admin.kriteria.edit", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
                <i class="fa-solid fa-edit"></i> Edit
            </a>')
                ->rawColumns(['action'])
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

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kriteria = Criteria::findOrFail($id);
        return view('pages.admin.kriteria.edit', compact('kriteria'));
    }

    public function update($id, Request $request)
    {
        $id = Crypt::decrypt($id);
        $kriteria = Criteria::findOrFail($id);
        $validated = $request->validate([
            'nama' => ['required', 'max:255'],
            'kode_kriteria' => ['required', 'unique:criterias,kode_kriteria,' . $kriteria->id],
            'bobot' => ['required'],
        ]);
        $kriteria->update($validated);
        return redirect()->route('admin.kriteria.index')->with('success', 'Data Kriteria Berhasil diperbarui!');
    }
}
