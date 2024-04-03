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
                    <label for="">Nome</label>
                    <input type="text" value="{{$cliente->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Telefone</label>
                    <input type="text" value="{{$cliente->telefone}}" class="form-control" name="telefone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="text" value="{{$cliente->email}}" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Morada</label>
                    <input type="text" value="{{$cliente->morada}}" class="form-control" name="morada">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection