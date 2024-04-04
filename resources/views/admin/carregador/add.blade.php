@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Carregador</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-carregador')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Cliente</label>
                    <select class="form-select" name="cliente_id" required="true">                   
                        <option value="">Selecione o Cliente</option>
                        @foreach($cliente as $item)
                             <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Marca</label>
                    <input type="text" class="form-control" name="marca" required="true"> 
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Modelo</label>
                    <input type="text" class="form-control" name="modelo" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Número de Série</label>
                    <input type="text" name="num_serie" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Data Entrada</label>
                    <input type="date" class="form-control" name="data_entrada" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Descrição Avaria</label>
                    <textarea name="descri_avaria" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Relatório Atividade</label>
                    <textarea name="descri_atividade" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Data Saída</label>
                    <input type="date" class="form-control" name="data_saida">
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection