@extends('layouts.loanSystem')

@section('content')

    <?php
    $currentDate = date('Y-m-d')
    ?>
    <div class="d-flex justify-content-center container-fluid" >
        <form action="{{route("loanSystem.edit")}}"
              method="post" enctype="multipart/form-data"
              class="p-5">
            <div class="row mt-5">
                <div class="col">
                    <h3 >Item:</h3>
                    <p>{{$loan->item->name}}</p>
                </div>
                <div class="col">
                    <h3 >User:</h3>
                    <p>{{$loan->user->first_name." ".$loan->user->last_name}}</p>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col">
                    <label for="endDate"
                           class="form-label">End date:</label>
                    <input type="date"  name="endDate" id="endDate" min="{{$currentDate}}"
                           value="{{$loan->end_date}}"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
            </div>

            <div class="mt-4">
                <label for="comment"
                       class="form-label">comments(optional):</label>
                <textarea name="comment" id="comment" cols="50" rows="5"
                          class="form-control">@if($loan->comments){{$loan->comment}}@endif</textarea>
            </div>
            <input type="text" name="id" id="id" value="{{$loan->id}}" hidden>
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
