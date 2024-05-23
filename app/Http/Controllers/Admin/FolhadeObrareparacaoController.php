<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FolhadeObrareparacao;
use App\Models\Reparacao;

class FolhadeObrareparacaoController extends Controller
{
    public function index($id)
    {
        $folha = FolhadeObraReparacao::all();
        if($folha->repara_id == $id){
        return view('admin.folhaObra.index', compact('folha')); 
    }
    }
}
