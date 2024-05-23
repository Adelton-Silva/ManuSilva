@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar a Folha de Obra</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-obra')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <label for="">Caregador</label>
                    <select class="form-select" name="repara_id" required="true">                   
                        <option value="">Selecione o garegador</option>
                        @foreach($reparacao as $item)
                             <option value="{{$item->id}}">{{$item->carregador->marca}}, {{$item->carregador->num_serie}}</option>
                        @endforeach
                    </select>
                <div class="col-md-6 mb-3">
                    <label for="">Data Intervenção</label>
                    <input type="Date" class="form-control" name="data_intervencao" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Material Colocado/Serviço</label>
                    <input type="text" class="form-control" name="material_gasto" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Hora</label>
                    <input type="time" class="form-control" name="horas" required="true">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection