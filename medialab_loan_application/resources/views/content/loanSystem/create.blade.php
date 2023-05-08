@extends('layouts.loanSystem')

@section('content')

    <div class="d-flex justify-content-center container-fluid" >
        <form action="{{route("loanSystem.create")}}"
              method="post" enctype="multipart/form-data"
              class="p-5">
            <div class="row mt-5">
                <div class="col">
                    <label for="itemName" class="form-label">Item Name:</label>
                    <input type="text"  name="itemName" id="itemName"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="email" class="form-label">User email:</label>
                    <input type="text"  name="email" id="email"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>

            </div>

            <div class="row mt-5">
                <div class="col">
                    <label for="startDate"
                           class="form-label">Start date:</label>
                    <input type="date"  name="startDate" id="startDate"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="endDate"
                           class="form-label">End date:</label>
                    <input type="date"  name="endDate" id="endDate"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
            </div>

            <div class="mt-4">
                <label for="comment"
                       class="form-label">comments(optional):</label>
                <textarea name="comment" id="comment" cols="50" rows="5"
                          placeholder="Comments about loan."
                          class="form-control"></textarea>
            </div>

            <div class="d-flex justify-content-between container-fluid mt-3">
                <a href="{{route('loanSystem.index')}}"
                   class="btn btn-secondary btn-lg mt-2 mb-2">cancel</a>
                <button type="submit"
                        class="btn btn-primary btn-lg mt-2 mb-2 ">Submit</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
