<?php

namespace App\Http\Controllers\Admin;

use App\Models\ManutencaoBateria;
use App\Models\Bateria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManutencaoBateriaController extends Controller
{
    public function index()
    {
        $manutencao = ManutencaoBateria::all();
        return view('admin.manutencao.index', compact('manutencao'));
    }
    public function add()
    {
        $bateria = Bateria::all();
        return view('admin.manutencao.add', compact('bateria'));
    }
    public function insert(Request $request)
    {
        $manutencao = new ManutencaoBateria();
        $manutencao->data = $request->input('data');
        $manutencao->bateria_id = $request->input('bateria_id');
        $manutencao->densidade = $request->input('densidade');
        $manutencao->tensao = $request->input('tensao');
        $manutencao->nivel = $request->input('nivel');
        $manutencao->num_elemento_cir = $request->input('num_elemento_cir');
        $manutencao->qt_terminais_sul = $request->input('qt_terminais_sul');
        $manutencao->qt_substituicao_ele = $request->input('qt_substituicao_ele');
        $manutencao->qt_substituicao_ter = $request->input('qt_substituicao_ter');
        $manutencao->qt_substituicao_unioes = $request->input('qt_substituicao_unioes');
        $manutencao->estado = $request->input('estado');
        $manutencao->inundada = $request->input('inundada') == TRUE ? 'SIM':'NÃO';
        $manutencao->furada = $request->input('furada') == TRUE ? 'SIM':'NÃO';
        $manutencao->sulfatada = $request->input('sulfatada') == TRUE ? 'SIM':'NÃO';
        $manutencao->drenagem = $request->input('drenagem')== TRUE ? 'SIM':'NÃO';
        $manutencao->ficha = $request->input('ficha');
        $manutencao->car_funcionamento = $request->input('car_funcionamento');
        $manutencao->obs = $request->input('obs');
        $manutencao->user_id = Auth::id();
        $manutencao->save();
        return redirect('manutencao')->with('status',"Bateria adicionado com sucesso!");
    }
}
