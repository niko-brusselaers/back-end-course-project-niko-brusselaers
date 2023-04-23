@foreach($errors->all() as $error)
    <div class="alert alert-danger m-t-5" role="alert">
        - {{$error}}
    </div>
@endforeach
