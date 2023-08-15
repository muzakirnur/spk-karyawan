<?php

namespace App\Http\Controllers\Admin\Hasil;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use App\Models\Pertanyaan;
use App\Models\Wawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TesWawancaraController extends Controller
{
    public function index()
    {
        $wawancara = new Wawancara;
        $pertanyaan = Pertanyaan::query()->where('kategori', "WAWANCARA")->count();
        $pelamars = Pelamar::paginate(10);
        return view('pages.admin.hasil.wawancara.index', compact('wawancara', 'pelamars', 'pertanyaan'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $hasilTes = Wawancara::query()->where('pelamar_id', $id)->get();
        $pelamar = Pelamar::findOrFail($id);
        return view('pages.admin.hasil.wawancara.show', compact('hasilTes', 'pelamar'));
    }
}
