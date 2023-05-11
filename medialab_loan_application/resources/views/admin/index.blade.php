@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.index')}}" class="mt-5 mx-5">
        <div class="row mx-5">
            <input type="search"
                   name="searchfield" id="searchfield"
                   placeholder="search for items"
                   class="form-control w-25 ">
            <select name="userType" id="userType"
                    class="form-select" style="width: 15em">
                <option value="all">all</option>
                <option value="student">student</option>
                <option value="staff">staff</option>
                <option value="teacher">teacher</option>
            </select>
            <button type="submit" class="btn btn-primary " style="width: 5em">search</button>
            <a href="{{route("admin.create")}}" class="btn btn-info mx-2" style="width: 10em">create User</a>

        </div>
    </form>
    <div class="d-flex flex-wrap rounded bg-light d-inline-block p-5 m-5 " style="min-height: 80vh; width: 97vw">

    @if(count($users) )
            @foreach($users as $user)
                <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em;" >
                    <h2 class="card-title" >{{$user->name}}</h2>
                    <h3 class="card-subtitle text-muted">{{$user->userType}}</h3>
                    <h4 class="card-text">{{$user->email}}</h4>
                    <a class="btn btn-primary" href={{route("admin.show", ['userId' => $user->id])}}>see more details</a>
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
