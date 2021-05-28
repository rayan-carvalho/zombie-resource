@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Categorias"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes da Categoria" size="12" >
          <div class="row">

            <div class="col-md-12">

              <strong>Código</strong>
              <p class="text-muted">{{$category->id}}</p>
              <hr>

              <strong>Nome</strong>
              <p class="text-muted">{{$category->name}}</p>

              <hr>

              <strong>Descrição</strong>
              <p class="text-muted">{!! $category->description !!}</p>

            </div>


            <div class="col-md-12">
            <div class="modal-footer justify-content">
              <a class="btn btn-outline-info" href="{{route('categories.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
              <a class="btn btn-outline-success" href="{{route('categories.edit',$category->id)}}"><i class="fa fa-edit"></i>Editar</a>
              <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $category->id }}"><i class="fa fa-trash"></i> Excluir</button>
            </div>
            </div>
          </div>

        </page-card>
      </div>

    </div>
</section>

<modal-component
    name="destroy{{$category->id}}"
    alert="Cuidado!"
    action="{{ route('categories.destroy', $category->id)}}"
    message="Tem certeza que deseja excluir a categoria"
    note="Ao excluir a categoria você perderá todas as movimentação da mesma."
    object= '"{{ $category->name }}"?'
    token="{{ csrf_token() }}"
    method="DELETE"
>

</modal-component>
@endsection

