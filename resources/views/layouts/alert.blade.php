
@if($errors->any())

    <div class="col-12">
        <div class="alert alert-warning alert-dismissible"> 
            <h5>Atenção!</h5>           
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

@endif

