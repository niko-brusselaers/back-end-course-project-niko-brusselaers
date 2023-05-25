@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh">
        <form action="{{route("inventoryManagement.save")}}"
              method="POST" enctype="multipart/form-data"
              class="bg-slate-300 rounded p-10 m-3 flex flex-col sm:justify-start items-center"
              style="width: 40em; height: fit-content">
                <div class="flex flex-col items-start w-full pt-5">
                    <label for="name" class="form-label">Item Name:</label>
                    <input type="text"  name="name" id="name"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
                <div class="flex flex-col items-start w-full pt-5">
                    <label for="image"
                    class="form-label">image:</label>
                    <input type="file" name="image" id="image"
                           accept=".png,.jpeg,.jpg" required
                           class="form-control">
                </div>
                <div class="flex flex-col w-full pt-5">
                    <label for="manual"
                           class="form-label">Manual(optional):</label>
                    <textarea name="manual" id="manual" cols="50" rows="5"
                              placeholder="a short series of written instructions"
                              class="form-control"></textarea>
                    </div>
                <div class="flex flex-col w-full pt-5">
                    <label for="comments"
                           class="form-label">Comments(optional):</label>
                    <textarea name="comments" id="comments" cols="50" rows="8"
                              placeholder="any notes/observations about the product"
                              class="form-control"></textarea>
                </div>
                <div class="flex justify-between item-center pt-5 w-full">
                    <a href="{{route('inventoryManagement.index')}}"
                    class="bg-blue-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                    <button type="submit"
                            class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
                </div>
                @csrf
        </form>
    </div>

@endsection
