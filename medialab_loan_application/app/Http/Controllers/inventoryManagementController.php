<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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



    function saveItem(){

    }

    function updateItem(){

    }
    function deleteItem(){

    }
}
