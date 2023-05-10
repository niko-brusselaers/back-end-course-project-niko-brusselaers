<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'manual',
        'comments',
    ];
    public function getItems(){

        return Item::all();
    }

    public function getItem($id){
        return Item::where('id', $id)->first();
    }

    public function deleteItem($id){
        $item = Item::find($id)->first();
        $item->delete();
    }
}
