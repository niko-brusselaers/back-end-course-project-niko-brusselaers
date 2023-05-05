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
        $image = $request->file('image');
        $imageName = $request->input('name') . '.' . $image->getClientOriginalExtension();
        $image->store('itemImages');



        $item = new Item([
            "name" => $request->input('name'),
            "image" => "$imageName",
            "manual" => $request->input('manual') ||"",
            "comments" =>$request->input('comments')||"",
            "lendingStatus" => "available",
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        $item->save();

        return redirect()->action([inventoryManagementController::class, 'getIndex']);

    }

    function updateItem(){

    }
    function deleteItem(Request $request){
        $item = Item::find($request->itemId);
        $item->delete();
        return redirect()->action([inventoryManagementController::class, 'getIndex']);
    }
}
