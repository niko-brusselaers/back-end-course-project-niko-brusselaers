@extends('layouts.app')

@section('content')
    <div  class="w-full h-full flex justify-center">
        <div class="flex flex-wrap justify-center  bg-white mt-10 pt-5 rounded-3xl w-9/12" style="min-height: 75vh;">
            @if(count($loans))
                @foreach($loans as $loan)
                    <div class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between content-center h-80 " style=" width: 20em;" >
                        <h3>{{$loan->item_name}}</h3>
                        <img src="{{ asset($loan->image) }}" alt="{{$loan->image}}"
                             class="h-1/2">
                        <p>from {{$loan->start_date}} until {{$loan->end_date}}</p>
                    </div>
                @endforeach
            @else
                <h1 class="self-center text-5xl font-bold">you have no loans </h1>
            @endif
        </div>
    </div>
@endsection
