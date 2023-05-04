@extends('layouts.lendingService')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 92vh">
        <div class="d-flex flex-row shadow border rounded p-2">
            <img src="{{$item->image}}" alt="" class="" style="width: 50em">
            <div class=" d-flex flex-column justify-content ms-5 " style="height: 50em">
                <h1 class="mt-3">{{$item->name}}</h1>
                <h3 class="pt-5">lending status: {{$item->lendingStatus}}</h3>
                <div class="pt-5">
                    <h3>last updated: </h3>
                    <p>{{$item->updated_at}}</p>
                </div>
                <div class="pt-3 h-25">
                    <h2>manual: <br> </h2>
                    <a href="{{$item->manual}}" class="">
                        {{$item->manual}}
                    </a>
                </div>
                <div class="pt-3 h-25">
                    <h2>comments: <br> </h2>
                    <p>{{$item->comments}}</p>
                </div>

                <div class="d-flex w-50 justify-content-between align-item-center" style="">
                    <a class="btn btn-secondary btn-lg p-2">edit item</a>
                    <a class="btn btn-danger btn-lg p-2 " href={{route("inventoryManagement.deleteItem", ['itemId' => $item->id])}}>delete item</a>
                </div>
            </div>

        </div>
    </div>



@endsection
