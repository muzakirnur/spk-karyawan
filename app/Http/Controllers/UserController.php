<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
      if (request()->ajax()) {
        $users = User::query()->where('is_admin', false);
        return DataTables::eloquent($users)
            ->addColumn('is_admin', function($users){
              return $users->is_admin == true ? 'Admin' : 'User';
            })
            ->addColumn('action', '<a href="{{ route("users.show", Crypt::encrypt($id)) }}" class="py-2 mr-2 px-4 text-sm bg-indigo-500 text-white rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-sm">
            <i class="fa-solid fa-eye"></i> Lihat
        </a>')
            ->make();
      }
      return view('pages.admin.users.index');
    }

    public function show($id)
    {
      $id = Crypt::decrypt($id);
      $user = User::findOrFail($id);
      $pelamar = Pelamar::query()->where('user_id', $id)->first();
      return view('pages.admin.users.show', compact('user', 'pelamar'));
    }
}
