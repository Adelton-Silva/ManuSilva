@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Folha de Obra</h4>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Data de Intervenão</th>
                    <th style="text-align:center">Material Colocado/Serviço</th>
                    <th style="text-align:center">Horas</th>
                    <th style="text-align:center">Realizado Por</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($folha as $item)
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->data_intervencao}}</td>
                    <td style="text-align:center">{{$item->material_gasto}}</td>
                    <td style="text-align:center">{{$item->horas}}</td>
                    <td style="text-align:center">{{$item->realizado_por}}</td>
                    <td style="text-align:center">
                        <a href="{{ url('edit-reparacao/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                        <a href="{{ url('delete-reparacao/'.$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
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