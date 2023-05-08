<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;

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

    public function delete(){

    }


}
