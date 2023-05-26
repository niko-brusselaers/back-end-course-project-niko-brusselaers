@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh">
        <div class=" bg-slate-300 rounded m-3 p-3 items-center flex flex-row border p-2" style="width: 80em; height: 35em">
            <img src="{{asset($item->image)}}" alt="{{$item->image}}" class="overflow-hidden" style="height: 100%; width: 100%">
            <div class=" flex flex-col items-start justify-between ms-5 me-20 w-full space-x-5" style="height: 100%; width: 100%">
                <h1 class="m-5"><b>item:</b>{{$item->name}}</h1>
                <div class="flex justify-between w-full">
                    <div c>
                        <h3><b>last updated: </b></h3>
                        <p>{{$item->updated_at}}</p>
                    </div>
                    <div class="text-right">
                        <h3><b>updated at: </b></h3>
                        <p>{{$item->updated_at}}</p>
                    </div>
                </div>

                <div>
                    <h2> <b>manual:</b> <br> </h2>
                    <p>{{$item->manual}}</p>
                </div>
                <div>
                    <h2><b>comments:</b> <br> </h2>
                    <p>{{$item->comments}}</p>
                </div>

                <div class="flex flex-row justify-between item-center"  style="width: 100%">
                    @can("edit item")
                        <a class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white " href="{{route("inventoryManagement.edit", ['itemId' => $item->id])}}">edit item</a>
                    @endcan
                    @can("delete item")
                            <a class="bg-red-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white " href={{route("inventoryManagement.delete", ['itemId' => $item->id])}}>remove item</a>
                    @endcan
                </div>
            </div>

        </div>
    </div>



@endsection
