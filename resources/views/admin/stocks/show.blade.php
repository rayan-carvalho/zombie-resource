@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Entrada de Recursos"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes da Entrada de Recursos" size="12" >
          <div class="row">
            @if($stocks->count() > 0)
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th >Código</th>
                  <th>Recurso</th>
                  <th>Usuário</th>
                  <th>Quantidade</th>
                  <th>Data/Hora</th>
                  <th>Detalhes</th>
                </tr>
                @foreach($stocks->sortByDesc('id'); as $stock)
                <tr>
                  <td >{{$stock->id}}</td>
                  <td>{{$stock->resource->name}}</td>
                  <td>{{$stock->user->name}}</td>
                  <td >{{$stock->amount}}</td>
                  <td>{{date('d/m/Y \à\s H:i', strtotime($stock->created_at))}}</td>
                  <td>
                    <a class="btn btn-outline-success" href="{{route('stocks.edit',$stock->id)}}" data-toggle="tooltip" data-placement="right" title="Editar Entrada de Recurso"><i class="fa fa-edit"></i></a>
                    <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $stock->id }}" data-toggle="tooltip" data-placement="right" title="Excluir Entrada de Recurso"><i class="fa fa-trash"></i> </button>
                  </td>
                  <modal-component
                      name="destroy{{$stock->id}}"
                      alert="Cuidado!"
                      action="{{ route('stocks.destroy', $stock->id)}}"
                      message="Tem certeza que deseja excluir a entrada "
                      note=""
                      object= '"N° {{ $stock->id }}"?'
                      token="{{ csrf_token() }}"
                      method="DELETE"
                  >
                  </modal-component>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
              <div align="center">
                <div class="alert alert-warning" role="alert">
                    Não existem entradas de recursos cadastrados.
                </div>
              </div>
            @endif
            <div class="col-md-12">
              <div class="modal-footer justify-content">
                <a class="btn btn-outline-info" href="{{route('stocks.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>                
              </div>         
          </div>
        </page-card>
      </div>

    </div>
</section>



@endsection

