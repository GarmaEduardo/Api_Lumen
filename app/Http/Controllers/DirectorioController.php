<?php
namespace App\Http\Controllers;

use App\Models\Directorio;
use Illuminate\Http\Request;


class DirectorioController extends Controller{

    //Get
    public function index(Request $request){

        if ($request->has('txtBuscar')){

            return Directorio::whereTelefono($request->txtBuscar)->orWhere('nombre_completo', 'like', '%' .$request->txtBuscar.'%')->get();
        }else{
            return Directorio::all();
        }

    

    }
    //Get
    public function show($id){
        return Directorio::findOrFail($id);

    }

    //Post
    public function store(Request $request){

        $this->validate($request, [
            'nombre_completo' => 'required|min:3|max:100',
            'telefono' => 'required|unique:directorios,telefono'
            
        ]);

        $input = $request->all();
        Directorio::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado'
        ]);
           
    }
}