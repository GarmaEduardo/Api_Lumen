<?php
namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller{

    public function index(){

        return Users::all();
    }


    public function store(Request $request){

        $datos = $request->all();
        Users::create($datos);

        return response()->json([
            'res' => true,
            'message' => 'Usuario registrado correctamente'
        ]);

    }
}