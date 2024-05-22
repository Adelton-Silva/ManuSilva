<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function index()
   {
       $user = User::where('id',Auth::id())->get();
       return view('auth.profile', compact('user'));
   }
   public function indextec()
   {
       $user = User::where('id',Auth::id())->get();
       return view('auth.profiletec', compact('user'));  
   }

   public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit', compact('user')); 
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->telefone = $request->input('telefone');
        $user->morada = $request->input('morada');
        $user->cod_pos = $request->input('cod_pos');
        $user->destrito = $request->input('destrito');
        $user->pais = $request->input('pais');
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect('/profile')->with('status',"Profile atualizado com sucesso!");
    }

    public function editec($id)
    {
        $user = User::find($id);
        return view('auth.editec', compact('user')); 
    }
    public function updatec(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->telefone = $request->input('telefone');
        $user->morada = $request->input('morada');
        $user->cod_pos = $request->input('cod_pos');
        $user->destrito = $request->input('destrito');
        $user->pais = $request->input('pais');
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect('/profiletec')->with('status',"Profile atualizado com sucesso!");
    }
   
}

