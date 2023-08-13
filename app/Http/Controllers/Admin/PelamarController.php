<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            ->addColumn('action', '<a href="{{ route("admin.pelamar.show", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
            <i class="fa-solid fa-eye"></i> Lihat
        </a> <a href="{{ route("admin.pelamar.delete", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-red-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
        <i class="fa-solid fa-trash"></i> Hapus
    </a>')
            ->rawColumns(['action'])
            ->make();
          }
      return view('pages.admin.pelamar.index');
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $pelamar = Pelamar::findOrFail($id);
        return view('pages.admin.pelamar.show', compact('pelamar'));
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $pelamar = Pelamar::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus!');
    }
}
