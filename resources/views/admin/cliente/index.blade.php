@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Lista dos Clientes</h4>
        <div class="col-lg-12" style="text-align: right;">
        <a href="{{ url('add-cliente')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</a>
        </div>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">NIF</th>
                    <th style="text-align:center">Nome Empresa</th>
                    <th style="text-align:center">Nome de Contacto</th>
                    <th style="text-align:center">Telefone</th>
                    <th style="text-align:center">Telemóvel</th>
                    <th style="text-align:center">email</th>
                    <th style="text-align:center">Morada</th>
                    <th style="text-align:center">Código Postal</th>
                    <th style="text-align:center">Localidade</th>
                    <th style="text-align:center">País</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente as $item)
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->nif}}</td>
                    <td style="text-align:center">{{$item->name}}</td>
                    <td style="text-align:center">{{$item->name_cont}}</td>
                    <td style="text-align:center">{{$item->telefone}}</td>
                    <td style="text-align:center">{{$item->telemovel}}</td>
                    <td style="text-align:center">{{$item->email}}</td>
                    <td style="text-align:center">{{$item->morada}}</td>
                    <td style="text-align:center">{{$item->cod_pos}}</td>
                    <td style="text-align:center">{{$item->localidade}}</td>
                    <td style="text-align:center">{{$item->pais}}</td>
                    <td style="text-align:center">
                        <a href="{{ url('edit-cliente/'.$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                        <a href="{{ url('delete-cliente/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@section('scripts')
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@endsection