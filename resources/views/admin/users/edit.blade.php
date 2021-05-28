@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Cliente"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Editar Cliente" size="12" >
            <form role="form" method="POST" action="{{ route('clients.update',$client->id)}}">
                {{method_field('PUT')}}
                @include('admin.clients.form')
                <div class="modal-footer justify-content">
                    <button type="submit" class="btn btn-outline-success" ><i class="fa fa-save"></i> Salvar</button>
                    <a class="btn btn-outline-info" href="{{route('clients.show',$client->id)}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </form>
             <br>
            <div align="center">
            <p><code>Os campos com * são obrigatórios.</code></p>
            </div>
        </page-card>
      </div>
  </div>
</section>
@endsection


@section('scripts')
<script src="{{ asset('layouts/admin/plugins/cep.js')}}"></script>~
@endsection
