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
        if (!$user = User::find($id)) {
            return redirect()->route('user.index');
        }

        return view('users.show', compact('user'));
    }
}