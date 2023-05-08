<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class inventoryManagementController extends Controller
{
    //

    function getIndex(){
        $item = new item();
        $items = $item->getItems();
        return view("content.inventoryManagement.index", ['items' => $items]);
    }

    function createView(){
        return view('content.inventoryManagement.create');
    }

    function editView(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);
        return view('content.inventoryManagement.edit', ['item' => $item]);
    }

    function getItem(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);
        return view('content.inventoryManagement.itemDetails', ['item' => $item]);
    }



    function saveItem(Request $request){

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

    function editItem(Request $request){
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

    function updateItem(){

    }
    function deleteItem(Request $request){
        $item = new Item();
        $item->deleteItem($request->input('itemId'));
        return redirect()->action([inventoryManagementController::class, 'getIndex']);
    }
}
