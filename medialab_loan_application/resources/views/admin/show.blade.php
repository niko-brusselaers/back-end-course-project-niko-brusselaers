@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh" >
        <div class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between content-center" style=" height: 40vh; width: 40vw" >
            <h2><b>Name:</b> <br>
                {{$user->name}}</h2>
            <h3 ><b>User type:</b> <br>
                {{$user->userType}}</h3>
            <h3><b>Role:</b> <br>
                {{$user->getRoleNames()[0]}}</h3>
            <h4><b>Email:</b> <br>
                {{$user->email}}</h4>
            <div class="flex w-100 justify-between item-center" >
                <a class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white" href="{{route("admin.edit", ['userId' => $user->id])}}">edit user</a>
                <a class="bg-red-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white " href={{route("admin.delete", ['userId' => $user->id])}}>delete user</a>
            </div>
        </div>
    </div>
@endsection
