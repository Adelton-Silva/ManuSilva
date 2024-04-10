@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Carregador</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-carregador/'.$carregador->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Cliente</label>
                    <select class="form-select">
                        <option value="">{{$carregador->cliente->name}}</option> 
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Marca</label>
                    <input type="text" value="{{$carregador->marca}}" class="form-control" name="marca">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Modelo</label>
                    <input type="text" value="{{$carregador->modelo}}" class="form-control" name="modelo">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Número de Série</label>
                    <input type="text" value="{{$carregador->num_serie}}" class="form-control" name="num_serie">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Data Entrada</label>
                    <input type="date" value="{{$carregador->data_entrada}}" class="form-control" name="data_entrada">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Descrição de Avaria</label>
                    <textarea name="descri_avaria" rows="3" class="form-control">{{$carregador->descri_avaria}}</textarea>
                </div>
                @if($carregador->image)
                    <img src="{{asset('assets/uploads/carregador/'.$carregador->image)}}" alt="">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 