<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelamarController extends Controller
{
    public function index()
    {
      $dataPelamar = Pelamar::query()->where('user_id', auth()->id())->first();
      return view('pages.pelamar.data-diri.index', compact('dataPelamar'));
    }

    public function create(Request $request)
    {
      $check = Pelamar::query()->where('user_id', auth()->id())->first();
      if($check != null){
        $validated = $request->validate([
          'nama' => ['required', 'max:255'],
          'nik' => ['required', 'min:16', 'max:16', 'unique:pelamars,nik,' . $check->id],
          'tanggal_lahir' => ['required', 'date'],
          'tempat_lahir' => ['required', 'max:255'],
          'jenis_kelamin' => ['required'],
          'email' => ['required', 'unique:pelamars,email,'. $check->id],
          'hp' => ['required', 'min:11', 'max:13', 'unique:pelamars,hp,'. $check->id],
          'alamat' => ['required'],
          'jarak_rumah' => ['required'],
          'ipk' => ['required'],
          'pendidikan' => ['required'],
          'pengalaman' => ['required'],
        ]);
      } else {
        $validated = $request->validate([
          'nama' => ['required', 'max:255'],
          'nik' => ['required', 'min:16', 'max:16', 'unique:pelamars,nik'],
          'tanggal_lahir' => ['required', 'date'],
          'tempat_lahir' => ['required', 'max:255'],
          'jenis_kelamin' => ['required'],
          'email' => ['required', 'unique:pelamars,email'],
          'hp' => ['required', 'min:11', 'max:13', 'unique:pelamars,hp'],
          'alamat' => ['required'],
          'jarak_rumah' => ['required'],
          'ipk' => ['required'],
          'pendidikan' => ['required'],
          'pengalaman' => ['required'],
        ]);
      }
    $validated['user_id'] = auth()->id();
    if($check == null){
      Pelamar::create($validated);
    } else {
      $check->update($validated);
    }
    return redirect()->back()->with('success', 'Data Diri berhasil tersimpan!');
    }
}
