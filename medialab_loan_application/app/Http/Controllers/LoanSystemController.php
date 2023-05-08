<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Validation\ValidationException;

class LoanSystemController extends Controller
{
    //
    public function index(){
        $loans = Loan::all();
        return view('content.loanSystem.index', ['loans' => $loans]);
    }

    public function get(Request $request){
        $loan = Loan::find($request->input('loanId'));
        return view('content.loanSystem.get', ['loan' => $loan]);
    }
    public function edit(Request $request){
        $loan = Loan::find($request->input('loanId'));
        return view('content.loanSystem.edit', ['loan' => $loan]);
    }

    public function create(){
        return view('content.loanSystem.create');
    }

    public function CreateLoan(Request $request){
        $request->validate([
            'itemName' => 'required',
            'email'=> 'required',
            'startDate'=> 'required',
            'endDate' => 'required',
            'comments' => 'max:500'
        ]);


        $item = DB::table('items')
                    ->where('name','=', $request->input('itemName'))
                    ->get();
        $user = DB::table('users')
                ->where('email','=', $request->input('email'))
                ->get();

        if ($item->isEmpty()){
            return redirect()->back()->withErrors(['item'=> 'item does not exist']);
        } elseif ($item[0]->isLending =! 'available'){
            return redirect()->back()->withErrors(['item' => 'item is lent out']);
        } elseif ($user->isEmpty()){
            return redirect()->back()->withErrors(['user' => 'item is lent out']);
        }

        $loan = new Loan([
            'item_id' => $item[0]->id,
            'user_id' => $user[0]->id,
            'comments' => $request->all()['comment'],
            'start_date'=> $request->input('startDate'),
            'end_date' => $request->input('endDate'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $loan->save();
        return redirect()->action([LoanSystemController::class, "index"]);
    }

    public function delete(Request $request){
        $loan = Loan::find($request->loanId);
        $loan->delete();
        return redirect()->action([LoanSystemController::class, "index"]);
    }


}
