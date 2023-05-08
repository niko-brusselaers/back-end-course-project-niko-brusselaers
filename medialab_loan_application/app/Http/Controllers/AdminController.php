<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class adminController extends Controller
{
    public function getIndex(){
        $user = new User();
        $users = $user->getUsers();
        return view('admin.index', ['users' => $users]);
    }

    public function getUser(Request $request){
        $user = user::find($request->input('userId'));
        return view('admin.getuser', ['user' => $user]);
    }

    public function createUser(){
        return view('admin.createUser');
    }

    public function EditUser(Request $request){
        $user = User::find($request->userId);
        return view('admin.editUser', ['user' => $user]);

    }

    public function saveUser(Request $request){

        $request->validate([
            'first_name'=> "required",
            'last_name' => "required",
            'userType' => 'required',
            'role' => 'required',
            'email' => "required",
            'password' => 'required',
            'confirmPassword' => 'required'
        ]);

        if ($request->input('password') == $request->input('confirmPassword')){

             $user = new User([
                'first_name'=> $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
                'userType' => $request->input('userType'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user->save();
            return redirect()->action([adminController::class, 'getIndex']);
        } else{
            throw \Illuminate\Validation\ValidationException::withMessages(['password' => 'passwords do not match']);
        }

    }

    public function updateUser(Request $request){

        $request->validate([
            'id' => 'required',
            'first_name'=> "required",
            'last_name' => "required",
            'userType' => 'required',
            'role' => 'required',
            'email' => "required",
        ]);

        $user = User::find($request->input('id'));

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->userType = $request->input('userType');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        $user->save();
        return redirect()->action([adminController::class, 'getIndex']);
    }

    public function deleteUser(Request $request){
        $user = User::find($request->userId);
        $user->delete();
        return redirect()->action([adminController::class, 'getIndex']);
    }



}
