@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h4 class="text-white">Manutenção das Baterias
        <a href="{{ url('add-manutencao')}}" class="btn btn-sm btn-success float-right"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Adicionar</a>
        </h4>
    </div>
    <div class="table-responsive">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Data</th>
                    <th style="text-align:center">Matrícula</th>
                    <th style="text-align:center">Densidade</th>
                    <th style="text-align:center">Tensão</th>
                    <th style="text-align:center">Nível</th>
                    <th style="text-align:center">Nº Elem Sint Cur. Cir</th>
                    <th style="text-align:center">Terminais Sulfatados</th>
                    <th style="text-align:center">Qnt. Elem subs</th>
                    <th style="text-align:center">Qnt. Term. Subs</th>
                    <th style="text-align:center">Qnt. Uni subs</th>
                    <th style="text-align:center">Estado</th>
                    <th style="text-align:center">Inundada</th>
                    <th style="text-align:center">Furada</th>
                    <th style="text-align:center">Sulfatada</th>
                    <th style="text-align:center">Drenagem da Caixa</th>
                    <th style="text-align:center">Ficha</th>
                    <th style="text-align:center">Carregador</th>
                    <th style="text-align:center">Observação</th>
                    <th style="text-align:center">Técnico</th>
                    <th style="text-align:center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manutencao as $item)
                <tr>
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->data}}</td>
                    <td style="text-align:center">{{$item->bateria->matricula}}</td>
                    <td style="text-align:center">{{$item->densidade}}</td>
                    <td style="text-align:center">{{$item->tensao}}</td>
                    <td style="text-align:center">{{$item->nivel}}</td>
                    <td style="text-align:center">{{$item->num_elemento_cir}}</td>
                    <td style="text-align:center">{{$item->qt_terminais_sul}}</td>
                    <td style="text-align:center">{{$item->qt_substituicao_ele}}</td>
                    <td style="text-align:center">{{$item->qt_substituicao_ter}}</td>
                    <td style="text-align:center">{{$item->qt_substituicao_unioes}}</td>
                    <td style="text-align:center">{{$item->estado}}</td>
                    <td style="text-align:center">{{$item->inundada}}</td>
                    <td style="text-align:center">{{$item->furada}}</td>
                    <td style="text-align:center">{{$item->sulfatada}}</td>
                    <td style="text-align:center">{{$item->drenagem}}</td>
                    <td style="text-align:center">{{$item->ficha}}</td>
                    <td style="text-align:center">{{$item->car_funcionamento}}</td>
                    <td style="text-align:center">{{$item->obs}}</td>
                    <td style="text-align:center">{{$item->user->name}}</td>
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