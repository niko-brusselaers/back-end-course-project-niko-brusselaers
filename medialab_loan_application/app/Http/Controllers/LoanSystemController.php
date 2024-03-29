<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class LoanSystemController extends Controller
{
    /**
     * display index of loans system, containing a list of loans
     */
    public function index(Request $request){



        //if searchfield is filled, filter list of loans where loan name partly matches searchfield input
        if ($request->input('searchfield') != null){
            $loans = DB::table('loans')
                ->join('items', 'loans.item_id', '=', 'items.id')
                ->join('users','loans.user_id', '=', 'users.id')
                ->select('items.name as item_name', 'items.image','users.name as user_name', 'loans.id','loans.start_date','loans.end_date')
                ->where('items.name', 'like', '%'.$request->input('searchfield').'%')
                ->get();
        } else{
            $loans = DB::table('loans')
                ->join('items', 'loans.item_id', '=', 'items.id')
                ->join('users','loans.user_id', '=', 'users.id')
                ->select('items.name as item_name', 'items.image','users.name as user_name', 'loans.id','loans.start_date','loans.end_date')
                ->get();
        }

        //if startDate is filled, get all loans where loan start_date is after form startDate
        if ($request->input('startDate')!=null){
            $loans = $loans->where('start_date', '>=', $request->input('startDate'));
        }

        //if endDate is filled, get all loans where loan end_date is before form endDate
        if ($request->input('endDate')!=null){
            $loans = $loans->where('end_date', '<=', $request->input('endDate'));
        }

        //return index page of loan system
        return view('content.loanSystem.index', ['loans' => $loans]);
    }

    /**
     * display detail page of loan
     */
    public function show(Request $request){
        $loan = Loan::find($request->input('loanId'));
        //return detail page of a loan
        return view('content.loanSystem.show', ['loan' => $loan]);
    }

    /**
     * display form to edit loan details
     */
    public function edit(Request $request){
        $loan = Loan::find($request->input('loanId'));
        //return edit page of loan system
        return view('content.loanSystem.edit', ['loan' => $loan]);
    }

    /**
     * display form to create loan
     */
    public function create(){
        //get all users name and email adress
        $users = DB::Table('users')
            ->select('name','email')
            ->get();

        //get all item names
        $items = Item::all()->pluck('name');
        $data = ['users' => $users, "items" => $items];

        //return create page of loan system
        return view('content.loanSystem.create', $data);
    }

    /**
     * save a loan to database
     */
    public function save(Request $request){

        //check if all form inputs where filled in
        $request->validate([
            'itemName' => 'required',
            'email'=> 'required',
            'startDate'=> 'required',
            'endDate' => 'required',
            'comment' => 'max:500'
        ]);

        //get selected item details
        $item = DB::table('items')
            ->where('name','=', $request->input('itemName'))
            ->get()
            ->first();

        //get selected user details
        $user = DB::table('users')
            ->where('email','=', $request->input('email'))
            ->get()
            ->first();
        //if no item could be found throw back error
        if (empty($item)){
            return redirect()->back()->withErrors(['item'=> 'item does not exist']);
        }

        //if no user could be found throw back error
        if (empty($user)){
            return redirect()->back()->withErrors(['user' => 'user does not exist']);
        }

        //check if item doesn't already have any loans
        $itemLoans = DB::table('loans')
            ->where('item_id', '=',$item->id )
            ->get();
        //if item already has a loan, check if it is available during the selected time
        if ($itemLoans->isNotEmpty()){
            $startDate = date($request->input('startDate'));
            $endDate = $request->input('endDate');
            $loanedOutQueryStartDate = $itemLoans->whereBetween('start_date',[$startDate,$endDate])->first();
            $loanedOutQueryEndDate = $itemLoans->whereBetween('end_date',[$startDate,$endDate])->first();
            //if it unavailable, send back error stating loan lend out period
            if ( !empty($loanedOutQueryStartDate )){
                return redirect()->back()->withErrors(['item'=> "{$request->input('itemName')} is loaned out from {$loanedOutQueryStartDate->start_date} and  {$loanedOutQueryStartDate->end_date}"]);
            }
            if (!empty($loanedOutQueryEndDate)){
                return redirect()->back()->withErrors(['item'=> "{$request->input('itemName')} is loaned out from {$loanedOutQueryEndDate->start_date} and  {$loanedOutQueryEndDate->end_date}"]);
            }
        }

        //create a new loan with details from form
        $loan = new Loan([
            'item_id' => $item->id,
            'user_id' => $user->id,
            'comment' => $request->all()['comment'],
            'start_date'=> $request->input('startDate'),
            'end_date' => $request->input('endDate'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //save loan to database
        $loan->save();

        //redirect to index page of loan system
        return redirect()->action([LoanSystemController::class, "index"]);
    }

    public function update(Request $request){

        //check if all form inputs where filled in
        $request->validate([
            'id' => 'required',
            'endDate' => 'required',
            'comment' => 'max:500'
        ]);

        //find loan by id
        $loan = Loan::find($request->input('id'));

        //update values from loan by data acquired from form
        $loan->end_date = $request->input('endDate');
        $loan->comment = $request->all()['comment'];

        //save updated loan to database
        $loan->save();

        //redirect to index page of loan system
        return redirect()->action([LoanSystemController::class, "index"]);

    }

    /**
     * find loan by id and delete it from database
     */
    public function delete(Request $request){
        $loan = Loan::find($request->loanId);
        $loan->delete();
        return redirect()->action([LoanSystemController::class, "index"]);
    }


}
