<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function getIndex(){
        $user = new User();
        $users = $user->getUsers();
        return view('admin.index', ['users' => $users]);
    }

    public function getUser(){

    }

    public function createUser(){

    }

    public function EditUser(){

    }



}
