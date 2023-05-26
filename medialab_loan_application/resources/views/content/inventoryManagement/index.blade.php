@extends('layouts.app')

@section('content')
    <div  style="padding: 0 10vw">
        <form action="{{route('inventoryManagement.index')}}" class="pt-5 ps-5">

            <div class="flex w-full">
                <input type="search"
                       name="searchfield" id="searchfield"
                       placeholder="search for items"
                       class="form-control w-25 ">
                <button type="submit" class="bg-blue-600 rounded px-5 py-0.5 mx-1 text-lg font-bold text-white" >search</button>
                <div class="bg-white text-gray-800 font-semibold py-0.5 px-4 border border-gray-400 rounded shadow flex  items-center " style="width: 10em">
                    <input type="checkbox" name="isAvailable" id="isAvailable" class="m-2">
                    <label for="isAvailable" class="m-2">available</label>
                </div>
                <a href="{{route("inventoryManagement.create")}}" class="bg-green-600 rounded px-5 py-3 mx-2 text-lg font-bold text-white text-center align-middle" >create item</a>
            </div>
        </form>
        <div class="flex flex-wrap justify-center  bg-white mt-10 pt-5 rounded-3xl w-full" style="min-height: 75vh">
            @if(count($items) )
                @foreach($items as $item)
                    <div class="bg-slate-300 rounded m-3 p-3 flex flex-col justify-between content-center h-80" style=" width: 20em;" >
                        <h3 class="font-bold">{{$item->name}}</h3>
                        <img src="{{$item->image}}" alt="{{$item->image}}" class="h-1/2" >
                        <a class="bg-blue-600 rounded-full px-5 py-1.5 mx-1 text-lg font-bold text-white text-center"
                           href={{route("inventoryManagement.show", ['itemId' => $item->id])}}>see more details</a>
                    </div>
                @endforeach

            @else

                <div class="place-self-center flex flex-col">
                    <h1 class="">there are no items</h1>
                    <a class="bg-green-600 rounded px-5 py-2 mx-1 text-base font-bold text-white text-center w-32 place-self-center mt-5" href="{{route('inventoryManagement.create')}}">create new</a>
                </div>

            @endif
        </div>
    </div>

@endsection

