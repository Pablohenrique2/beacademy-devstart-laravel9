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
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}