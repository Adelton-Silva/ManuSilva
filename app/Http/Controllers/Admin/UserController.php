<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.users.add');
    }

    public function insert(Request $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telefone = $request->input('telefone');
        $user->password = Hash::make($request->input('password'));
        $user->role_as = $request->input('role_as');
        $user->save();
        return redirect('/users')->with('status',"Utelizador registado com sucesso!");
    }
}

