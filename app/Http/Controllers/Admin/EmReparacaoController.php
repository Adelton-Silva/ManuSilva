<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reparacao;
use App\Models\FolhadeObrareparacao;
use App\Models\Carregador;
use Illuminate\Support\Facades\Auth;

class EmReparacaoController extends Controller
{
    public function emreparacao()
    {
        $emreparacao = Reparacao::all(); 
        return view('admin.reparacao.emreparacao', compact('emreparacao')); 
    }

    public function add()
    {
        $carregador = Carregador::all();
        return view('admin.reparacao.emadd', compact('carregador'));
    }

    public function insert(Request $request)
    {
        $reparacao = new Reparacao();
        $reparacao->carregador_id = $request->input('carregador_id');
        $reparacao->user_id = Auth::id();
        $reparacao->estado = $request->input('estado');
        if ($reparacao->estado == "Teste Final"){
                $reparacao->data_saida = date('d/m/Y H:i');
            } else 
            {
                $reparacao->data_saida = "Em atividade";
            }
        $reparacao->estado_faturacao = "Não Faturado";
        $reparacao->save();
        return redirect('em-reparacaos')->with('status',"Nova reparação iniciada com sucesso!");
    }

    public function edit($id)
    {
        $reparacao = Reparacao::find($id);
        return view('admin.reparacao.emedit', compact('reparacao'));
    }

    public function update(Request $request, $id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->tempo_gasto = $request->input('tempo_gasto');
        $reparacao->estado = $request->input('estado');
        if ($reparacao->estado == "Teste Final"){
            $reparacao->data_saida = date('d/m/Y H:i');
        } else 
        {
            $reparacao->data_saida = "Em atividade";
        }
        $reparacao->update();
        return redirect('em-reparacaos')->with('status',"Dados da reparação atualizado com sucesso!"); 
    }

    public function destroy($id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->delete();
        return redirect('em-reparacaos')->with('status',"Dados da reparação eliminado com sucesso!"); 
    }
    public function edit_faturar($id)
    {
        $reparacao = Reparacao::find($id);
        return view('admin.reparacao.faturar', compact('reparacao'));
    }
    public function faturar(Request $request, $id)
    {
        $reparacao = Reparacao::find($id);
        $reparacao->estado_faturacao = "Faturado";
        $reparacao->update();
        return redirect('em-reparacaos')->with('status',"Dados da reparação atualizado com sucesso!"); 
    }

}
