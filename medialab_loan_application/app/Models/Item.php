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
        'lendingStatus'
    ];
    function getItems(){

        return Item::all();
    }

    function getItem($id){
        return Item::where('id', $id)->first();
    }

    function deleteItem($id){
        return Item::find('id',$id)->first();
    }
}
