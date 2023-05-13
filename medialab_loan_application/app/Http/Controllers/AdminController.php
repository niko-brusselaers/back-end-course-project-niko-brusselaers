<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * display admin index, containing a list of user
     */
    public function index(Request $request){
        $users = User::all();
        //if user has typed something in searchField, filter all users containing value of input
        if ($request->input('searchfield') != null){
            $users = $users->where('name', 'LIKE', $request->input('searchfield'));
        }
        //if user has selected a user type, filter all user and only show users having selected user type.
        if ($request->input('userType') != null ){
            if ($request->input('userType') != "all"){
                $users = $users->where('userType', 'LIKE', $request->input('userType'));
            }

        }

        //redirect to index page of admin
        return view('admin.index', ['users' => $users->all()]);
    }



    /**
     * display more details about one user
     */
    public function show(Request $request){
        $user = user::find($request->input('userId'));

        //redirect to detail page of a user
        return view('admin.show', ['user' => $user]);
    }

    /**
     * display form to create a new user
     */
    public function create(){
        //redirect to create page of admin
        return view('admin.create');
    }

    /**
     * display form to update user details
     */
    public function edit(Request $request){
        $user = User::find($request->userId);

        //redirect to edit page of admin
        return view('admin.edit', ['user' => $user]);

    }

    /**
     * save a new user to database
     */
    public function save(Request $request){

        //check if all form inputs where filled in
        $request->validate([
            'first_name'=> "required",
            'last_name'=> "required",
            'userType' => 'required',
            'role' => 'required',
            'email' => "required",
            'password' => 'required|confirmed',
        ]);

        //create a new user and enter in data from form
         $user = new User([
            'name'=> $request->input('first_name').' '.$request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'userType' => $request->input('userType'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
         //give user selected role
        $user->assignRole($request->input('role'));
        //save user to the database
        $user->save();

        //redirect to index page of admin
        return redirect()->action([AdminController::class, 'index']);

    }

    /**
     * update existing user and save to database
     */
    public function update(Request $request){

        //check if all form inputs where filled in

        $request->validate([
            'id' => 'required',
            'name'=> "required",
            'userType' => 'required',
            'role' => 'required',
            'email' => "required",
        ]);

        //find user by id
        $user = User::find($request->input('id'));

        //enter update user data from form
        $user->name = $request->input('name');
        $user->userType = $request->input('userType');
        $user->email = $request->input('email');
        //assign selected role
        $user->assignRole($request->input('role'));
        //save updated user to database
        $user->save();

        //redirect to index page of admin
        return redirect()->action([AdminController::class, 'index']);
    }


    /**
     * find user by id and remove from database
     */
    public function delete(Request $request){
        $user = User::find($request->userId);
        $user->delete();
        //redirect to index page of admin
        return redirect()->action([AdminController::class, 'index']);
    }



}
