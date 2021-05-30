@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Usuário"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes do Usuário" size="12" >
          <div class="row">

            <div class="col-md-6">

              <strong>Código</strong>
              <p class="text-muted">{{$user->id}}</p>
             
              <hr>
              <strong>Nome</strong>
              <p class="text-muted">{{$user->name}}</p>
         
              <hr>
              <strong>Contatos</strong>
              <p class="text-muted">WhatsApp: {{$user->mobile}}</p>
              @if($user->phone)<p class="text-muted">Fixo: {{$user->phone}}</p>@else @endif
              <p class="text-muted">E-mail: {{$user->email}}</p>

              <strong>Endereço</strong>
              <p class="text-muted">{{$user->street}} Nº {{$user->number}}, {{$user->district}} - {{$user->city}}/{{$user->uf}} {{$user->cep}}</p>
              @if($user->complement)
                <strong>Complemento</strong>
                <p class="text-muted">{{$user->complement}}</p>
              @else
              @endif

            </div>

            <div class="col-md-6">
            <map-component address="{{$user->street}} {{$user->number}} {{$user->district}} {{$user->city}} {{$user->uf}} {{$user->cep}}"></map-component>
            </div>
            <div class="col-md-12">
            <div class="modal-footer justify-content">
              <a class="btn btn-outline-info" href="{{route('users.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
              <a class="btn btn-outline-success" href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit"></i>Editar</a>
              <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $user->id }}"><i class="fa fa-trash"></i> Excluir</button>
            </div>
            </div>
          </div>

        </page-card>
      </div>
    </div>
</section>

<modal-component
    name="destroy{{$user->id}}"
    alert="Cuidado!"
    action="{{ route('users.destroy', $user->id)}}"
    message="Tem certeza que deseja excluir o usere"
    note="Ao excluir o usuário você perderá todas as movimentação do mesmo."
    object= '"{{ $user->name }}"?'
    token="{{ csrf_token() }}"
    method="DELETE"
>

</modal-component>
@endsection

