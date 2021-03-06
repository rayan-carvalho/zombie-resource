@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$resource->id}}">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome<code>*</code></label>
                    <input type="text" class="form-control"  name="name"  value="{{old('name',$resource->name)}}">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Estoque mínimo<code>*</code></label>
                    <input type=number class="form-control" name="minimum" value="{{old('minimum',$resource->minimum)}}">
                </div>
            </div>         

            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoria <code>*</code></label>
                    <select class="form-control select2" name="category_id" id="category_id">
                        @if($resource->category_id)
                            <option value="{{ $resource->category_id}}">{{ $resource->category->name }} </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" > {{ $category->name }} </option>
                            @endforeach
                        @else
                            <option value="">-- Selecione --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{old('category_id',$category->name) == $resource->category_id ? 'selected="selected"': ''}}> {{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>        

            <div @if($resource->id) class="col-md-4" @else class="col-md-6" @endif >
                <div class="form-group">
                    <label >Imagem:</label>
                    <input type="file" class="form-control" name="image" value="{{old('image',$resource->image)}}">
                </div>              
            </div>
            @if($resource->id)  
                <div class="col-md-2">                                         
                    <div class="card" style="width: 10rem;">
                        @if($resource->image != null) <img class="card-img-top" src="{{  url('storage/'.$resource->image)  }}" alt="{{ $resource->image }}" height="120" width="120"> @else <img class="card-img-top" src="{{url('storage/image-not-found.png')}}" alt="{{ $resource->image }}" height="120" width="120">  @endif                             
                    </div>              
                </div>
            @endif

            <div class="col-md-6">
                <div class="form-group">
                    <label >Descrição</label>
                    <textarea id="editor" class="form-control" name="description" rows="5" >{!! old('description',$resource->description) !!}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Observações</label>
                    <textarea id="editor" class="form-control" name="note" rows="5" >{!! old('note',$resource->note) !!}</textarea>
                </div>
            </div>        


        </div>
    </div>
</div>
