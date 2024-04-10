@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Detalhes de users
                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{$users->role_as == '0'? 'User':'Admin'}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Nome</label>
                            <div class="p-2 border">{{$users->name}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Apelido</label>
                            <div class="p-2 border">{{$users->lname}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Telefone</label>
                            <div class="p-2 border">{{$users->phone}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Endereço 1</label>
                            <div class="p-2 border">{{$users->address1}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Endereço 2</label>
                            <div class="p-2 border">{{$users->address2}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Cidade</label>
                            <div class="p-2 border">{{$users->city}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Ilha</label>
                            <div class="p-2 border">{{$users->state}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">País</label>
                            <div class="p-2 border">{{$users->country}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Codigo postal</label>
                            <div class="p-2 border">{{$users->pincode}}</div>
                        </div>
                    </div>
                </div>
            </div>
@endsection