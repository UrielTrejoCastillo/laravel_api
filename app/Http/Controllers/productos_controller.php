<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\productos_model;

class productos_controller extends Controller
{
    
    public function listar_producto(){
        $productos = productos_model::all();
        return $productos;
    }

    public function registrar(Request $request){
        $producto = new productos_model();

        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        if($producto->save()){
            return "Guardado correctamente";
        }else{
            return "No se guardo el producto";
        }
    }
}
