@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Todas as Baterias
        <a href="{{ url('add-bateria')}}" class="btn btn-sm btn-success float-right"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Adicionar</a>
        </h4>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Cliente</th>
                    <th style="text-align:center">Tipo</th>
                    <th style="text-align:center">Matrícula</th>
                    <th style="text-align:center">Marca Empilhador</th>
                    <th style="text-align:center">Modelo Empilhador</th>
                    <th style="text-align:center">Tipo Carregador</th>
                    <th style="text-align:center">Matrícula Carregador</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($baterias as $item)
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->cliente->name}}</td>
                    <td style="text-align:center">{{$item->tipo}}</td>
                    <td style="text-align:center">{{$item->matricula}}</td>
                    <td style="text-align:center">{{$item->emp_marca}}</td>
                    <td style="text-align:center">{{$item->emp_modelo}}</td>
                    <td style="text-align:center">{{$item->car_tipo}}</td>
                    <td style="text-align:center">{{$item->car_matricula}}</td>
                    <td style="text-align:center">
                        <a href="{{ url('edit-bateria/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                        <a href="{{ url('delete-bateria/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
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