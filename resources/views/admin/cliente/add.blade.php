@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Cliente</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-cliente')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Telefone</label>
                    <input type="text" class="form-control" name="telefone">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Morada</label>
                    <input type="text" class="form-control" name="morada">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection