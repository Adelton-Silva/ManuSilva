@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Bateria</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-baterias')}}" method="POST" enctype="multipart/form-data">
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
                    <label for="">Tipo</label>
                    <select class="form-select" name="tipo" required="true" id="">
                        <option value="">Selecione o Tipo da Bateria</option>
                        <option value="12V">12V</option>
                        <option value="24V">24V</option>
                        <option value="48V">48V</option>
                        <option value="80V">80V</option>
                        <option value="96V">96V</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Matrícula</label>
                    <input type="text" class="form-control" name="matricula" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Marca do Empilhador</label>
                    <input type="text" name="emp_marca" class="form-control" required="true"></input>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Modelo do Empilhador</label>
                    <input type="text" class="form-control" name="emp_modelo" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Tipo do Carregador</label>
                    <input name="car_tipo" rows="3" class="form-control" required="true"></input>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Matrícula do Carregador</label>
                    <input name="car_matricula" rows="3" class="form-control" required="true"></input>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection