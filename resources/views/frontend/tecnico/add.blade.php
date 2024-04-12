@extends('layouts.inc.tecnico')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Reparação</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-tecnico')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Carregador</label>
                    <select class="form-select" name="carregador_id" required="true">                   
                        <option value="">Selecione o Carregador</option>
                        @foreach($carregador as $item)
                             <option value="{{$item->id}}">{{$item->marca}}, {{$item->num_serie}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Relatório Atividade</label>
                    <textarea name="relatorio_ativi" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Material Gasto</label>
                    <textarea name="material_gasto" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tempo Gasto</label>
                    <input type="time" class="form-control" name="tempo_gasto" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado" required="true">                   
                        <option value="">Selecione o Estado</option>     
                        <option value="Em Teste">Em Teste</option>
                        <option value="A espera do material">A espera do material</option>
                        <option value="Teste Final">Teste Final</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection