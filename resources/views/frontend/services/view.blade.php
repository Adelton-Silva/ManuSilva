@extends('layouts.inc.front')

@section('title', $services->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $services->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Avalie {{ $services->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Coleção
                </a> /
                <a href="{{ url('category/' . $services->category->slug) }}">
                    {{ $services->category->name }}
                </a> /
                <a href="{{ url('category/' . $services->category->slug . '/' . $services->slug) }}">
                    {{ $services->name }}
            </h6>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="card shadow service_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/services/' . $services->image) }}" class="w-100"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $services->name }}
                            @if ($services->trending == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">Tendência</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Preço : <s>{{ $services->original_price }}$</s> </label>
                        <label class="fw-bold">Preço com Desconto : {{ $services->selling_price }}$ </label>
                        @php
                            $ratenum = number_format($rating_value);
                        @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count() > 0)
                                    {{ $ratings->count() }} Avaliações
                                @else
                                    Nenhuma Avaliação
                                @endif

                            </span>
                        </div>

                        <p class="mt-3">
                            {!! $services->small_description !!}
                        </p>
                        <hr>
                        @if ($services->qty > 0)
                            <label class="badge bg-success">Disponivel</label>
                        @else
                            <label class="badge bg-danger">Indisponivel</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <label for="Checkin_date">Data de inicio</label>
                                <input type="date" name="checkin_date" class="form-control checkin_date checkindate">
                            </div>
                            <div class="col-md-3">
                                <label for="Checkout_date">Data de termino</label>
                                <input type="date" name="checkout_date" class="form-control checkout_date checkoutdate">
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $services->id }}" class="servc_id">
                                <label for="Quantity">Quantidade</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="1" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br />
                                @if ($services->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Adicionar <i
                                            class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Adicionar a
                                    Lista de desejo <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3>Descrição</h3>
                        <p class="mt-3">
                            {!! $services->description !!}
                        </p>


                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Avalie este serviço
                        </button>
                        <a href="{{ url('add-review/' . $services->slug . '/userreview') }}" class="btn btn-link">
                            Escreva uma avaliação
                        </a>
                    </div>
                    <div class="col-md-8">
                        @foreach ($reviews as $item)
                        <div class="user-review">
                            <label for="">{{ $item->user->name.' '.$item->user->lname }}</label>
                            @if ($item->user_id == Auth::id())
                               <a href="{{ url('edit-review/'.$services->slug.'/userreview') }}">Editar</a>
                            @endif                           
                            <br>
                            @php
                                $rating = App\Models\Rating::where('servc_id', $services->id)->where('user_id', $item->user_id)->first();
                            @endphp
                            @if ($rating)
                            @php
                                $user_rated = $rating->stars_rated
                            @endphp
                            @for ($i = 1; $i <= $user_rated; $i++)
                               <i class="fa fa-star checked"></i>
                             @endfor
                             @for ($j =  $user_rated + 1; $j <= 5; $j++)
                               <i class="fa fa-star"></i>
                             @endfor
                            @endif
                            <small>Avaliado {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>
                        </div>    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $(".checkindate").on('blur', function(){
            var _checkindate= $(this).val();
            console.log(_checkindate);
        })
    });
    </script>
    @endsection
@endsection
