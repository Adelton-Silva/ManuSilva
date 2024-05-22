@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Detalhes de Utilizador
                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-12 mt-3">
                            <label for="">Role</label>
                            @if($users->role_as == 1)
                                <input type="text" value="Administrador" class="form-control" name="role_as">
                            @elseif($users->role_as == 2)
                                <input type="text" value="Técinico Baterias e Carregadores" class="form-control" name="role_as" disabled="">
                            @else
                                <input type="text" value="Técinico de Maquinas" class="form-control" name="role_as" disabled="">
                            @endif
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Nome</label>
                            <input type="text" value="{{$users->name}}" class="form-control" name="name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Apelido</label>
                            <input type="text" value="{{$users->lname}}" class="form-control" name="lname">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" value="{{$users->email}}" class="form-control" name="email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Telefone</label>
                            <input type="text" value="{{$users->telefone}}" class="form-control" name="telefone">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Morada</label>
                            <input type="text" value="{{$users->morada}}" class="form-control" name="morada">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Codigo postal</label>
                            <input type="text" value="{{$users->cod_pos}}" class="form-control" name="cod_pos">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Cidade</label>
                            <input type="text" value="{{$users->cidade}}" class="form-control" name="cidade">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Destrito</label>
                            <input type="text" value="{{$users->destrito}}" class="form-control" name="destrito">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">País</label>
                            <input type="text" value="{{$users->pais}}" class="form-control" name="pais">
                        </div>
                    </div>
                </div>
            </div>
@endsection