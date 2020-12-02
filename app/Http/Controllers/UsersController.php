<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Post
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado'
        ]);
    }


    public function login(Request $request){
        
    }
}
