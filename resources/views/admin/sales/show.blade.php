@extends('layouts.app')
@section('content')
  <breadcrumb v-bind:list="{{$breadcrumb}}" title = "Produtos"></breadcrumb>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <page-card title="Detalhes do Produto" size="12" >
          <div class="row">

            <div class="col-md-6">

              <strong>Código</strong>
              <p class="text-muted">{{$product->id}}</p>
              <hr>

              <strong>Nome</strong>
              <p class="text-muted">{{$product->name}}</p>
              <hr>

              <strong>Quantidade</strong>
              <p class="text-muted">{{$product->amount}}</p>
              <hr>

              <strong>Descrição</strong>
              <p class="text-muted">{!! $product->description !!}</p>


            </div>

            <div class="col-md-6">
                <strong>Estoque Mínimo</strong>
                <p class="text-muted">{{$product->minimum}}</p>
                <hr>

                <strong>Preço de Venda</strong>
                <p class="text-muted"> R$ {{number_format($product->sale_price, 2, ',', '.')}}</p>
                <hr>

                <strong>Categoria</strong>
                <p class="text-muted">{{$product->category->name}}</p>
                <hr>

                <strong>Imagens</strong>
                <p class="text-muted">
                          @foreach( $product->images as $image  )
                                 <img class="margin" src="{{url('storage/'.$image->name)}}" alt="{{ $image->id }}" alt="{{$image->name}}" height="120" width="120">
                          @endforeach
                </p>

            </div>

            <div class="col-md-12">
            <div class="modal-footer justify-content">
              <a class="btn btn-outline-info" href="{{route('products.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
              <a class="btn btn-outline-success" href="{{route('products.edit',$product->id)}}"><i class="fa fa-edit"></i>Editar</a>
              <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#destroy{{ $product->id }}"><i class="fa fa-trash"></i> Excluir</button>
            </div>
            </div>
          </div>

        </page-card>
      </div>

    </div>
</section>

<modal-component
    name="destroy{{$product->id}}"
    alert="Cuidado!"
    action="{{ route('products.destroy', $product->id)}}"
    message="Tem certeza que deseja excluir o produto"
    note="Ao excluir o produto você perderá todas as movimentação do mesmo."
    object= '"{{ $product->name }}"?'
    token="{{ csrf_token() }}"
    method="DELETE"
>

</modal-component>
@endsection

