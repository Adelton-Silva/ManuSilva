@extends('layouts.inc.tecnico')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-carregador/')}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="email" value="{{Auth::user()->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
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
                    <label for="">Palavra Passe</label>
                    <input type="text" value="" class="form-control" name="password">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 