@extends('layouts.app')

@section('content')
    <div  style="padding: 0 10vw">
        <form action="{{route('admin.index')}}" class="mt-10 ">
            <div class="row mx-5">
                <input type="search"
                       name="searchfield" id="searchfield"
                       placeholder="search for users"
                       class="form-control w-25 ">
                <select name="userType" id="userType"
                        class="form-select" style="width: 15em">
                    <option value="all">all</option>
                    <option value="student">student</option>
                    <option value="staff">staff</option>
                    <option value="teacher">teacher</option>
                </select>
                <button type="submit" class="bg-blue-600 rounded px-5 py-1.5 mx-1 text-lg font-bold text-white" >search</button>
                <a href="{{route("admin.create")}}" class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white" >create User</a>

            </div>
        </form>
        <div class="flex flex-wrap justify-center  bg-white mt-10 pt-5 rounded-3xl w-fit" style="min-height: 75vh" >

        @if(count($users) )
                @foreach($users as $user)
                    <div class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between content-center h-52" style=" width: 20em;" >
                        <h2><b>Name:</b> {{$user->name}}</h2>
                        <h3><b>Type:</b> {{$user->userType}}</h3>
                        <h4><b>Email:</b> {{$user->email}}</h4>
                        <a class="bg-blue-600 rounded-full px-5 py-1.5 mx-1 text-lg font-bold text-white text-center"
                           href={{route("admin.show", ['userId' => $user->id])}}>see more details</a>
                    </div>
                @endforeach
            @else
                <div class="d-flex flex-column justify-center">
                    <h1 class="text-5xl">there are no users</h1>
                    <a class="bg-green-600 rounded px-5 py-2 mx-1 text-base font-bold text-white text-center w-32 place-self-center mt-5" href="{{route('admin.create')}}">create new</a>
                </div>

        @endif

        </div>
    </div>


@endsection
