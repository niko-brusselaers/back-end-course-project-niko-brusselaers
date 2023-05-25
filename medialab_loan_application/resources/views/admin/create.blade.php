@extends('layouts.app')

@section('content')

    <div class="flex justify-center items-center" style="height: 80vh" >
        <form action="{{route("admin.save")}}"
              method="post" enctype="multipart/form-data"
              class="bg-slate-300 rounded p-10 m-3 flex flex-col justify-around items-center"
              style="width: 40em; height: fit-content">
            <div class="flex flex-row justify-between w-full">
                <div class="flex flex-col items-start">
                    <label for="first_name" class="form-label font-bold">First name:</label>
                    <input type="text"  name="first_name" id="first_name"
                           placeholder="First name" required
                           class="form-control" >
                </div>
                <div class="flex flex-col items-start">
                    <label for="last_name" class="form-label font-bold">Last name:</label>
                    <input type="text"  name="last_name" id="last_name"
                           placeholder="Last name" required
                           class="form-control" >
                </div>
            </div>
            <div class="flex flex-col mt-5 justify-center w-full">
                <label for="email" class="form-label font-bold">Email:</label>
                <input type="email"  name="email" id="email"
                       placeholder="Email" required
                       class="form-control" >
            </div>

            <div class="flex flex-col mt-5 justify-center w-full">
                <label for="userType" class="form-label font-bold">User type:</label>
                <select name="userType" id="userType"
                        class="form-select"
                >
                    <option value="" selected hidden >please select the the type of user</option>
                    <option value="student">student</option>
                    <option value="staff">staff</option>
                    <option value="teacher">admin</option>

                </select>
            </div>

            <div class="flex flex-col mt-5 justify-center w-full">
                <label for="role" class="form-label font-bold">Role:</label>
                <select name="role" id="role"
                        class="form-select"
                >
                    <option value="" selected hidden>please select a role</option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="lendingService">lendingService</option>
                </select>
            </div>

            <div class="flex flex-row justify-between w-full mt-5">
                <div class="flex flex-col items-start">
                    <label for="password" class="form-label font-bold">Password:</label>
                    <input type="password"  name="password" id="password"
                           placeholder="password" required
                           class="form-control" >
                </div>
                <div class="flex flex-col items-start">
                    <label for="password_confirmation" class="form-label font-bold">Confirm password:</label>
                    <input type="password"  name="password_confirmation" id="password_confirmation"
                           placeholder="confirm password" required
                           class="form-control" >
                </div>
            </div>



            <div class="flex justify-between item-center pt-5 w-full">
                <a href="{{route('admin.index')}}"
                   class="bg-blue-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                <button type="submit"
                        class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
            </div>
            @csrf
        </form>
    </div>

@endsection
