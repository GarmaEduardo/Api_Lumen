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
        $this->validateData($request);

        $input = $request->all();
        Directorio::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro insertado'
        ]);
           
    }

    public function update($id, Request $request){
        $this->validateData($request, $id);
        $input = $request->all();
        $directorio = Directorio::find($id);
        $directorio->update($input);

        if($directorio){
            return response()->json([
                'res' => true,
                'message' => 'Registro actualizado correctamente'
            ]);
        }
        else{
            return response()->json([
                'res' => false,
                'message' => 'Datos no validos'
            ]);
        }
           
    }

    public function delete($id){

        Directorio::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado'
        ]);
    }

    private function validateData(Request $request,  $id = null){

        $ruleUpdate = is_null($id) ? '' : ',' . $id;

        $this->validate($request, [
            'nombre_completo' => 'required|min:3|max:100',
            'telefono' => 'required|unique:directorios,telefono'. $ruleUpdate
            
        ]);
    }



    
}