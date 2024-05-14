@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Cliente</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-cliente/'.$cliente->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">NIF</label>
                    <input type="number" value="{{$cliente->nif}}" class="form-control" name="nif">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome Empresa</label>
                    <input type="text" value="{{$cliente->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome de Contacto</label>
                    <input type="text" value="{{$cliente->name_cont}}" class="form-control" name="name_cont">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Telefone</label>
                    <input type="text" value="{{$cliente->telefone}}" class="form-control" name="telefone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Telemóvel</label>
                    <input type="text" value="{{$cliente->telemovel}}" class="form-control" name="telemovel">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="text" value="{{$cliente->email}}" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Morada</label>
                    <input type="text" value="{{$cliente->morada}}" class="form-control" name="morada">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Código Postal</label>
                    <input type="text" value="{{$cliente->cod_pos}}" class="form-control" name="cod_pos">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Localidade</label>
                    <input type="text" value="{{$cliente->localidade}}" class="form-control" name="localidade">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">País</label>
                    <input type="text" value="{{$cliente->pais}}" class="form-control" name="pais">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection