<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAutentificado=Auth()->user()->id;
        $user=User::find($userAutentificado);
        return view('admin.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$userAutentificado)
    {


    //Validamos el usuario autentificado y obtenemos su id
    $userAutentificado=Auth()->user()->id;

    //Aqui buscamos al usuario
    $user=User::find($userAutentificado);

    $user->name=strtoupper($request->input('nameUser'));
    $user->username=strtoupper($request->input('userName'));
    $user->email=strtoupper($request->input('emailUser'));

    $user->save();

    return redirect()->back()->with('success', 'Datos guardados, correctamente'); 
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
