@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
  
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$stock->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Recurso<code>*</code></label>
                    <select class="form-control select2" name="resource_id" >
                        @if($stock->resource_id)
                            <option value="{{ $stock->resource_id }}">{{ $stock->resource->name }}</option>
                            @foreach($resources as $resource)
                                <option value="{{ $resource->id }}" > {{ $resource->name }} </option>
                            @endforeach
                        @else
                            <option value="">-- Selecione --</option>
                            @foreach($resources as $resource)
                                <option value="{{ $resource->id }}" {{old('resource_id') == $resource->id ? 'selected="selected"': ''}}> {{ $resource->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantidade<code>*</code></label>
                    <input type=number class="form-control" name="amount" value="{{old('amount',$stock->amount)}}">
                </div>
            </div>   

        </div>
    </div>
</div>
