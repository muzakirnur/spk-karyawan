<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriterias = Criteria::all();
        $pelamars = Pelamar::query()->whereRelation('penilaian', 'pelamar_id', '!=', null)->get();
        $penilaians = new Penilaian;
        return view('pages.admin.perhitungan.index', compact('kriterias', 'pelamars', 'penilaians'));
    }
}
