@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
  
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$sale->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Recurso<code>*</code></label>
                    <select class="form-control select2" name="resource_id" >
                        @if($sale->resource_id)
                            <option value="{{ $sale->resource_id }}">{{ $sale->resource->name }}({{ $sale->resource->amount }})</option>
                            @foreach($resources as $resource)
                                <option value="{{ $resource->id }}" > {{ $resource->name }}({{ $resource->amount }}) </option>
                            @endforeach
                        @else
                            <option value="">-- Selecione --</option>
                            @foreach($resources as $resource)
                                <option value="{{ $resource->id }}" {{old('resource_id') == $resource->id ? 'selected="selected"': ''}}> {{ $resource->name }}({{ $resource->amount }}) </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cliente<code>*</code></label>
                    <select class="form-control select2" name="client_id" >
                        @if($sale->client_id)
                            <option value="{{ $sale->client_id }}">{{ $sale->client->name }}</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" > {{ $client->name }}</option>
                            @endforeach
                        @else
                            <option value="">-- Selecione --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{old('client_id') == $client->id ? 'selected="selected"': ''}}> {{ $client->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantidade<code>*</code></label>
                    <input type=number class="form-control" name="amount" value="{{old('amount',$sale->amount)}}">
                </div>
            </div>   

        </div>
    </div>
</div>
