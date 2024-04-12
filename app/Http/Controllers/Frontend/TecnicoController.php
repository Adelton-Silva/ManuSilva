<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparacao;
use App\Models\Carregador;
use Illuminate\Support\Facades\Auth;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnico = Reparacao::all(); 
        return view('frontend.tecnico.index', compact('tecnico')); 
    }

 public function add()
    {
        $carregador = Carregador::all();
        return view('frontend.tecnico.add', compact('carregador'));
    }

    public function insert(Request $request)
    {
        $tecnico = new Reparacao();
        $tecnico->carregador_id = $request->input('carregador_id');
        $tecnico->user_id = Auth::id();
        $tecnico->relatorio_ativi = $request->input('relatorio_ativi');
        $tecnico->material_gasto = $request->input('material_gasto');
        $tecnico->tempo_gasto = $request->input('tempo_gasto');
        $tecnico->estado = $request->input('estado');
        if ($tecnico->estado == "Teste Final"){
            $tecnico->data_saida = date('d/m/Y H:i');
            } else 
            {
                $tecnico->data_saida = "Em atividade";
            }
            $tecnico->save();
        return redirect('tecnico')->with('status',"As reparações feitas foram adicionado com sucesso!");
    }

    public function edit($id)
    {
        $tecnico = Reparacao::find($id);
        return view('frontend.tecnico.edit', compact('tecnico'));
    }

    public function update(Request $request, $id)
    {
        $tecnico = Reparacao::find($id);
        $tecnico->relatorio_ativi = $request->input('relatorio_ativi');
        $tecnico->material_gasto = $request->input('material_gasto');
        $tecnico->tempo_gasto = $request->input('tempo_gasto');
        $tecnico->estado = $request->input('estado');
        if ($tecnico->estado == "Teste Final"){
            $tecnico->data_saida = date('d/m/Y H:i');
        } else 
        {
            $tecnico->data_saida = "Em atividade";
        }
        $tecnico->update();
        return redirect('tecnico')->with('status',"Dados da reparação atualizado com sucesso!"); 
    }
/*
    public function destroy($id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->delete();
        return redirect('reparacaos')->with('status',"Dados da reparação eliminado com sucesso!"); 
    }*/

}
