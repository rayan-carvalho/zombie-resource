@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Saída de Recursos"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes da Saída de Recursos" size="12" >
          <div class="row">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th >Código</th>
                  <th>Recurso</th>
                  <th>Usuário</th>
                  <th>Cliente</th>
                  <th>Quantidade</th>
                  <th>Data/Hora</th>
                  <th>Detalhes</th>
                </tr>
                @foreach($sales->sortByDesc('id'); as $sale)
                <tr>
                  <td >{{$sale->id}}</td>
                  <td>{{$sale->resource->name}}</td>
                  <td>{{$sale->user->name}}</td>
                  <td>{{$sale->client->name}}</td>
                  <td > - {{$sale->amount}}</td>
                  <td>{{date('d/m/Y \à\s H:i', strtotime($sale->created_at))}}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{route('sales.edit',$sale->id)}}" data-toggle="tooltip" data-placement="right" title="Editar Entrada de Recurso"><i class="fa fa-edit"></i></a>
                    <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $sale->id }}" data-toggle="tooltip" data-placement="right" title="Excluir Entrada de Recurso"><i class="fa fa-trash"></i> </button>
                  </td>
                  <modal-component
                      name="destroy{{$sale->id}}"
                      alert="Cuidado!"
                      action="{{ route('sales.destroy', $sale->id)}}"
                      message="Tem certeza que deseja excluir a entrada "
                      note=""
                      object= '"N° {{ $sale->id }}"?'
                      token="{{ csrf_token() }}"
                      method="DELETE"
                  >
                  </modal-component>
                </tr>
                @endforeach
              </tbody>
            </table> 
            <div class="col-md-12">
              <div class="modal-footer justify-content">
                <a class="btn btn-outline-info" href="{{route('sales.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>                
              </div>         
          </div>
        </page-card>
      </div>

    </div>
</section>



@endsection

