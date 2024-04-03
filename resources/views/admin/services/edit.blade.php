@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Serviço</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-service/'.$services->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Categoria</label>
                    <select class="form-select">
                        <option value="">{{$services->category->name}}</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nome</label>
                    <input type="text" value="{{$services->name}}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{$services->slug}}" class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Breve Descrição</label>
                    <textarea name="small_description" rows="3" class="form-control">{{$services->small_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Descrição</label>
                    <textarea name="description" rows="3" class="form-control">{{$services->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Preço</label>
                    <input type="number" value="{{$services->original_price}}" class="form-control" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <!--<label for="">Preço com desconto</label>
                    <input type="number" value="{{$services->selling_price}}" class="form-control" name="selling_price">-->
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Taxa</label>
                    <input type="number" value="{{$services->tax}}" class="form-control" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantidade</label>
                    <input type="number" value="{{$services->qty}}" class="form-control" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$services->status ? 'checked':''}} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{$services->trending ? 'checked':''}} name="trending">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Titulo</label>
                    <input type="text" value="{{$services->meta_title}}" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Palavras-Chave</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{$services->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Descrição</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{$services->meta_description}}</textarea>
                </div>
                @if($services->image)
                    <img src="{{asset('assets/uploads/services/'.$services->image)}}" alt="">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 