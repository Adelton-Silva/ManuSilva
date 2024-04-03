@extends('layouts.inc.front')

@section('title', "Editar avaliação")

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <h5>Você está editando uma avaliação para {{$review->service->name}}</h5>
                        <form action="{{ url('/update-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Escreva uma avaliação">{{ $review->user_review }}</textarea>
                            <button type="submit" class="btn btn-primary mt-3">Editar avaliação</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection