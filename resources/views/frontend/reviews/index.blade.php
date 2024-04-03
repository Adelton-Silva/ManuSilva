@extends('layouts.inc.front')

@section('title', "Escreva uma avaliação")

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                        <h5>Você está escrevendo uma avaliação para {{$service->name}}</h5>
                        <form action="{{ url('/add-review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Escreva uma avaliação"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Salvar avaliação</button>
                        </form>
                    @else
                       <div class="alert alert-danger">
                           <h5>você não está qualificado para avaliar este serviço</h5>
                           <p>
                            Para a confiabilidade das avaliações, apenas os clientes que adquiriram
                             o serviço podem escrever uma avaliação sobre o serviço
                           </p>
                           <a href="{{ url('/') }}" class="btn btn-primary mt-3">ir para a pagina principal </a>
                       </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection