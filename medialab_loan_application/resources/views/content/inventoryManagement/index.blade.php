@extends('layouts.lendingService')

@section('content')
    <div class="d-flex flex-wrap container-fluid ">
        @foreach($items as $item)
            <div class="card m-3 p-3 d-flex justify-content-between align-content-center" style=" width: 20em; height: 30em" >
                <h3 class="card-title" >{{$item->name}}</h3>
                <img src="{{$item->image}}" alt="{{$item->image}}" class="overflow-hidden w-100 h-50" >
                <p>{{$item->lendingStatus}}</p>
                <a class="btn btn-primary" href={{route("inventoryManagement.getItem", ['itemId' => $item->id])}}>see more details</a>
            </div>
        @endforeach
    </div>

@endsection
