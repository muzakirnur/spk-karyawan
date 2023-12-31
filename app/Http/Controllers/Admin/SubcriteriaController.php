<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class SubcriteriaController extends Controller
{
    public function index()
    {
        $tables = Criteria::all();
        $subkriteria = new SubCriteria;
        return view('pages.admin.sub-kriteria.index', compact('tables', 'subkriteria'));
    }

    public function create($id)
    {
        $id = Crypt::decrypt($id);
        return view('pages.admin.sub-kriteria.create', compact('id'));
    }

    public function save($id, Request $request)
    {
        $id = Crypt::decrypt($id);
        $validated = $request->validate([
            'nama' => ['required', 'max:255'],
            'nilai' => ['required']
        ]);
        $validated['criteria_id'] = $id;
        SubCriteria::create($validated);
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Subkriteria berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $subkriteria = SubCriteria::findOrFail($id);
        return view('pages.admin.sub-kriteria.edit', compact('subkriteria'));
    }

    public function update($id, Request $request)
    {
        $id = Crypt::decrypt($id);
        $subkriteria = SubCriteria::findOrFail($id);
        $validated = $request->validate([
            'nama' => ['required'],
            'nilai' => ['required']
        ]);
        $subkriteria->update($validated);
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Subkriteria berhasil diupdate!');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $subkriteria = SubCriteria::findOrFail($id);
        $subkriteria->delete();
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Subkriteria berhasil dihapus!');
    }
}
