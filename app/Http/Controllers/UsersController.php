<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;
use auctionTime\User;

class UsersController extends Controller
{
    public function show()
    {
        $users = User::bestUsers();

        return view('users.show', compact('users'));
    }

    public function update(){
        return view('users.update', ["sqqds", "sqdsqd"]);
    }

    public function store(){
        $id = Auth::user()->id;
        $user = User::find($id);
    }
}
