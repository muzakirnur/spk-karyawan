<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            ->make();
      }
      return view('pages.admin.users.index');
    }
}
