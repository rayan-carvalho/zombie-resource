@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Recursos"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes do Produto" size="12" >
          <div class="row">

            <div class="col-md-6">

              <strong>Código</strong>
              <p class="text-muted">{{$resource->id}}</p>
              <hr>

              <strong>Nome</strong>
              <p class="text-muted">{{$resource->name}}</p>
              
              @if($resource->description)  
                <hr>           
                <strong>Descrição</strong>
                <p class="text-muted">{!! $resource->description !!}</p>           
              @else
                <hr>           
                <strong>Descrição</strong>
                <p class="text-muted">Sem descrição.</p>   
         
              @endif

              @if($resource->note)  
                <hr> 
                <strong>Observações</strong>
                <p class="text-muted">{!! $resource->note !!}</p>
                @else
                <hr>           
                <strong>Observações</strong>
                <p class="text-muted">Sem observações.</p>   
              @endif


            </div>

            <div class="col-md-6">
                <strong>Estoque Mínimo</strong>
                <p class="text-muted">{{$resource->minimum}}</p>
                <hr>               

                <strong>Categoria</strong>
                <p class="text-muted">{{$resource->category->name}}</p>
                <hr>

                <strong>Imagem</strong>
                <p class="text-muted">
                      @if( $resource->image )
                          <img class="margin" src="{{url('storage/'.$resource->image)}}"  height="120" width="120">
                      @else  
                          <img class="margin" src="{{url('storage/image-not-found.png')}}"  height="120" width="120">    
                      @endif
                </p>

            </div>

            <div class="col-md-12">
            <div class="modal-footer justify-content">
              <a class="btn btn-outline-info" href="{{route('resources.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
              <a class="btn btn-outline-success" href="{{route('resources.edit',$resource->id)}}"><i class="fa fa-edit"></i>Editar</a>
              <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $resource->id }}"><i class="fa fa-trash"></i> Excluir</button>
            </div>
            </div>
          </div>

        </page-card>
      </div>

    </div>
</section>

<modal-component
    name="destroy{{$resource->id}}"
    alert="Cuidado!"
    action="{{ route('resources.destroy', $resource->id)}}"
    message="Tem certeza que deseja excluir o produto"
    note="Ao excluir o produto você perderá todas as movimentação do mesmo."
    object= '"{{ $resource->name }}"?'
    token="{{ csrf_token() }}"
    method="DELETE"
>
</modal-component>
@endsection

