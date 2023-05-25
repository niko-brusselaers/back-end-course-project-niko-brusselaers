@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh" >
        <form action="{{route("inventoryManagement.update")}}"
              method="POST" enctype="multipart/form-data"
              class="bg-slate-300 rounded p-10 m-3 flex flex-col justify-around items-center"
              style="width: 40em; height: fit-content">
                <div class="flex flex-col mt-5 w-full">
                    <label for="name" class="form-label font-bold">Item Name:</label>
                    <input type="text"  name="name" id="name"
                           minlength="5" maxlength="60"
                           value="{{$item->name}}" required
                           class="form-control" >
                </div>
                <div class="flex flex-col mt-5 w-full">
                    <label for="image"
                           class="form-label font-bold">image:</label>
                    <input type="file" name="image" id="image"
                           accept=".png,.jpeg,.jpg"
                           class="form-control">
                </div>
            <div class="flex flex-col mt-5 justify-center w-full">
                <label for="manual"
                       class="form-label font-bold">Manual(optional):</label>
                <textarea name="manual" id="manual" cols="50" rows="5"
                          placeholder="a short series of written instructions"
                          class="form-control">{{$item->manual}}</textarea>
            </div>
            <div class="flex flex-col mt-5 justify-center  w-full">
                <label for="comments"
                       class="form-label font-bold">Comments(optional):</label>
                <textarea name="comments" id="comments" cols="50" rows="8"
                          placeholder="any notes/observations about the product"
                          class="form-control">{{$item->comments}}</textarea>
            </div>
            <div class="flex justify-between item-center pt-5 w-full">
                <a href="{{route('inventoryManagement.index')}}"
                   class="bg-blue-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                <button type="submit"
                        class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
            </div>
            <input type="text" name="id" id="id" value="{{$item->id}}" hidden="true">
            @csrf
        </form>
    </div>


@endsection
