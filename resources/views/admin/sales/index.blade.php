@extends('layouts.app')

@section('content')
<breadcrumb v-bind:list="{{$breadcrumb}}" title = "Vendas"></breadcrumb>

<section class="content">
  <div class="container-fluid">
      <div class="row">
       
          <page-card title="Produtos" size="8" >
          

            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @php                 
                  $id = $categories[0]['id'];
                @endphp
                @foreach ($categories as $categorie)
                  @if(count($categorie->products) > 0)       
                    <a {!! $categorie->id == $id ? 'class="nav-link active"' : 'class="nav-link"' !!} id="nav-home-tab" data-toggle="tab" href="#nav-{{strtoupper($categorie->id)}}" role="tab" aria-controls="nav-{{strtoupper($categorie->id)}}" aria-selected="true">{{strtoupper($categorie->name)}}</a> 
                  @else                    
                  @endif
                @endforeach 
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
              @foreach ($categories as $categorie) 
                @if(count($categorie->products) > 0)       
                  <div {!! $categorie->id == $id ? 'class="tab-pane fade show active"' : 'class="tab-pane fade"' !!} id="nav-{{strtoupper($categorie->id)}}" role="tabpanel" aria-labelledby="{{strtoupper($categorie->id)}}-tab">                
                    <table class="table table-hover table-striped">                             
                      <tbody>         
                        @foreach ($products->where('category_id',$categorie->id) as $product)    
                        @php
                         $image =  $product->images->where('main',1)->first(); 
                         if(isset($image['name'])){
                           $url = url('storage/'.$image['name']);
                          }else{
                            $url = url('storage/image-not-found.png');
                          }
                        @endphp                                 
                        <tr>
                          <td class="mailbox-star">
                            <img src="{{ $url }}"  class="img-circle" width="60" height="60">
                          </td> 
                          <td class="mailbox-name">{{strtoupper($product->name)}}</td> 
                          <td class="mailbox-name"><b>R$ {{number_format($product->sale_price, 2, ',', '.')}}</b></td> 
                          <td class="mailbox-subject">
                          <button-add-cart product="{{$product}}"></button-add-cart>
                          <button-remove-cart> </button-remove-cart>
                         
                          </td> 
                        </tr>   
                        @endforeach          
                      </tbody>            
                    </table>
                  </div>
                @else                    
                @endif               
              @endforeach 
            </div>


                     
          </page-card>
      
        
          <page-card title="Informações" size="4" >
            <table-cart></table-cart>
       
            <hr>
            <a class="btn btn-outline-success btn-lg btn-block" href="#">Finalizar</a>
            <a class="btn btn-outline-danger btn-lg btn-block" href="#">Cancelar</a>
             
          </page-card>
      
        
      </div>
  </div>
</section>

@endsection
@section('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
@endsection
