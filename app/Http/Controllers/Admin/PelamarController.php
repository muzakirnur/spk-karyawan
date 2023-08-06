<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PelamarController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $pelamars = Pelamar::query();
            return DataTables::eloquent($pelamars)
            ->addColumn('ttl', function($pelamars){
                return $pelamars->tempat_lahir . ', ' . date('d F Y', strtotime($pelamars->tanggal_lahir));
            })
                ->make();
          }
      return view('pages.admin.pelamar.index');
    }
}
