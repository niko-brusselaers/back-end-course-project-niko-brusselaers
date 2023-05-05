@extends('layouts.lendingService')

@section('content')
    <div class="d-flex justify-content-center container-fluid" >
        <form action="{{route("inventoryManagement.saveItem")}}"
              method="post" enctype="multipart/form-data"
              class="p-5">
            <div class="row mt-5">
                <div class="col">
                    <label for="name" class="form-label">Item Name:</label>
                    <input type="text"  name="name" id="name"
                           minlength="5" maxlength="60"
                           placeholder="name of product" required
                           class="form-control" >
                </div>
                <div class="col">
                    <label for="image"
                    class="form-label">image:</label>
                    <input type="file" name="image" id="image"
                           accept=".png,.jpeg,.jpg" required
                           class="form-control">
                </div>
            </div>
            <div class="mt-4">
                <label for="manual"
                       class="form-label">Manual(optional):</label>
                <textarea name="manual" id="manual" cols="50" rows="5"
                          placeholder="a short series of written instructions"
                          class="form-control"></textarea>
                </div>
            <div class="mt-4">
                <label for="comments"
                       class="form-label">Comments(optional):</label>
                <textarea name="comments" id="comments" cols="50" rows="8"
                          placeholder="any notes/observations about the product"
                          class="form-control"></textarea>
            </div>
            <div class="d-flex justify-content-between container-fluid mt-3">
                <a href="{{route('inventoryManagement.index')}}"
                class="btn btn-secondary btn-lg mt-2 mb-2">cancel</a>
                <button type="submit"
                        class="btn btn-primary btn-lg mt-2 mb-2 ">Submit</button>
            </div>
            @csrf
        </form>
    </div>

@endsection
