@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Bateria</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-bateria/'.$bateria->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Cliente</label>
                    <select class="form-select" name="cliente_id">
                        <option value="{{$bateria->cliente_id}}">{{$bateria->cliente->name}}</option> 
                        @foreach($cliente as $item)
                             <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tipo</label>
                    <select class="form-select" name="tipo" id="">
                        <option value="{{$bateria->tipo}}">{{$bateria->tipo}}</option>
                        <option value="12V">12V</option>
                        <option value="24V">24V</option>
                        <option value="48V">48V</option>
                        <option value="80V">80V</option>
                        <option value="96V">96V</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Matrícula</label>
                    <input type="text" value="{{$bateria->matricula}}" class="form-control" name="matricula">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Marca do Empilhador</label>
                    <input type="text" value="{{$bateria->emp_marca}}" class="form-control" name="emp_marca">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Modelo do Empilhador</label>
                    <input type="text" value="{{$bateria->emp_modelo}}" class="form-control" name="emp_modelo">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Tipo do Carregador</label>
                    <input type="text" value="{{$bateria->car_tipo}}" name="car_tipo" rows="3" class="form-control"/>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Matrícula da Carregador</label>
                    <input type="text" value="{{$bateria->car_matricula}}" name="car_matricula" rows="3" class="form-control"/>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 