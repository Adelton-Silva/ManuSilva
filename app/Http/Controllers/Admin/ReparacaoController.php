<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparacao;
use App\Models\Carregador;
use Illuminate\Support\Facades\Auth;

class ReparacaoController extends Controller
{
    public function index()
    {
        $reparacao = Reparacao::all(); 
        return view('admin.reparacao.index', compact('reparacao')); 
    }
    public function emreparacao()
    {
        $emreparacao = Reparacao::all(); 
        return view('admin.reparacao.emreparacao', compact('emreparacao')); 
    }


    public function add()
    {
        $carregador = Carregador::all();
        return view('admin.reparacao.add', compact('carregador'));
    }

    public function insert(Request $request)
    {
        $reparacao = new Reparacao();
        $reparacao->carregador_id = $request->input('carregador_id');
        $reparacao->user_id = Auth::id();
        $reparacao->relatorio_ativi = $request->input('relatorio_ativi');
        $reparacao->material_gasto = $request->input('material_gasto');
        $reparacao->tempo_gasto = $request->input('tempo_gasto');
        $reparacao->estado = $request->input('estado');
        if ($reparacao->estado == "Teste Final"){
                $reparacao->data_saida = date('d/m/Y H:i');
            } else 
            {
                $reparacao->data_saida = "Em atividade";
            }
        $reparacao->save();
        return redirect('reparacaos')->with('status',"As reparações feitas foram adicionado com sucesso!");
    }

    public function edit($id)
    {
        $reparacao = Reparacao::find($id);
        return view('admin.reparacao.edit', compact('reparacao'));
    }

    public function update(Request $request, $id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->relatorio_ativi = $request->input('relatorio_ativi');
        $reparacao->material_gasto = $request->input('material_gasto');
        $reparacao->tempo_gasto = $request->input('tempo_gasto');
        $reparacao->estado = $request->input('estado');
        if ($reparacao->estado == "Teste Final"){
            $reparacao->data_saida = date('d/m/Y H:i');
        } else 
        {
            $reparacao->data_saida = "Em atividade";
        }
        $reparacao->update();
        return redirect('reparacaos')->with('status',"Dados da reparação atualizado com sucesso!"); 
    }

    public function destroy($id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->delete();
        return redirect('reparacaos')->with('status',"Dados da reparação eliminado com sucesso!"); 
    }

}
