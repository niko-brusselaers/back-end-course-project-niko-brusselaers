@extends('layouts.loanSystem')

@section('content')

    <div class="d-flex justify-content-center align-items-center" style="height: 92vh">
        <div class="d-flex flex-row shadow border rounded p-2" style="width: 80%">
            <img src="{{asset($loan->item->image)}}" alt="{{$loan->item->image}}" class="overflow-hidden">
            <div class=" d-flex flex-column justify-content ms-5 " style="height: 70%; width: 50%">
                <h1 class="mt-3">{{$loan->item->name}}</h1>
                <div class="pt-5">
                    <h3>last updated: </h3>
                    <p>{{$loan->updated_at}}</p>
                </div>
                <div class="pt-5">
                    <h3>updated at: </h3>
                    <p>{{$loan->updated_at}}</p>
                </div>
                <h3>from: {{$loan->from_date}}</h3>
                <h3>until:{{$loan->until_date}}</h3>
                <div class="pt-3 h-25">
                    <h2>comments: <br> </h2>
                    <p>{{$loan->comments}}</p>
                </div>

                <div class="d-flex justify-content-between align-item-center container-fluid" >
                    <a class="btn btn-secondary btn-lg " href="{{route("loanSystem.edit", ['itemId' => $loan->id])}}">edit item</a>
                    <a class="btn btn-danger btn-lg ms-4 " href={{route("loanSystem.delete", ['itemId' => $loan->id])}}>delete item</a>
                </div>
            </div>

        </div>
    </div>

@endsection
