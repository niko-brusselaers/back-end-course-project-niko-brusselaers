@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-wrap rounded bg-light d-inline-block p-5 m-5 " style="min-height: 80vh; width: 97vw">
    @if(count($users) )
            @foreach($users as $user)
                <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em;" >
                    <h2 class="card-title" >{{$user->first_name." ".$user->last_name}}</h2>
                    <h3 class="card-subtitle text-muted">{{$user->userType}}</h3>
                    <h4 class="card-text">{{$user->email}}</h4>
                    <a class="btn btn-primary" href={{route("admin.getUser", ['userId' => $user->id])}}>see more details</a>
                </div>
            @endforeach
        @else
            <div class="d-flex flex-column justify-center">
                <h1 class="">there are no users</h1>
                <a class="btn btn-primary " href="{{route('admin.create')}}">create new</a>
            </div>

    @endif

    </div>


@endsection
