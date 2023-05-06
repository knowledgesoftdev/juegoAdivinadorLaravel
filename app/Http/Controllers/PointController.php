<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function index(){
        $userAutentificado=Auth()->user()->id;

        $totalSumaUsuario=DB::table("points")->where('user_id',$userAutentificado)->sum('points');
        
        return view('admin.points.index',compact('totalSumaUsuario'));
    }

    public function guardarDatos(Request $request){
        //Obtener el usuario autenticado
        $usuario=Auth::user()->id;
    
        $point=Point::create([
            'user_id'=>$usuario,
            'points'=>$request->input('puntos')
        ]);

        $point->save();

        return response()->json(['points' => $request->input('puntos')]);

    }
}
