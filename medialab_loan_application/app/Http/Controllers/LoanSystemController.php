<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $item = DB::table('items')->where('name','=', $request->input('item Name'));
        dd($item);
    }

    public function delete(Request $request){
        $loan = Loan::find($request->loanId);
        $loan->delete();
        return redirect()->action([LoanSystemController::class, "index"]);
    }


}
