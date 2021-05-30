@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Usuário"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Editar Usuário" size="12" >
            <form role="form" method="POST" action="{{ route('users.update',$user->id)}}">
                {{method_field('PUT')}}
                @include('admin.users.form')
                <div class="modal-footer justify-content">
                  <a class="btn btn-outline-info" href="{{route('users.show',$user->id)}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                  <button type="submit" class="btn btn-outline-success" ><i class="fa fa-save"></i> Salvar</button>                    
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
