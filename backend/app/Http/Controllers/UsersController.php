<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function list()
    {
        $users = User::with('address.geo')->with('company')->get();
        return response()->json($users);
    }
}
