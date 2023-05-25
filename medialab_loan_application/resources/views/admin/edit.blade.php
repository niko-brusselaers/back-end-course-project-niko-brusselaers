@extends('layouts.app')

@php
    $roles = ['user','admin','lendingService'];
    $userTypes = ['student','staff','professor'];
@endphp

@section('content')


    <div class="flex justify-center items-center" style="height: 80vh">
        <form action="{{route("admin.update")}}"
              method="post" enctype="multipart/form-data"
              class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between items-center"
              style="width: 20em; height: 50%">
            <div class="flex flex-col mt-5">
                    <label for="name" class="form-label font-bold">name:</label>
                    <input type="text"  name="name" id="name"
                           value="{{$user->name}}"
                           placeholder="name" required
                           class="form-control"
                           style="width: 15em">
            </div>
            <div class="flex flex-col mt-5">
                <label for="email" class="form-label font-bold">Email:</label>
                <input type="email"  name="email" id="email"
                       value="{{$user->email}}"
                       placeholder="Email" required
                       class="form-control"
                       style="width: 15em">
            </div>

            <div class="flex flex-col mt-5">
                <label for="userType" class="form-label font-bold">User type:</label>
                <select name="userType" id="userType"
                        class="form-select"
                        style="width: 15em">
                    @foreach($userTypes as $userType)
                        @if($userType == $user->userType)
                            <option value="{{$userType}}" selected>{{$userType}}</option>
                        @else
                            <option value="{{$userType}}">{{$userType}}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="flex flex-col mt-5">
                <label for="role" class="form-label font-bold">Role:</label>
                <select name="role" id="role"
                        class="form-select"
                        style="width: 15em">
                    @foreach($roles as $role)
                        @if($role == $user->role)
                            <option value="{{$role}}" selected>{{$role}}</option>
                        @else
                            <option value="{{$role}}">{{$role}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <input type="text" name="id" id="id" value="{{$user->id}}" hidden="true">


            <div class="flex justify-between item-center" style="width: 16em">
                <a href="{{route('admin.index')}}" class="bg-red-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                <button type="submit" class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
            </div>


            @csrf
        </form>
    </div>

@endsection
