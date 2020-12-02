<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
 

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
        $user = User::whereEmail($request->email)->first();
       
        $password = Hash::make($request->password);
       

        if(! is_null($user)){
            if(Hash::check($request->password, $user->password)){

            $user->api_token = Str::random( 150);
            $user->save();

            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'contraseña de la base de datos' => $user->password,
                'contraseña introducida' => $request->password,
                'message' => 'Bienvenido al sistema'
            ]);

            }
            else{
                return response()->json([
                    'res' => false,
                    'message' => 'Contraseña incorrecta',
                ]);
            }


        }else{
            return response()->json([
                'res' => false,
                'message' => 'Error de inicio'
            ]);
        }

        
    }
}
