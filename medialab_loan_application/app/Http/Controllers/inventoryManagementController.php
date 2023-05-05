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

    function  editView(Request $request){
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
            "image"=>"required|image",
            "manual"=>"max:500",
            "comments"=>"max:500"
            ]);
        $image = $request->file('image');
        $imageName = $request->input('name') . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->store('itemImages');



        $item = new Item([
            "name" => $request->input('name'),
            "image" => "$imagePath",
            "manual" => $request->input('manual') ||"",
            "comments" =>$request->input('comments')||"",
            "lendingStatus" => "available",
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        $item->save();

        return redirect()->action([inventoryManagementController::class, 'getIndex']);

    }

    function editItem(Request $request){
        $request->validate([
            "id" => "required",
            "name"=> "required|min:5|max:60",
            "image"=>"image",
            "manual"=>"max:500",
            "comments"=>"max:500"
        ]);



        $item = Item::find($request->input('id'));

        $item->name = $request->input('name');
        $item->manual = $request->input('manual');
        $item->comments = $request->input('comments');

        if ($request->hasFile('image')){
            Storage::delete($item->image);
            $image = $request->file('image');
            $request->input('name') . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->store('itemImages');
            $item->image = $imagePath;

        }

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
