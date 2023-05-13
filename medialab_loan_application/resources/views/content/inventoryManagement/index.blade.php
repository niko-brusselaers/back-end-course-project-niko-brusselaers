@extends('layouts.lendingService')

@section('content')
    <form action="{{route('inventoryManagement.index')}}" class="pt-5 ps-5">
        <div class="row">
            <input type="search"
                   name="searchfield" id="searchfield"
                   placeholder="search for items"
                   class="form-control w-25 ">
            <button type="submit" class="btn btn-primary " style="width: 5em">search</button>
            <div class="btn btn-secondary mx-1" style="width: 7em">
                <input type="checkbox" name="isAvailable" id="isAvailable">
                <label for="isAvailable" >available</label></div>
        </div>
    </form>
    <div class="d-flex flex-wrap container-fluid ">
        @if(count($items) )
            @foreach($items as $item)
                <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em; height: 30em" >
                    <h3 class="card-title" >{{$item->name}}</h3>
                    <img src="{{$item->image}}" alt="{{$item->image}}" class="overflow-hidden w-100 h-50" >
                    <a class="btn btn-primary" href={{route("inventoryManagement.show", ['itemId' => $item->id])}}>see more details</a>
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

