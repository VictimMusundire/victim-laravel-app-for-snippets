
@if(count($errors) > 0)

    <div class="alert alert-danger fade show" role="alert"><h5>Errors</h5>
        @foreach($errors->all() as $error)
            <p class="mb-0">{{$error}}</p>
        @endforeach
    </div>

@endif
