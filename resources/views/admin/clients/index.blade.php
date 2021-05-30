@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Clientes"></breadcrumb>
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Lista de Clientes" size="12" url="{{route('clients.create')}}">
         @if($clients->count() > 0)
          <table-component
          v-bind:titles="['Código','Nome','Telefone','WhatsApp']"
          url="{{Request::url().'/'}}"
          model="Client"
          order = "asc"
          records = "{{ $clients }}"
          >
        </table-component>
        @else
          <div align="center">
            <div class="alert alert-warning" role="alert">
                Não existem clientes cadastrados.
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
@endsection