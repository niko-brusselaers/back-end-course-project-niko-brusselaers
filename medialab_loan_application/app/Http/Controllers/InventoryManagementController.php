<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InventoryManagementController extends Controller
{

    /**
     * display inventory management index, containing a list of items
     */
    public function index(Request $request){
        //if user has typed something in searchField, filter all items containing value of input
        if ($request->input('searchfield') != null){
            $items = DB::table('items')
                        ->where('name', 'LIKE', '%'.$request->input('searchfield').'%')
                        ->get();
        } else{
            $items = Item::all();
        }
        //if user has selected is available checkbox, give all items that do not have a loan currently
        if ($request->input('isAvailable') != null){
            $loan_items = Loan::all()->pluck('item_id');
            foreach ($loan_items->all() as $item_id){
                $items = $items->where('id', '!=', $item_id);
            }
        }
        //redirect to index page of inventory management
        return view("content.inventoryManagement.index", ['items' => $items->all()]);
    }

    /**
     * display form to create a new item inside database
     */
    function create(){
        //redirect to create page of inventory management
        return view('content.inventoryManagement.create');
    }

    /**
     * display a form to uodate details of existing item
     */
    public function edit(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);

        //redirect to edit page of inventory management
        return view('content.inventoryManagement.edit', ['item' => $item]);
    }

    /**
     * display more details of specific item
     */
    public function show(Request $request){
        $item = new Item;
        $item = $item->getItem($request['itemId']);

        //redirect to item details page
        return view('content.inventoryManagement.show', ['item' => $item]);
    }



    /**
     * save new item to database
     */
    public function save(Request $request){

        //check if all form inputs where filled in
        $request->validate([
            "name"=> "required|min:5|max:60",
            "image"=>"required",
            "manual"=>"max:500",
            "comments"=>"max:500"
        ]);

        $request = $request->all();

        //get image from request and store in folder itemImages
        $image = $request['image'];
        $imagePath = $image->store('itemImages');


        //create a new item containing values from form input
        $item = new Item([

            "name" => $request['name'],
            "image" => "$imagePath",
            "manual" => $request['manual'],
            "comments" => $request['comments'],
            "lendingStatus" => "available",
            "created_at"=> date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        //save item to database
        $item->save();
        //redirect to index page of inventory management
        return redirect()->action([InventoryManagementController::class, 'index']);
    }

    /**
     * update existing item with new values from form
     */
    public function update(Request $request){

        //check if all form inputs where filled in
        $request->validate([
            "name"=> "required|min:5|max:60",
            "image"=>"image",
            "manual"=>"max:500",
            "comments"=>"max:500"
        ]);


        //find item by id
        $item = Item::find($request->input('id'));
        //update values of item acquired by form input
        $item->name = $request->input('name');
        $item->manual = $request->input('manual');
        $item->comments = $request->input('comments');

        //if input has a new image,
        //remove old image and replace with image from form
        if ($request->hasFile('image') ){
            Storage::delete($item->image);
            $image = $request->file('image');
            $item->image = $image->store('itemImages');

        }

        //save item with updated values
        $item->save();
        //redirect to index page of inventory management
        return redirect()->action([InventoryManagementController::class, 'index']);

    }

    /**
     * find item by id and delete form database
     */
    function delete(Request $request){
        $item = new Item();
        $item->deleteItem($request->input('itemId'));
        //redirect to index page of inventory management
        return redirect()->action([InventoryManagementController::class, 'index']);
    }
}
