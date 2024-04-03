@extends('layouts.inc.front')

@section('title')
Meu Carinho
@endsection

@section('content')


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">
                Home
            </a> /
            <a href="{{ url('cart')}}">
                Carinho
            </a>
    </div>
</div>

<div class="container my-6">
    <div class="card shadow cartitems">
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitems as $item)
            <div class="row service_data">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/services/'.$item->services->image)}}" height="70px" width="70px" alt="Image Here">
                </div>
                <div class="col-md-1 my-auto">
                    <h6>{{ $item->services->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->services->selling_price}}$</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->checkin_date}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->checkout_date}}</h6>
                </div>
                <div class="col-md-1 my-auto">
                    <input type="hidden" class="servc_id" value="{{ $item->servc_id }}">
                    @if($item->services->qty >= $item->servc_qty)
                    <label for="Quantity">Quantidade</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->servc_qty }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                     @php $total += $item->services->selling_price * $item->servc_qty; @endphp
                     @else
                        <h6>De momento o serviço não está disponivel</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item float-end"> <i class="fa fa-trash"></i> Remover</button>
                </div>
            </div>
           
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Preço Total : {{ $total }} ECV
            <a href="{{ url('checkout')}}" class="btn btn-outline-success float-end">Prosseguir Checkout</a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Seu <i class="fa fa-shopping-cart"> Carinho está vazio</i></h2>
            <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue procurando</a>
        </div>
        @endif
    </div>
</div>
@endsection