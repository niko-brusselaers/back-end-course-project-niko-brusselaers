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
        $users = DB::Table('users')
                        ->select('first_name','last_name','email')
                        ->get();
        $items = Item::all()->pluck('name');
        $data = ['users' => $users, "items" => $items];

        return view('content.loanSystem.create', $data);
    }

    public function CreateLoan(Request $request){
        $request->validate([
            'itemName' => 'required',
            'email'=> 'required',
            'startDate'=> 'required',
            'endDate' => 'required',
            'comment' => 'max:500'
        ]);

        $item = DB::table('items')
                    ->where('name','=', $request->input('itemName'))
                    ->get();
        $item = $item->all();
        $user = DB::table('users')
                ->where('email','=', $request->input('email'))
                ->get();

        if (!count($item)){
            return redirect()->back()->withErrors(['item'=> 'item does not exist']);
        }
        if (!count($user)){
            return redirect()->back()->withErrors(['user' => 'user does not exist']);
        }

        $itemLoans = DB::table('loans')
                        ->where('item_id', '=',$item[0]->id )
                        ->get();
        if ($itemLoans->isNotEmpty()){
            $startDate = date($request->input('startDate'));
            $endDate = $request->input('endDate');
            $loanedOutQueryStartDate = $itemLoans->whereBetween('start_date',[$startDate,$endDate])->all();
            $loanedOutQueryEndDate = $itemLoans->whereBetween('end_date',[$startDate,$endDate])->all();

            if (count($loanedOutQueryStartDate)){
                return redirect()->back()->withErrors(['item'=> "{$request->input('itemName')} is loaned out from {$loanedOutQueryStartDate[0]->start_date} and  {$loanedOutQueryStartDate[0]->end_date}"]);
            }
            if (count($loanedOutQueryEndDate)){
                dd($loanedOutQueryEndDate);
                return redirect()->back()->withErrors(['item'=> "{$request->input('itemName')} is loaned out from {$loanedOutQueryEndDate->start_date} and  {$loanedOutQueryEndDate->end_date}"]);
            }
        }

        $loan = new Loan([
            'item_id' => $item[0]->id,
            'user_id' => $user[0]->id,
            'comment' => $request->all()['comment'],
            'start_date'=> $request->input('startDate'),
            'end_date' => $request->input('endDate'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $loan->save();
        return redirect()->action([LoanSystemController::class, "index"]);
    }

    public function editLoan(Request $request){
        $request->validate([
            'id' => 'required',
            'endDate' => 'required',
            'comment' => 'max:500'
        ]);

        $loan = Loan::find($request->input('id'));

        $loan->end_date = $request->input('endDate');
        $loan->comment = $request->all()['comment'];

        $loan->save();
        return redirect()->action([LoanSystemController::class, "index"]);

    }

    public function delete(Request $request){
        $loan = Loan::find($request->loanId);
        $loan->delete();
        return redirect()->action([LoanSystemController::class, "index"]);
    }


}
