@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Carregador</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('faturar-reparacao/'.$reparacao->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Carregador</label>
                    <select class="form-select">
                        <option value="">{{$reparacao->carregador->marca}}, {{$reparacao->carregador->num_serie}}</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Relatório Atividade</label>
                    <textarea name="relatorio_ativi" rows="3" class="form-control">{{$reparacao->relatorio_ativi}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Material Gasto</label>
                    <textarea name="material_gasto" rows="3" class="form-control">{{$reparacao->material_gasto}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tempo Gasto</label>
                    <input type="time" value="{{$reparacao->tempo_gasto}}" class="form-control" name="tempo_gasto">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado">                   
                        <option value="{{$reparacao->estado}}">{{$reparacao->estado}}</option>     
                        <option value="Em Teste">Em Teste</option>
                        <option value="A espera do material">A espera do material</option>
                        <option value="Teste Final">Teste Final</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Faturar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 