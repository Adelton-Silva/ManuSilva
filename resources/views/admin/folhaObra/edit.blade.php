@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Obra</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-obra/'.$obra->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Data Intervenção</label>
                    <input type="text" value="{{$obra->data_intervencao}}" class="form-control" name="data_intervencao">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Material Gasto</label>
                    <input type="text" value="{{$obra->material_gasto}}" class="form-control" name="material_gasto">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Horas</label>
                    <input type="text" value="{{$obra->horas}}" class="form-control" name="horas">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection