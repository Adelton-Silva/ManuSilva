@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Categoria</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" required="true">
                </div>
                <div class="col-md-12 mb-3">
                <label for="">Descrição</label>
                    <textarea name="description" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" required="true">Meta Titulo</label>
                    <input type="text" class="form-control" name="meta_title" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Palavras-Chave</label>
                    <textarea name="meta_keywords" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Descrição</label>
                    <textarea name="meta_descrip" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" required="true">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection