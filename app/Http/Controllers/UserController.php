<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = [
            'name' => "pedro",
            'idade' => 21
        ];
        dd($user);
    }
    public function show($id)
    {

        dd("id do usuario{{$id}}");
    }
}