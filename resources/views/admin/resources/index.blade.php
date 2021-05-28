@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Recursos"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Lista de Recursos" size="12" url="{{route('resources.create')}}">
         @if($resources->count() > 0)
          <table-component
          v-bind:titles="['Código','Nome','Categoria','Quantidade']"
          url="http://localhost:8000/app/resources/"
          records = "{{$resources}}"
          >
        </table-component>
        @else
          <div align="center">
            <div class="alert alert-warning" role="alert">
                Não existem recursos cadastrados.
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