@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Categorias"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Nova Categoria" size="12" >
            <form role="form" method="POST" action="{{ route('categories.store')}}" >
                @include('admin.categories.form')
                <div class="col-md-12">
                    <p><code>Os campos com * são obrigatórios.</code></p>
                    <div class="modal-footer justify-content">
                        <a class="btn btn-outline-info" href="{{route('categories.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-outline-success" ><i class="fa fa-save"></i> Criar</button>
                    </div>
                </div>
        </page-card>
        </form>
      </div>
  </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/v1peecd3p5uceu1qf6571a1mihopzrx05gw9l8gijsqkpi40/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection
