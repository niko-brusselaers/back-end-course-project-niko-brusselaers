@extends('layouts.loanSystem')

@section('content')
    <form action="{{route('loanSystem.index')}}" class="mt-5 mx-5">
        <div class="row mx-5">
            <input type="search"
                   name="searchfield" id="searchfield"
                   placeholder="search for items"
                   class="form-control w-25 ">
            <button type="submit" class="btn btn-primary " style="width: 5em">search</button>
            <a href="{{route("loanSystem.create")}}" class="btn btn-info mx-2" style="width: 10em">create loan</a>
            <div class="d-flex flex-row align-items-center py-3">
                <label for="startDate" class="me-2">Start date:</label>
                <input type="date"  name="startDate" id="startDate"
                   class="form-control " style="width: 10em">
                <label for="endDate" class="mx-2">End date:</label>
                <input type="date"  name="endDate" id="endDate"
                       class="form-control " style="width: 10em">

            </div>

        </div>
    </form>
    <div class="d-flex flex-wrap rounded bg-light d-inline-block p-5 m-5 ">
        @if(count($loans) )
            @foreach($loans as $loan)
                <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em;" >
                    <h3 class="card-title" >{{$loan->item_name}}</h3>
                    <img src="{{ asset($loan->image) }}" alt="{{$loan->image}}">
                    <h4>lender:{{$loan->user_name}}</h4>
                    <p>from {{$loan->start_date}} until {{$loan->end_date}}</p>
                    <a class="btn btn-primary" href={{route("loanSystem.show", ['loanId' => $loan->id])}}>see more details</a>
                </div>
            @endforeach
        @else
            <div class="d-flex flex-column justify-center">
                <h1 class="">there are no loans</h1>
                <a class="btn btn-primary " href="{{route('loanSystem.create')}}">create new</a>
            </div>

        @endif
    </div>

@endsection
