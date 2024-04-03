@extends('layouts.inc.front')

@section('title')
    Meus pedidos
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Meus pedidos</h4>
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Data de pedido</th>
                                        <th style="text-align:center">Numero de Rastreio</th>
                                        <th style="text-align:center">Preço Total</th>
                                        <th style="text-align:center">Status</th>
                                        <th style="text-align:center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td style="text-align:center"> {{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td style="text-align:center">{{ $item->tracking_no }}</td>
                                            <td style="text-align:center">{{ $item->total_price }}$</td>
                                            <td style="text-align:center">{{ $item->status == '0' ? 'pendente' : 'finalizado' }}</td>
                                            <td style="text-align:center">
                                                <a href="{{ url('view-order/' . $item->id) }}" class="btn btn-success">Ver</a>
                                                <a href="{{ url('edit-order/' . $item->id) }}" class="btn btn-primary">Editar</a>
                                                <a href="{{ url('delete-order/'.$item->id)}}" class="btn btn-danger">Cancelar</a>
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
