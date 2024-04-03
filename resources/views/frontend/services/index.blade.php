@extends('layouts.inc.front')

@section('title')
Serviços
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('category')}}">
            Coleção 
            </a>/
            <a href="{{ url('category/'.$category->slug)}}">
            {{$category->name}} </h6>
            </a> 
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            @foreach($service as $service)
            <div class="col-md-3 mb-3">
                <a href="{{ url('category/'.$category->slug.'/'.$service->slug)}}">
                    <div class="card">

                        <img src="{{asset('assets/uploads/services/'.$service->image)}}" alt="Service image">
                        <div class="card-body">
                            <h5>{{$service->name}}</h5>
                            <span class="float-start">{{$service->selling_price}}$</span>
                            <span class="float-end"> <s>{{$service->original_price}}$</s></span>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection