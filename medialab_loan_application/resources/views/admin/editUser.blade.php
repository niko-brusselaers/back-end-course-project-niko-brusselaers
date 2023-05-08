@extends('layouts.admin')

@php
    $roles = ['lender','admin','lendingService'];
    $userTypes = ['student','staff','professor', 'testUser'];
@endphp

@section('content')


    <div class="d-flex justify-content-center container-fluid" >
        <form action="{{route("admin.updateUser")}}"
              method="post" enctype="multipart/form-data"
              class="p-5">
            <div class="row mt-5">
                <div class="col">
                    <label for="first_name" class="form-label">First name:</label>
                    <input type="text"  name="first_name" id="first_name"
                           value="{{$user->first_name}}"
                           placeholder="First name" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="last_name" class="form-label">Last name:</label>
                    <input type="text"  name="last_name" id="last_name"
                           value="{{$user->last_name}}"
                           placeholder="Last name" required
                           class="form-control" >
                </div>
            </div>
            <div class="row mt-5">
                <label for="email" class="form-label">Email</label>
                <input type="email"  name="email" id="email"
                       value="{{$user->email}}"
                       placeholder="Email" required
                       class="form-control" >
            </div>

            <div class="row mt-5">
                <label for="userType" class="form-label">User type</label>
                <select name="userType" id="userType"
                        class="form-select"
                >
                    @foreach($userTypes as $userType)
                        @if($userType == $user->userType)
                            <option value="{{$userType}}" selected>{{$userType}}</option>
                        @else
                            <option value="{{$userType}}">{{$userType}}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="row mt-5">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role"
                        class="form-select"
                >
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


            <div class="d-flex justify-content-between container-fluid mt-3">
                <a href="{{route('admin.index')}}"
                   class="btn btn-secondary btn-lg mt-2 mb-2">cancel</a>
                <button type="submit"
                        class="btn btn-primary btn-lg mt-2 mb-2 ">Submit</button>
            </div>
            @csrf
        </form>
    </div>

@endsection
