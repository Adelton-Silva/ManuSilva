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
                    <h4 class="text-white">Vista de pedidos
                        <a href="{{ url('my-orders') }}" class="btn btn-warning  float-end">Voltar</a>
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
                                        <th>Nome</th>
                                        <th>Data in</th>
                                        <th>Data ter</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Imagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                       <td>{{ $item->services->name}}</td>
                                       <td>{{ date('d-m-Y', strtotime($item->checkin_date)) }}</td>
                                       <td>{{ date('d-m-Y', strtotime($item->checkout_date)) }}</td>
                                       <td>{{ $item->qty}}</td>
                                       <td>{{ $item->price}}$</td>
                                       <td>
                                           <img src="{{ asset('assets/uploads/services/'.$item->services->image)}}" width="70px" alt="Imagem servico">
                                       </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Total Geral: <span class="float-end">{{ $orders->total_price}}$</span></h4>
                            <h6 class="px-2">Modo de pagamento: {{ $orders->payment_mode}}</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection