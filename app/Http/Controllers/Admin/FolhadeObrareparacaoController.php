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
        return view('admin.folhaObra.index', compact('folha')); 
    }
    public function add()
    {
        $reparacao = Reparacao::all();
        return view('admin.folhaObra.add', compact('reparacao'));
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
        return redirect('/em-reparacaos')->with('status',"Obra adicionada com sucesso!");
    }
    public function destroy($id)
    {
        $cliente = FolhadeObraReparacao::find($id);
        $cliente->delete();
        return redirect('/em-reparacaos')->with('status',"Obra eliminado com sucesso!");
    }
}
