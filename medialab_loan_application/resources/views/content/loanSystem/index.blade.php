@extends('layouts.loanSystem')

@section('content')

    <div class="d-flex flex-wrap rounded bg-light d-inline-block p-5 m-5 ">
        @if(count($loans) )
            @foreach($loans as $loan)
                <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em;" >
                    <h3 class="card-title" >{{$loan->item->name}}</h3>
                    <img src="{{ asset($loan->item->image) }}" alt="{{$loan->item->image}}">
                    <h4>lender:{{$loan->user->first_name}}</h4>
                    <p>from {{$loan->start_date}} until {{$loan->end_date}}</p>
                    <a class="btn btn-primary" href={{route("loanSystem.get", ['loanId' => $loan->id])}}>see more details</a>
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
