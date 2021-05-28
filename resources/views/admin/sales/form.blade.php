@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$product->id}}">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome<code>*</code></label>
                    <input type="text" class="form-control"  name="name"  value="{{old('name',$product->name)}}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Preço de venda<code>*</code></label>
                    <input  class="form-control" type=number step=0.01 name="sale_price" value="{{old('sale_price',$product->sale_price)}}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Estoque mínimo<code>*</code></label>
                    <input type=number class="form-control" name="minimum" value="{{old('minimum',$product->minimum)}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label >Quantidade<code>*</code></label>
                    <input type=number class="form-control"  name="amount"  value="{{old('amount',$product->amount)}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoria <code>*</code></label>
                    <select class="form-control select2" name="category_id" id="category_id">
                        @if($product->category_id)
                            <option value="{{ $product->category_id}}">{{ $product->category->name }} </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" > {{ $category->name }} </option>
                            @endforeach
                        @else
                            <option value="">-- Selecione --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{old('category_id',$category->name) == $product->category_id ? 'selected="selected"': ''}}> {{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label >Descrição</label>
                    <textarea id="editor" class="form-control" name="description" rows="5" ></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label >Imagem:</label>
                    <input type="file" class="form-control" multiple name="images[]" value="{{old('images',$product->imageURL)}}" @if($product->id) @else required @endif>
                </div>
                <div class="row">
                    @foreach( $product->images as $image)
                        <div class="card" style="width: 10rem;">
                            <img class="card-img-top" src="{{  url('storage/'.$image->name)  }}" alt="{{ $image->name }}" height="120" width="120">
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="main"  value="{{ $image->id }}" {!! $image->main == 1 ? 'checked="checked"' : '' !!}>
                                        <label class="form-check-label"><p>Principal</p></label>
                                    </div>
                                    <hr>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  id="{{ $image->id }}" name="checkbox[]" value="{{ $image->id }}" >
                                        <label class="form-check-label"><p>Excluir</p></label>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>



        </div>
    </div>
</div>
