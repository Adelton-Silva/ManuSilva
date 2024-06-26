@extends('layouts.inc.tecnico')

@section('content')
<div class="col-md-12">
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Lista de Caregadores para Reparações
        <a href="{{ url('add-tecnico')}}" class="btn btn-sm btn-success float-right"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Adicionar</a>
        </h4>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Carregador</th>
                    <th style="text-align:center">Técnico</th>
                    <th style="text-align:center">Relatório Atividade</th>
                    <th style="text-align:center">Material Gasto</th>
                    <th style="text-align:center">Tempo Gasto</th>
                    <th style="text-align:center">Estado</th>
                    <th style="text-align:center">Data Saída</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tecnico as $item)
                @if($item->estado != "Teste Final")
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->carregador->marca}},&nbsp; &nbsp;{{$item->carregador->num_serie}}</td>
                    <td style="text-align:center">{{$item->user->name}}</td>
                    <td style="text-align:center">{{$item->relatorio_ativi}}</td>
                    <td style="text-align:center">{{$item->material_gasto}}</td>
                    <td style="text-align:center">{{$item->tempo_gasto}}</td>
                    <td style="text-align:center">{{$item->estado}}</td>
                    <td style="text-align:center">{{$item->data_saida}}</td> 
                    <td style="text-align:center">
                        <a href="{{ url('edit-tecnico/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a> 
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
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