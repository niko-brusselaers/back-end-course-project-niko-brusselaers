@extends('layouts.app')

@section('content')

    <?php
    $currentDate = date('Y-m-d')
    ?>
    <div class="flex justify-center items-center" style="height: 80vh">
        <form action="{{route("loanSystem.update")}}"
              method="post" enctype="multipart/form-data"
              class="bg-slate-300 rounded p-10 m-3 flex flex-col justify-around items-center"
              style="width: 40em; height: fit-content">
                <div class="flex flex-row justify-around w-full">
                    <div class="flex flex-col items-center">
                        <h3 ><b>Item:</b></h3>
                        <p>{{$loan->item->name}}</p>
                    </div>
                    <div class="flex flex-col items-center ">
                        <h3 ><b>User:</b></h3>
                        <p>{{$loan->user->name}}</p>
                    </div>
                </div>


            <div class="flex flex-col mt-5 justify-center w-full" >
                    <label for="endDate"
                           class="form-label font-bold">End date:</label>
                    <input type="date"  name="endDate" id="endDate" min="{{$currentDate}}"
                           value="{{$loan->end_date}}"
                           required
                           class="form-control" >
            </div>

            <div class="flex flex-col mt-5 w-full">
                <label for="comment"
                       class="form-label font-bold">comments(optional):</label>
                <textarea name="comment" id="comment" cols="50" rows="2"
                          class="form-control">@if($loan->comments){{$loan->comment}}@endif</textarea>
            </div>
            <input type="text" name="id" id="id" value="{{$loan->id}}" hidden>
            <div class="flex justify-between item-center pt-5 w-full">
                <a href="{{route('loanSystem.index')}}"
                   class="bg-blue-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                <button type="submit"
                        class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
            </div>
            @csrf
        </form>
    </div>

@endsection
