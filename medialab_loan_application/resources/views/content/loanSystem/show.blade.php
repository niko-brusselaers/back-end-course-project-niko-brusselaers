@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center" style="height: 80vh">
        <div class=" bg-slate-300 rounded m-3 p-3 items-center flex flex-row border p-2" style="width: 80em; height: 35em">
            <img src="{{asset($loan->item->image)}}" alt="{{$loan->item->image}}" class="overflow-hidden" style="height: 100%; width: 100%">
            <div class=" flex flex-col items-start justify-between ms-5 me-20 w-full space-x-5" style="height: 100%;">
                <h3 class="m-5"><b>item:</b> {{$loan->item->name}}</h3>
                <div class="flex justify-between w-full">
                    <div >
                        <h3><b>last updated: </b></h3>
                        <p>{{$loan->updated_at}}</p>
                    </div>
                    <div >
                        <h3 class="text-right"><b>updated at: </b></h3>
                        <p>{{$loan->updated_at}}</p>
                    </div>
                </div>

                <h3><b>lender:</b> {{$loan->user->name}}</h3>
                <div class="flex justify-between w-full">
                    <h3><b>from:</b> <br>{{$loan->start_date}}</h3>

                    <h3 class="text-right"><b>until:</b><br>{{$loan->end_date}}</h3>
                </div>


                <div>
                    <h2><b>comments:</b> <br> </h2>
                    <p>{{$loan->comments}}</p>
                </div>

                <div class="flex flex-row justify-between item-center"  style="width: 100%">
                    @can("edit loan")
                        <a class="bg-green-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white " href="{{route("loanSystem.edit", ['loanId' => $loan->id])}}">edit loan</a>
                    @endcan
                    @can("delete loan")
                        <a class="bg-red-600 rounded px-5 py-2 mx-1 text-lg font-bold text-white " href={{route("loanSystem.delete", ['loanId' => $loan->id])}}>remove loan</a>
                    @endcan
                </div>
            </div>

        </div>
    </div>

@endsection
