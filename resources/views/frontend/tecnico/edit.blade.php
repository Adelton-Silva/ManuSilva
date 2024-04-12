@extends('layouts.inc.tecnico')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Carregador</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-tecnico/'.$tecnico->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Carregador</label>
                    <select class="form-select">
                        <option value="">{{$tecnico->carregador->marca}}, {{$tecnico->carregador->num_serie}}</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Relatório Atividade</label>
                    <textarea name="relatorio_ativi" rows="3" class="form-control">{{$tecnico->relatorio_ativi}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Material Gasto</label>
                    <textarea name="material_gasto" rows="3" class="form-control">{{$tecnico->material_gasto}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tempo Gasto</label>
                    <input type="time" value="{{$tecnico->tempo_gasto}}" class="form-control" name="tempo_gasto">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado">                   
                        <option value="{{$tecnico->estado}}">{{$tecnico->estado}}</option>     
                        <option value="Em Teste">Em Teste</option>
                        <option value="A espera do material">A espera do material</option>
                        <option value="Teste Final">Teste Final</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 