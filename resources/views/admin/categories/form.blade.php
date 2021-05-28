@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$category->id}}">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome<code>*</code></label>
                    <input type="text" class="form-control"  name="name"  value="{{old('name',$category->name)}}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label >Descrição</label>
                    <textarea id="editor" name="description"  class="form-control" >{{old('description',$category->description)}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
