@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Adicionar Manutencão</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-manutencao')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Data</label>
                    <input type="date" class="form-control" name="data" required="true">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Matrícula</label>
                    <select class="form-select" name="bateria_id" required="true">                   
                        <option value="">Selecione a Matrícula da Bateria</option>
                        @foreach($bateria as $item)
                             <option value="{{$item->id}}">{{$item->matricula}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Densidade</label>
                    <select class="form-select" name="densidade" required="true" id="">
                        <option value="">Selecione a Densidade da Bateria</option>
                        <option value="Normal">Normal</option>
                        <option value="Irregular">Irregular</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tensão</label>
                    <select class="form-select" name="tensao" required="true" id="">
                        <option value="">Selecione a Tensão da Bateria</option>
                        <option value="Normal">Normal</option>
                        <option value="Irregular">Irregular</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nível</label>
                    <select class="form-select" name="nivel" required="true" id="">
                        <option value="">Selecione o Nível da Bateria</option>
                        <option value="Normal">Normal</option>
                        <option value="Alto">Alto</option>
                        <option value="Baixo">Baixo</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nº Elementos Com Sintomas Curto Circuito</label>
                    <input type="text" class="form-control" name="num_elemento_cir">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Terminais Sulfatados</label>
                    <input type="text" name="qt_terminais_sul" class="form-control"></input>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantidade de Elementos Substituido</label>
                    <input type="text" class="form-control" name="qt_substituicao_ele">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantidade Terminais Substituidos</label>
                    <input name="qt_substituicao_ter" rows="3" class="form-control"></input>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantidade de Uniões Substituidos</label>
                    <input name="qt_substituicao_unioes" rows="3" class="form-control"></input>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado" required="true" id="">
                        <option value="">Selecione o Estado da Bateria</option>
                        <option value="OK">OK</option>
                        <option value="Em Mau Estado">Em Mau Estado</option>
                        <option value="Prever Substituição">Prever Substituição</option>
                        <option value="Em Observação">Em Observação</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Inundada por Eletrólito Devido a Derrames</label>
                    <input  type="checkbox"  name="inundada"  rows="3" class="form-control"></input>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Furada</label>
                    <input  type="checkbox" name="furtada"  rows="3" class="form-control"></input>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Sulfatada</label>
                    <input  type="checkbox" name="sulfatada"  rows="3" class="form-control"></input>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Drenagem da Caixa(Retirar Electrólito e Limpar)</label>
                    <input  type="checkbox" name="drenagem"  rows="3" class="form-control"></input>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Ficha</label>
                    <select class="form-select" name="ficha" required="true" id="">
                        <option value="">Selecione o Estado da Ficha</option>
                        <option value="OK">OK</option>
                        <option value="Danificada">Danificada</option>
                        <option value="Substituída">Substituída</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Carregador</label>
                    <select class="form-select" name="car_funcionamento" required="true" id="">
                        <option value="">Selecione o Estado do Carregador</option>
                        <option value="Funcionamento Normal">Funcionamento Normal</option>
                        <option value="Funcionamento Deficiente">Funcionamento Deficiente</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Observação</label>
                    <textarea name="obs" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection