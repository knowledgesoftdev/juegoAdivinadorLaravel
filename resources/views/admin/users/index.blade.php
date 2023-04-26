@extends('adminlte::page')

@section('title', 'Panel de Usuario')

@section('content_header')
<h1>Panel de Usuario</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Usuario</h3>
            </div>
            <form method="POST" action="{{route('users.update',$user->id)}}">
                @method("PUT")
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nameUser">Datos Personales</label>
                        <input type="text" class="form-control" id="nameUser" name="nameUser" disabled placeholder="Nombres" value="{{$user->name}}">                        
                    </div>
                    <div class="form-group">
                        <label for="userName">Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" disabled placeholder="Usuario" value="{{$user->username}}">
                    </div>
                    <div class="form-group">
                        <label for="emailUser">Email</label>
                        <input type="email" class="form-control" id="emailUser" name="emailUser" disabled placeholder="Email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="card-footer">
                    <div id="btnEditar" class="btn btn-secondary">Editar</div>
                    <button type="submit" disabled id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Imagen</h3>
            </div>
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="imgUser">Imagen de Perfil</label>
                        <input type="file" class="form-control" id="imgUser">
                    </div>
                    <div class="form-group text-center">
                        <img width="150" height="150" src="{{asset('assets/images')}}/{{$user->img}}" alt="">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @stop

    @section('css')
    
    @stop

    @section('js')
    <script>
        const btnEditar = document.querySelector("#btnEditar")
        const inputName = document.querySelector("#nameUser")
        const emailUser = document.querySelector("#emailUser")
        const userName = document.querySelector("#userName")
        const btnGuardar=document.querySelector("#btnGuardar")


        habilitarCampos = () => {
            inputName.disabled = false
            emailUser.disabled = false
            userName.disabled = false
            btnGuardar.disabled=false
            inputName.focus()
        }

        btnEditar.addEventListener("click", habilitarCampos)
    </script>
    @stop