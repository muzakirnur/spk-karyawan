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
        return redirect()->route('admin.sub-criteria.index')->with('success', 'Subkriteria berhasil ditambahkan!');
    }
}
