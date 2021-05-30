@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Saída de Recursos"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <page-card title="Editar Saída de Recursos" size="12" >
            <form role="form" method="POST" action="{{ route('sales.update',$sale->id)}}" enctype="multipart/form-data">
                {{method_field('PUT')}}
                @include('admin.sales.form')
                <div class="modal-footer justify-content">
                    <a class="btn btn-outline-info" href="{{route('sales.show',$sale->id)}}"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-outline-success" ><i class="fa fa-save"></i> Atualizar</button>
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
    <script src="https://cdn.tiny.cloud/1/v1peecd3p5uceu1qf6571a1mihopzrx05gw9l8gijsqkpi40/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection
