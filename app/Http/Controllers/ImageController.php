<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function saveImage(Request $request){
        $usuario=Auth::user()->id;
        $usuarioLogueado=User::find($usuario);

        //nombre a la imagen
        $imageName = time().'.'.$request->imgUser->extension();  
       
        //movemos la imagen a la carpeta
        $request->imgUser->move(public_path('assets/images'), $imageName);

        //guardamos en nombre en la base de datos.
        $usuarioLogueado->img=$imageName;
        $usuarioLogueado->save();

        if($usuarioLogueado->save()){
            return response()->json(['usuarioLogueado' => "Save"]);
        } else {
            return response()->json(['error' => "Error al guardar la imagen"]);
        }
    }

}
