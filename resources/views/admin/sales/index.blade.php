@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Saída de Recursos"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Saída de Recursos" size="12" url="{{route('sales.create')}}">
         @if($resources->count() > 0)
            <table class="table table-sm table-striped" id="table"  >
              <thead>
                  <tr>
                      <th>Código</th>
                      <th>Recurso</th>
                      <th>Categoria</th>
                      <th>Quantidade</th>
                      <th>Detalhes</th>
                  </tr>
              </thead>
        
              <tbody>
                 @foreach ($resources as $resource)
                  <tr> 
                    <td>{{ $resource->id }}</a></td>
                    <td> @if($resource->image != null) <img src="{{ url('storage/'.$resource->image) }}"  class="img-circle" width="60" height="60"> @else <img src="{{url('storage/image-not-found.png')}}"  class="img-circle" width="60" height="60">  @endif &nbsp {{ $resource->name }}</a></td>
                    <td>{{ $resource->category }}</a></td>
                    <td>{{ $resource->amount }}</a></td>    
                    <td>
                      <a class="btn btn-outline-info btn-sm" a href="{{route('sales.show',$resource->id)}}"  data-toggle="tooltip" data-placement="right" title="Detalhes do Recurso"><i class="fa fa-eye"></i></a>                                   
                    </td>
                  </tr>
             
                 @endforeach
              </tbody>
          </table>
        @else
          <div align="center">
            <div class="alert alert-warning" role="alert">
                Não existem saídas de recursos cadastrados.
            </div>
          </div>
        @endif
        </page-card>
      </div>
  </div>
</section>

@endsection
@section('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
  $(function() {$('#table').DataTable({
    "oLanguage": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ Mostrar",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Buscar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
    },
    order: [[ 0, this.order ]],
    destroy: true});});
 </script>
@endsection
