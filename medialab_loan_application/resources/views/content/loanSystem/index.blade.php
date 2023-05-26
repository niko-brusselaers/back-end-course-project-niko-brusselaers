@extends('layouts.app')

@section('content')
    <div  style="padding: 0 10vw">
        <form action="{{route('loanSystem.index')}}" class="mt-10 ">
            <div class="row mx-5">
                <input type="search"
                       name="searchfield" id="searchfield"
                       placeholder="search for items"
                       class="form-control w-25 ">
                    <label for="startDate" class="mx-2 font-bold">Start date:</label>
                <input type="date"  name="startDate" id="startDate"
                class="form-control " style="width: 10em">
                <label for="endDate" class="mx-2 font-bold">End date:</label>
                <input type="date"  name="endDate" id="endDate"
                class="form-control " style="width: 10em">
                <button type="submit" class="bg-blue-600 rounded px-5 py-1.5 mx-1 text-lg font-bold text-white ">search</button>
                <a href="{{route("loanSystem.create")}}" class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white" >create loan</a>

            </div>
        </form>
        <div class="flex flex-wrap justify-center  bg-white mt-10 pt-5 rounded-3xl w-full" style="min-height: 75vh">
            @if(count($loans) )
                @foreach($loans as $loan)
                    <div class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between content-center h-80" style=" width: 20em;" >
                        <h3>{{$loan->item_name}}</h3>
                        <img src="{{ asset($loan->image) }}" alt="{{$loan->image}}"
                             class="h-1/2">
                        <h4>lender:{{$loan->user_name}}</h4>
                        <p>bfrom {{$loan->start_date}} until {{$loan->end_date}}</p>
                        <a class="bg-blue-600 rounded-full px-5 py-1.5 mx-1 text-lg font-bold text-white text-center"
                           href={{route("loanSystem.show", ['loanId' => $loan->id])}}>see more details</a>
                    </div>
                @endforeach
            @else
                <div class="place-self-center flex flex-col">
                    <h1 class="text-5xl">there are no loans</h1>
                    <a class="bg-green-600 rounded px-5 py-2 mx-1 text-base font-bold text-white text-center w-32 place-self-center mt-5" href="{{route('loanSystem.create')}}">create new</a>
                </div>

            @endif
        </div>
    </div>

@endsection
