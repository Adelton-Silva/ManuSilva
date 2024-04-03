<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carregador;
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
}
