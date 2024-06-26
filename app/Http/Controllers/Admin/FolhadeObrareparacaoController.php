<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FolhadeObrareparacao;
use App\Models\Reparacao;
use Illuminate\Support\Facades\Auth;

class FolhadeObrareparacaoController extends Controller
{
    public function index($id)
    {
        $folha = FolhadeObraReparacao::where('repara_id', $id)->get();
        $total = 0;
        $main_Id = $id;
        foreach($folha as $somaHora){
            $total = $total + $somaHora->horas;
        }
        //$total = FolhadeObraReparacao::where('repara_id', $id)->selectRaw('SUM(horas) AS total_hora');
        return view('admin.folhaObra.index', compact('folha', 'total', 'main_Id')); 
    }
    public function indexfactura($id)
    {
        $reparacao = Reparacao::all();
        $folha = FolhadeObraReparacao::where('repara_id', $id)->get();
        $total = 0;
        foreach($folha as $somaHora){
            $total = $total + $somaHora->horas;
        }
        //$total = FolhadeObraReparacao::where('repara_id', $id)->selectRaw('SUM(horas) AS total_hora');
        return view('admin.folhaObra.faturarObra', compact('folha', 'total','reparacao'));  
    }
    public function add($id)
    {
        $reparacao = Reparacao::all();
        $rep_id = $id;
        return view('admin.folhaObra.add', compact('reparacao', 'rep_id'));
    }
    public function insert(Request $request)
    {
        $folha = new FolhadeObraReparacao();
        $folha->repara_id = $request->input('repara_id');
        $folha->data_intervencao = $request->input('data_intervencao');
        $folha->material_gasto = $request->input('material_gasto');
        $folha->horas = $request->input('horas');
        $folha->relizado_por = Auth::id();
        $folha->save();
        $link= "/obra"."/".$folha->repara_id;
        return redirect($link)->with('status',"Obra adicionada com sucesso!");
    }
    public function destroy($id)
    {
        $obra = FolhadeObraReparacao::find($id);
        $obra->delete();
        $link= "/obra"."/".$obra->repara_id;
        return redirect($link)->with('status',"Obra eliminado com sucesso!");
    }

    public function edit($id)
    {
        $obra = FolhadeObraReparacao::find($id);
        return view('admin.folhaObra.edit', compact('obra'));
    }
    public function update(Request $request, $id)
    {
        $obra = FolhadeObraReparacao::find($id);
        $link= "/obra"."/".$obra->repara_id;
        if(Auth::id() == $obra->relizado_por)
        {
        $obra->data_intervencao = $request->input('data_intervencao');
        $obra->material_gasto = $request->input('material_gasto');
        $obra->horas = $request->input('horas');
        $obra->update();
        return redirect($link)->with('status',"Dados da obra atualizado com sucesso!"); 
        }
        else {
            return redirect($link)->with('status',"Não tem permissão para editar esta obra uma vez que não és o autor!"); 
        }
    }
}
