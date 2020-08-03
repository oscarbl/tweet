<?php

namespace App\Http\Controllers;

use App\User;
use App\Entry;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user)
    {
        //Query by user_id == $user->id
        $entries = Entry::where('user_id', $user->id)->get();
        //Add entries to return view
        return view('users.show', compact('user','entries'));
    }
}
