<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(){
        return view('users.update');
    }

    public function update(){
        return view('users.update');
    }

    public function store(){
        $id = Auth::user()->id;
        $user = User::find($id);
        dd($user);
    }
}
