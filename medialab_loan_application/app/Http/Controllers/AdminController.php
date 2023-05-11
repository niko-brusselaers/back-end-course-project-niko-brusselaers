<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class adminController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        if ($request->input('searchfield') != null){
            $users = $users->where('name', 'LIKE', $request->input('searchfield'));
        }
        if ($request->input('userType') != null ){
            if ($request->input('userType') != "all"){
                $users = $users->where('userType', 'LIKE', $request->input('userType'));
            }

        }

        return view('admin.index', ['users' => $users->all()]);
    }



    public function show(Request $request){
        $user = user::find($request->input('userId'));
        return view('admin.show', ['user' => $user]);
    }

    public function create(){
        return view('admin.create');
    }

    public function edit(Request $request){
        $user = User::find($request->userId);
        return view('admin.edit', ['user' => $user]);

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
                'name'=> $request->input('first_name').' '.$request->input('last_name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
                'userType' => $request->input('userType'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $user->save();
            return redirect()->action([adminController::class, 'index']);
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
        return redirect()->action([adminController::class, 'index']);
    }

    public function deleteUser(Request $request){
        $user = User::find($request->userId);
        $user->delete();
        return redirect()->action([adminController::class, 'index']);
    }



}
