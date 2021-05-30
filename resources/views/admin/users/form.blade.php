@include('layouts.alert')
<div class="row">
    {!!csrf_field()!!}
    <div class="col-md-12">
        <div class="row">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome<code>*</code></label>
                    <input type="text" class="form-control"  name="name"  value="{{old('name',$user->name)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>WhatsApp<code>*</code></label>
                    <input type=text class="form-control" name="mobile"  onKeyPress="Mobile(this)" maxlength="15" value="{{old('mobile',$user->mobile)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Telefone Fixo</label>
                    <input type=text class="form-control" name="phone"  onKeyPress="Phone(this)" maxlength="13" value="{{old('phone',$user->phone)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >E-mail</label>
                    <input type=email class="form-control"  name="email"  value="{{old('email',$user->email)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >Senha</label>
                    <input type="password" class="form-control"  name="password"  value="{{old('password')}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label >CEP<code>*</code></label>
                    <input type="text"   class="form-control" id="cep" name="cep"  placeholder="00000-000"  onKeyPress="CEP(this)" maxlength="9" value="{{old('cep',$user->cep)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >Logradouro<code>*</code></label>
                    <input type="text"  class="form-control" id="street" name="street"  value="{{old('street',$user->street)}}">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label >Número<code>*</code></label>
                    <input type="text"  class="form-control" id="number" name="number"  value="{{old('number',$user->number)}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label >Bairro<code>*</code></label>
                    <input type="text"  class="form-control" id="district" name="district"  value="{{old('district',$user->district)}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                    <label >Cidade<code>*</code></label>
                    <input type="text" class="form-control" id="city" name="city"  value="{{old('city',$user->city)}}">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <label >UF<code>*</code></label>
                    <input type="text" class="form-control" id="uf" name="uf"  value="{{old('uf',$user->uf)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label >Complemento</label>
                    <input type="text" class="form-control" id="complement" name="complement"  value="{{old('complement',$user->complement)}}">
                </div>
            </div>

        </div>
    </div>
</div>
