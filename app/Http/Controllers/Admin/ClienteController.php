<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all(); 
        return view('admin.cliente.index', compact('cliente'));
    }

    public function add()
    {
        return view('admin.cliente.add');
    }

    public function insert(Request $request)
    {
        $cliente = new Cliente();

        $cliente->name = $request->input('name');
        $cliente->name_cont = $request->input('name_cont');
        $cliente->telefone = $request->input('telefone');
        $cliente->telemovel = $request->input('telemovel');
        $cliente->email = $request->input('email');
        $cliente->morada = $request->input('morada');
        $cliente->cod_pos = $request->input('cod_pos');
        $cliente->localidade = $request->input('localidade');
        $cliente->pais = $request->input('pais');
        $cliente->save();
        return redirect('/clientes')->with('status',"Cliente adicionada com sucesso!");
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.cliente.edit', compact('cliente')); 
    }
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->name = $request->input('name');
        $cliente->telefone = $request->input('telefone');
        $cliente->email = $request->input('email');
        $cliente->morada = $request->input('morada');
        $cliente->update();
        return redirect('/clientes')->with('status',"Cliente atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('/clientes')->with('status',"Cliente eliminado com sucesso!");
    }
}

