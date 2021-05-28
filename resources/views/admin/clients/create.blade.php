@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Clientes"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Novo Cliente" size="12" >
            <form role="form" method="POST" action="{{ route('clients.store')}}" >
                @include('admin.clients.form')
                <p><code>Os campos com * são obrigatórios.</code></p>
                <div class="modal-footer justify-content">
                    <a class="btn btn-outline-info" href="{{route('clients.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-outline-success" ><i class="fa fa-save"></i> Criar</button>
                </div>
            </form>
        </page-card>
      </div>
  </div>
</section>
@endsection


@section('scripts')
<script src="{{ asset('layouts/admin/plugins/cep.js')}}"></script>
@endsection
