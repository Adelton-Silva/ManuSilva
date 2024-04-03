@extends('layouts.inc.front')

@section('title')
Meus pedidos
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  bg-primary">
                    <h4 class="text-white">Edirar meu pedido
                        <a href="{{ url('my-orders') }}" class="btn btn-warning  float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-orders/'.$ordersedit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Nome</label>
                                <input type="text" value="{{$ordersedit->fname}}" class="form-control" name="fname">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Apelido</label>
                                <input type="text" value="{{$ordersedit->lname}}" class="form-control" name="lname">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" value="{{$ordersedit->email}}" class="form-control" name="email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Telefone</label>
                                <input type="text" value="{{$ordersedit->phone}}" class="form-control" name="phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Endereço 1</label>
                                <input type="text" value="{{$ordersedit->address1}}" class="form-control" name="address1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Endereço 2</label>
                                <input type="text" value="{{$ordersedit->address2}}" class="form-control" name="address2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Cidade</label>
                                <input type="text" value="{{$ordersedit->city}}" class="form-control" name="city">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Ilha</label>
                                <input type="text" value="{{$ordersedit->island}}" class="form-control" name="island">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Pais</label>
                                <input type="text" value="{{$ordersedit->country}}" class="form-control" name="country">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Codigo Postal</label>
                                <input type="text" value="{{$ordersedit->pincode}}" class="form-control" name="pincode">
                            </div>
                           
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection