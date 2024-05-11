@extends('layouts.inc.tecnico')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Todos os Carregadores</h4>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Cliente</th>
                    <th style="text-align:center">Marca</th>
                    <th style="text-align:center">Modelo</th>
                    <th style="text-align:center">Num de Série</th>
                    <th style="text-align:center">Des da Avaria</th>
                    <th style="text-align:center">Data Entrada</th>
                    <th style="text-align:center">Imagem</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carregadores as $item)
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->cliente->name}}</td>
                    <td style="text-align:center">{{$item->marca}}</td>
                    <td style="text-align:center">{{$item->modelo}}</td>
                    <td style="text-align:center">{{$item->num_serie}}</td>
                    <td style="text-align:center">{{$item->descri_avaria}}</td>
                    <td style="text-align:center">{{$item->data_entrada}}</td>
                    <td style="text-align:center">
                       <img src="{{asset('assets/uploads/carregador/'.$item->image)}}" class="cate-image" alt="Image here"/>
                    </td> 
                    <td style="text-align:center">
                        <a href="{{ url('tecedit-carregador/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
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