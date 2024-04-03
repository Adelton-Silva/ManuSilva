@extends('layouts.admin')

@section('title')
Pedidos
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                   <div class="card-header bg-primary">
                      <h4 class="text-white">Historico de encomendas
                          <a href="{{  'orders' }}" class="btn btn-warning float-right">Novas encomendas</a>
                      </h4> 
                   </div>
                   <div class="table-responsive">
                   <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                           <th style="text-align:center">Data da encomenda</th>
                           <th style="text-align:center">Numero de Rastreio</th>
                           <th style="text-align:center">Preço Total</th>
                           <th style="text-align:center">Status</th>
                           <th style="text-align:center">Ação</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($orders as $item)
                         <tr>
                             <td style="text-align:center"> {{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                             <td style="text-align:center">{{ $item->tracking_no }}</td>
                             <td style="text-align:center">{{ $item->total_price }}</td>
                             <td style="text-align:center">{{ $item->status == '0' ?'pendente' : 'finalizado' }}</td>
                             <td style="text-align:center">
                                 <a href="{{ url('admin/view-order/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Ver</a>
                             </td>
                         </tr>
                       @endforeach
                   </tbody>
               </table>
                   </div>
                   </div>
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