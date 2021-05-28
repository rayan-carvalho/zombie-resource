@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Clientes"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes do Cliente" size="12" >
          <div class="row">

            <div class="col-md-6">

              <strong>Código</strong>
              <p class="text-muted">{{$client->id}}</p>
              <hr>

              <strong>Nome</strong>
              <p class="text-muted">{{$person->name}}</p>
              @if($person->physicalPerson)
                <strong>CPF</strong>
                <p class="text-muted">{{$person->physicalPerson->cpf}}</p>
              @elseif($person->legalPerson)
                <strong>CNPJ</strong>
                <p class="text-muted">{{$person->legalPerson->cnpj}}</p>
              @endif
              <hr>

              <strong>Contatos</strong>
              <p class="text-muted">WhatsApp: {{$person->mobile}}</p>
              @if($person->phone)<p class="text-muted">Fixo: {{$person->phone}}</p>@else @endif
              <p class="text-muted">E-mail: {{$person->email}}</p>

              <strong>Endereço</strong>
              <p class="text-muted">{{$person->street}} Nº {{$person->number}}, {{$person->district}} - {{$person->city}}/{{$person->uf}} {{$person->cep}}</p>
              @if($person->complement)<p class="text-muted"><b>{{$person->complement}}</b></p>@else @endif

            </div>

            <div class="col-md-6">
            <map-component address="{{$person->street}} {{$person->number}} {{$person->district}} {{$person->city}} {{$person->uf}} {{$person->cep}}"></map-component>
            </div>
            <div class="col-md-12">
            <div class="modal-footer justify-content">
              <a class="btn btn-outline-info" href="{{route('clients.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
              <a class="btn btn-outline-success" href="{{route('clients.edit',$client->id)}}"><i class="fa fa-edit"></i>Editar</a>
              <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $client->id }}"><i class="fa fa-trash"></i> Excluir</button>
            </div>
            </div>
          </div>

        </page-card>
      </div>
      <div class="row">
        <page-card title="Informações de compras" size="12" >
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total de Compras</span>
                    <span class="info-box-number text-center text-muted mb-0">28</span>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Variedade de Produtos</span>
                    <span class="info-box-number text-center text-muted mb-0">8</span>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Valor Total</span>
                    <span class="info-box-number text-center text-muted mb-0">R$ 350,00 <span>
                  </span></span></div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
              </div>
            </div>
        </page-card>
      </div>
    </div>
</section>

<modal-component
    name="destroy{{$client->id}}"
    alert="Cuidado!"
    action="{{ route('clients.destroy', $client->id)}}"
    message="Tem certeza que deseja excluir o cliente"
    note="Ao excluir o cliente você perderá todas as movimentação do mesmo."
    object= '"{{ $person->name }}"?'
    token="{{ csrf_token() }}"
    method="DELETE"
>

</modal-component>
@endsection

