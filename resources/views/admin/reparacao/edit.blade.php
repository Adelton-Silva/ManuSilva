@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Reparação Faturação</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-reparacao/'.$reparacao->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Carregador</label>
                    <select class="form-select">
                        <option value="">{{$reparacao->carregador->marca}}, {{$reparacao->carregador->num_serie}}</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado">                   
                        <option value="{{$reparacao->estado}}">{{$reparacao->estado}}</option>     
                        <option value="Em Teste">Em Teste</option>
                        <option value="A espera do material">A espera do material</option>
                        <option value="Teste Final">Teste Final</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Estado Faturação</label>
                    <select class="form-select" name="estado_faturacao">                   
                        <option value="{{$reparacao->estado_faturacao}}">{{$reparacao->estado_faturacao}}</option>     
                        <option value="Faturado">Faturado</option>
                        <option value="Não Faturado">Não Faturado</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 