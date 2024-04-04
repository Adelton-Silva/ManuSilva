<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carregador;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarregadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carregadores = Carregador::all();
        return view('admin.carregador.index', compact('carregadores'));
    }

    public function add()
    {
        $cliente = Cliente::all();
        return view('admin.carregador.add', compact('cliente'));
    }
    public function insert(Request $request)
    {
        $carregador = new Service();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/services',$filename);
            $carregador->image = $filename;
        }
        $carregador->cliente_id = $request->input('cliente_id');
        $carregador->marca = $request->input('marca');
        $carregador->modelo = $request->input('modelo');
        $carregador->num_serie = $request->input('num_serie');
        $carregador->descri_avaria = $request->input('descri_avaria');
        $carregador->data_entrada = $request->input('data_entrada');
        $carregador->descri_atividade = $request->input('descri_atividade');
        $carregador->data_saida = $request->input('data_saida');
        $carregador->save();
        return redirect('carregadores')->with('status',"Carregador adicionado com sucesso!");
    }
}
