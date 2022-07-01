<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('user.index');


        return view('users.show', compact('user'));
    }
    public function create()
    {
        return view("users.create");
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');
    }
}