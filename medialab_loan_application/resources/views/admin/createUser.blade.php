@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-center container-fluid" >
        <form action="{{route("admin.saveUser")}}"
              method="post" enctype="multipart/form-data"
              class="p-5">
            <div class="row mt-5">
                <div class="col">
                    <label for="first_name" class="form-label">First name:</label>
                    <input type="text"  name="first_name" id="first_name"
                           placeholder="First name" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="last_name" class="form-label">Last name:</label>
                    <input type="text"  name="last_name" id="last_name"
                           placeholder="Last name" required
                           class="form-control" >
                </div>
            </div>
            <div class="row mt-5">
                <label for="email" class="form-label">Email</label>
                <input type="email"  name="email" id="email"
                       placeholder="Email" required
                       class="form-control" >
            </div>

            <div class="row mt-5">
                <label for="userType" class="form-label">User type</label>
                <select name="userType" id="userType"
                        class="form-select"
                >
                    <option value="" selected hidden >please select the the type of user</option>
                    <option value="student">student</option>
                    <option value="staff">staff</option>
                    <option value="professor">professor</option>

                </select>
            </div>

            <div class="row mt-5">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role"
                        class="form-select"
                >
                    <option value="" selected hidden k>please select a role</option>
                    <option value="lender">lender</option>
                    <option value="admin">admin</option>
                    <option value="lendingService">lendingService</option>
                </select>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"  name="password" id="password"
                           placeholder="pasword" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="confirmPasword" class="form-label">Confirm password</label>
                    <input type="password"  name="confirmPassword" id="confirmPassword"
                           placeholder="confirm password" required
                           class="form-control" >
                </div>
            </div>



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
