@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$client->id}}">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome<code>*</code></label>
                    <input type="text" class="form-control"  name="name"  value="{{old('name',$client->name)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>WhatsApp<code>*</code></label>
                    <input type=text class="form-control" name="mobile"  onKeyPress="Mobile(this)" maxlength="15" value="{{old('mobile',$client->mobile)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Telefone Fixo</label>
                    <input type=text class="form-control" name="phone"  onKeyPress="Phone(this)" maxlength="13" value="{{old('phone',$client->phone)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >E-mail</label>
                    <input type=email class="form-control"  name="email"  value="{{old('email',$client->email)}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >CEP<code>*</code></label>
                    <input type="text"   class="form-control" id="cep" name="cep"  placeholder="00000-000"  onKeyPress="CEP(this)" maxlength="9" value="{{old('cep',$client->cep)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >Logradouro<code>*</code></label>
                    <input type="text"  class="form-control" id="street" name="street"  value="{{old('street',$client->street)}}">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label >Número<code>*</code></label>
                    <input type="text"  class="form-control" id="number" name="number"  value="{{old('number',$client->number)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >Bairro<code>*</code></label>
                    <input type="text"  class="form-control" id="district" name="district"  value="{{old('district',$client->district)}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                    <label >Cidade<code>*</code></label>
                    <input type="text" class="form-control" id="city" name="city"  value="{{old('city',$client->city)}}">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label >UF<code>*</code></label>
                    <input type="text" class="form-control" id="uf" name="uf"  value="{{old('uf',$client->uf)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Complemento</label>
                    <input type="text" class="form-control" id="complement" name="complement"  value="{{old('complement',$client->complement)}}">
                </div>
            </div>

        </div>
    </div>
</div>
