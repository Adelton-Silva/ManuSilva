@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Registar Utilizador</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-user')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Palavra Passe</label>
                    <input type="text" class="form-control" name="password" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Tipo de Utilizador</label>
                    <select class="form-select" name="role_as" required="true">                   
                        <option value="">Selecione o Tipo de Utilizador</option>     
                        <option value="1">Administrador</option>
                        <option value="2">Técnico de Baterias & Carregadores</option>
                        <option value="3">Técnico de Maquinas</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Registar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection