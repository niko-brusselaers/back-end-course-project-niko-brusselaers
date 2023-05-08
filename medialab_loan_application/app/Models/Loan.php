<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date",
        'item_id',
        "comments",
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getLoans(){
        return Loan::all();
    }

    public function getLoan($id){
        return Loan::find($id)->first();
    }

    public function deleteLoan($id){
        $item = Item::find($id)->first();
        $item->delete();
    }
}
