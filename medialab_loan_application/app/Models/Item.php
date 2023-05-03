<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' => 'string',
        'image' => 'blob',
        'manual'=> 'string',
        'comments' =>'string',
        'lendingStatus' => 'string'
    ];
    function getItems(){

        return Item::all();
    }

    function getItem($id){
        return Item::where('id', $id)->first();
    }
}
