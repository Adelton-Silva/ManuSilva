@extends('layouts.inc.tecnico')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Profile</h4>
    </div>
    <div class="card-body">
    <form action="" method="GET" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-12 mb-3">
                <label for="">Role</label>
                @if(Auth::user()->role_as == 1)
                    <input type="text" value="Administrador" class="form-control" name="role_as" disabled="">
                    @elseif(Auth::user()->role_as == 2)
                    <input type="text" value="Técinico Baterias e Carregadores" class="form-control" name="role_as" disabled="">
                    @else
                    <input type="text" value="Técinico de Maquinas" class="form-control" name="role_as" disabled="">
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" value="{{Auth::user()->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Apelido</label>
                    <input type="text" value="{{Auth::user()->lname}}" class="form-control" name="lname">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Telefone</label>
                    <input type="text" value="{{Auth::user()->telefone}}" class="form-control" name="telefone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Morada</label>
                    <input type="text" value="{{Auth::user()->morada}}" class="form-control" name="morada">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Código Postal</label>
                    <input type="text" value="{{Auth::user()->cod_pos}}" class="form-control" name="cod_pos">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Cidade</label>
                    <input type="text" value="{{Auth::user()->cidade}}" class="form-control" name="cidade">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Destrito</label>
                    <input type="text" value="{{Auth::user()->destrito}}" class="form-control" name="destrito">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">País</label>
                    <input type="text" value="{{Auth::user()->pais}}" class="form-control" name="pais">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Palavra Passe</label>
                    <input type="text" value="" class="form-control" name="password">
                </div>
                <div class="col-md-12">
                <a href="{{ url('edit-profiletec/'.Auth::user()->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 