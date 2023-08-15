<?php

namespace App\Http\Controllers\Admin\Hasil;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use App\Models\Pertanyaan;
use App\Models\TesTeori;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class TesTeoriController extends Controller
{
    public function index()
    {
        $tesTeoris = new TesTeori;
        $pertanyaan = Pertanyaan::query()->where('kategori', "TEORI")->count();
        $pelamars = Pelamar::paginate(10);
        return view('pages.admin.hasil.teori.index', compact('tesTeoris', 'pelamars', 'pertanyaan'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $hasilTes = TesTeori::query()->where('pelamar_id', $id)->get();
        $pelamar = Pelamar::findOrFail($id);
        return view('pages.admin.hasil.teori.show', compact('hasilTes', 'pelamar'));
    }
}
