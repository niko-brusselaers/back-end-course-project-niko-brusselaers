@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh">
        <form action="{{route("loanSystem.save")}}"
              method="post" enctype="multipart/form-data"
              class="bg-slate-300 rounded p-10 m-3 flex flex-col justify-around items-center"
              style="width: 40em; height: fit-content">
            <div class="flex flex-row justify-between w-full pt-5 ">
                <div class="flex flex-col items-start ">
                    <label for="itemName" class="form-label font-bold ">Item:</label>
                    <input list="itemList" name="itemName"
                           id="itemName" class="form-control w-60 h-12 border border-black"
                           placeholder=" please enter item">
                    <datalist id="itemList" >
                        @foreach($items as $item)
                            <option >{{$item}}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="flex flex-col items-start">
                    <label for="email"  class="form-label font-bold">User</label>
                    <input list="userList" class="form-control w-60 h-12 border border-black"
                            id="email" name="email"
                            placeholder=" please enter user">
                    <datalist id="userList" >
                        @foreach($users as $user)
                            <option value="{{$user->email}}">{{$user->name}}</option>
                        @endforeach
                    </datalist>
                </div>

            </div>

            <div class="flex flex-row justify-between w-full pt-5">
                <div class="flex flex-col items-start">
                    <label for="startDate"
                           class="form-label font-bold">Start date:</label>
                    <input type="date"  name="startDate" id="startDate" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}"
                           required class="form-control w-60 ">
                </div>
                <div class="flex flex-col items-start">
                    <label for="endDate"
                           class="form-label font-bold">End date:</label>
                    <input type="date"  name="endDate" id="endDate" min="{{date('Y-m-d')}}"
                           required class="form-control w-60 ">
                </div>
            </div>

            <div class="flex flex-col w-full pt-5">
                <label for="comment"
                       class="form-label font-bold">comments(optional):</label>
                <textarea name="comment" id="comment" cols="50" rows="5"
                          placeholder="Comments about loan."
                          class="form-control"></textarea>
            </div>

            <div class="flex justify-between item-center pt-5 w-full">
                <a href="{{route('loanSystem.index')}}"
                   class="bg-blue-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">cancel</a>
                <button type="submit" class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white">Submit</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

