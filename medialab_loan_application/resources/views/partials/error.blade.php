@foreach($errors->all() as $error)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        - {{$error}}
    </div>
@endforeach
