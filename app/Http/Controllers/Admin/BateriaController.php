<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bateria;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BateriaController extends Controller
{
    public function index()
    {
        $baterias = Bateria::all();
        return view('admin.bateria.index', compact('baterias'));
    } 
    public function add()
    {
        $cliente = Cliente::all();
        return view('admin.bateria.add', compact('cliente'));
    }
    public function insert(Request $request)
    {
        $bateria = new Bateria();
        $bateria->cliente_id = $request->input('cliente_id');
        $bateria->tipo = $request->input('tipo');
        $bateria->matricula = $request->input('matricula');
        $bateria->emp_marca = $request->input('emp_marca');
        $bateria->emp_modelo = $request->input('emp_modelo');
        $bateria->car_tipo = $request->input('car_tipo');
        $bateria->car_matricula = $request->input('car_matricula');
        $bateria->save();
        return redirect('baterias')->with('status',"Bateria adicionado com sucesso!");
    }
    public function edit($id)
    {
        $cliente = Cliente::all();
        $bateria = Bateria::find($id);
        return view('admin.bateria.edit', compact('bateria','cliente'));
    }
    public function update(Request $request, $id)
    {
        $bateria = Bateria::find($id);
        $bateria->cliente_id = $request->input('cliente_id');
        $bateria->tipo = $request->input('tipo');
        $bateria->matricula = $request->input('matricula');
        $bateria->emp_marca = $request->input('emp_marca');
        $bateria->emp_modelo = $request->input('emp_modelo');
        $bateria->car_tipo = $request->input('car_tipo');
        $bateria->car_matricula = $request->input('car_matricula');
        $bateria->update();
        return redirect('baterias')->with('status',"Bateria atualizado com sucesso!"); 
    }
    public function destroy($id)
    {
        $bateria = bateria::find($id);
        $bateria->delete();
        return redirect('baterias')->with('status',"Bateria eliminado com sucesso!"); 
    }
}
