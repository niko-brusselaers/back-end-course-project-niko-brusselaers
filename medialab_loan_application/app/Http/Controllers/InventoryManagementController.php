<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryManagementController extends Controller
{
    //

    public function index(Request $request){
        $items = Item::all();
        if ($request->input('searchfield') != null){
            $items = $items->where('name', 'LIKE', $request->input('searchfield'));
        }

        if ($request->input('isAvailable') != null){
            $loan_items = Loan::all()->pluck('item_id');
            foreach ($loan_items->all() as $item_id){
                $items = $items->where('id', '!=', $item_id);
            }
        }
        return view("content.inventoryManagement.index", ['items' => $items->all()]);
    }

    function create(){
        return view('content.inventoryManagement.create');
    }

    public function edit(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);
        return view('content.inventoryManagement.edit', ['item' => $item]);
    }

    public function show(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);
        return view('content.inventoryManagement.itemDetails', ['item' => $item]);
    }



    public function saveItem(Request $request){

        $request->validate([
            "name"=> "required|min:5|max:60",
            "image"=>"required",
            "manual"=>"max:500",
            "comments"=>"max:500"
        ]);

        $request = $request->all();

        $image = $request['image'];
        $imagePath = $image->store('itemImages');


        $item = new Item([

            "name" => $request['name'],
            "image" => "$imagePath",
            "manual" => $request['manual'],
            "comments" => $request['comments'],
            "lendingStatus" => "available",
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        $item->save();

        return redirect()->action([inventoryManagementController::class, 'getIndex']);
    }

    public function editItem(Request $request){
        $request->validate([
            "name"=> "required|min:5|max:60",
            "image"=>"image",
            "manual"=>"max:500",
            "comments"=>"max:500"
        ]);



        $item = Item::find($request->input('id'));

        $item->name = $request->input('name');
        $item->manual = $request->input('manual');
        $item->comments = $request->input('comments');

        if ($request->hasFile('image') ){
            Storage::delete($item->image);
            $image = $request->file('image');
            $item->image = $image->store('itemImages');

        }

        $item->save();

        return redirect()->action([inventoryManagementController::class, 'getIndex']);

    }

    function deleteItem(Request $request){
        $item = new Item();
        $item->deleteItem($request->input('itemId'));
        return redirect()->action([inventoryManagementController::class, 'getIndex']);
    }
}
