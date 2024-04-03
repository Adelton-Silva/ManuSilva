@extends('layouts.inc.front')

@section('title')
Minha lista de desejos
@endsection

@section('content')


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">
                Home
            </a> /
            <a href="{{ url('wishlist')}}">
                Lista de Desejo
            </a>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow wishlistitems">
        <div class="card-body">
            @if($wishlist->count() > 0)
            @foreach($wishlist as $item)
            <div class="row service_data">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/services/'.$item->services->image)}}" height="70px" width="70px" alt="Image Here">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->services->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->services->selling_price}}$</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="servc_id" value="{{ $item->servc_id }}">
                    @if($item->services->qty >= $item->servc_qty)
                    <h6>Disponivel</h6>
                    <label for="Quantity">Quantidade</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text  decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                        <button class="input-group-text  increment-btn">+</button>
                    </div>
                    @else
                    <h6>De momento o serviço não está disponivel</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add carinho</button>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i> Remover</button>
                </div>
            </div>

            @endforeach
        </div>
        @else
        <h4>A sua lista de desejos está vazia</h4>
        @endif
    </div>
</div>
</div>
@endsection