@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Serviço</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-service')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Categoria</label>
                    <select class="form-select" name="cate_id" required="true">                   
                        <option value="">Selecione uma Categoria</option>
                        @foreach($category as $item)
                             <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Breve Descrição</label>
                    <textarea name="small_description" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Descrição</label>
                    <textarea name="description" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Preço</label>
                    <input type="number" class="form-control" name="original_price" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <!--<label for="">Preço com desconto</label>
                    <input type="number" class="form-control" name="selling_price" required="true">-->
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Taxa</label>
                    <input type="number" class="form-control" name="tax" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantidade</label>
                    <input type="number" class="form-control" name="qty" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Titulo</label>
                    <input type="text" class="form-control" name="meta_title"required="true">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Palavras-Chave</label>
                    <textarea name="meta_keywords" rows="3" class="form-control" required="true"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Descrição</label>
                    <textarea name="meta_description" rows="3" class="form-control" required="true"></textarea>
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