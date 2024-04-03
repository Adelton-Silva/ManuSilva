@extends('layouts.admin')

@section('title')
Pedidos
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  bg-primary">
                    <h4 class="text-white">Vista de pedidos
                        <a href="{{ url('orders') }}" class="btn btn-warning  float-right">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 order-details">
                            <h4>Detalhes de entrega de Serviço</h4>
                            <hr>
                            <label for="">Nome</label>
                            <div class="border">{{ $orders->fname}}</div>
                            <label for="">Apelido</label>
                            <div class="border">{{ $orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{ $orders->email}}</div>
                            <label for="">Telefone</label>
                            <div class="border">{{ $orders->phone}}</div>
                            <label for="">Endereço</label>
                            <div class="border">
                                {{ $orders->address1}}, <br>
                                {{ $orders->address2}}, <br>
                                {{ $orders->city}}, <br>
                                {{ $orders->island}},
                                {{ $orders->country}},
                            </div>
                            <label for="">Codigo Postal</label>
                            <div class="border ">{{ $orders->pincode}}</div>
                        </div>
                        <div class="col-md-8">
                            <h4>Detalhes do pedido</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nome</th>
                                        <th style="text-align:center">Data in</th>
                                        <th style="text-align:center">Data ter</th>
                                        <th style="text-align:center">Quantidade</th>
                                        <th style="text-align:center">Preço</th>
                                        <th style="text-align:center">Imagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                        <td style="text-align:center">{{ $item->services->name}}</td>
                                        <td style="text-align:center">{{ $item->checkin_date}}</td>
                                        <td style="text-align:center">{{ $item->checkout_date}}</td>
                                        <td style="text-align:center">{{ $item->qty}}</td>
                                        <td style="text-align:center">{{ $item->price}}</td>
                                        <td style="text-align:center">
                                            <img src="{{ asset('assets/uploads/services/'.$item->services->image)}}" width="70px" alt="Imagem servico">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Total Geral: <span class="float-end">{{ $orders->total_price}}</span></h4>
                            <div class="mt-5 px-2">
                                <label for="">Status do pedido</label>
                                <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">
                                        <option {{$orders->status == '0'? 'selected':''}} value="0">Pendente</option>
                                        <option {{$orders->status == '1'? 'selected':''}} value="1">Finalizado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary float-end mt-3">Atualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection