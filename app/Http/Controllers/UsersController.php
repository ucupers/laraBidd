<?php

namespace auctionTime\Http\Controllers;

use auctionTime\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use auctionTime\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Show all users
    public function index()
    {
        $users = User::bestUsers();
        return view('users.show', compact('users'));
    }

    //Edit user
    public function edit(User $user){
        if (Auth::user()->id == $user->id)
        {
            return view('users.edit', compact('user'));
        }
        else {
            return redirect(route('usersIndex'));
        }
    }

    //Store ONE user
    public function store(UpdateUserRequest $request){

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ( ! $request->password == '')
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $request->session()->flash('status', 'Task was successful!');
        return redirect(route('usersIndex'));
    }


    //Show ONE user
    public function show(User $user)
    {
        $data = User::userShow($user);
        return view('users.single', compact('user', 'data'));
    }
}
