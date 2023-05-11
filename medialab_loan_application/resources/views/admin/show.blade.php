@extends('layouts.admin')

@section('content')
    <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" min-height: 40vh; width: 40vw" >
        <h2 class="card-title" >Name: <br>
            {{$user->name}}</h2>
        <h3 class="card-subtitle text-muted">User type: <br>
            {{$user->userType}}</h3>
        <h3 class="card-text">Role: <br>
            {{$user->role}}</h3>
        <h4 class="card-text">Email: <br>
            {{$user->email}}</h4>
        <div class="d-flex w-100 justify-content-between align-item-center" style="">
            <a class="btn btn-secondary btn-lg p-2" href="{{route("admin.editUser", ['userId' => $user->id])}}">edit item</a>
            <a class="btn btn-danger btn-lg p-2 " href={{route("admin.deleteUser", ['userId' => $user->id])}}>delete item</a>
        </div>
    </div>
@endsection
