<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = [
            'name' => "pedro",
            'idade' => 21
        ];
        dd($user);
    }
    public function show($id)
    {
        $array = [];

        dd("id do usuario{{$id}}");
    }
}