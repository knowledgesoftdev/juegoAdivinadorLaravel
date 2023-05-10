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
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nameUser">Datos Personales</label>
                            <input type="text" class="form-control" id="nameUser" name="nameUser" disabled
                                placeholder="Nombres" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="userName">Username</label>
                            <input type="text" class="form-control" id="userName" name="userName" disabled
                                placeholder="Usuario" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label for="emailUser">Email</label>
                            <input type="email" class="form-control" id="emailUser" name="emailUser" disabled
                                placeholder="Email" value="{{ $user->email }}">
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
                <form id="formImagen" method="POST" enctype="multipart/form-data"
                    action="{{ route('save-image', $user->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="imgUser">Imagen de Perfil</label>
                            <input type="file" id="imgUser" disabled class="form-control" id="imgUser"
                                name="imgUser">
                        </div>
                        <div class="form-group text-center">
                            <img width="150" height="150" id="profile-image"
                                src="{{ asset('assets/images') }}/{{ $user->img == '' ? 'no-image.png' : $user->img }}"
                                alt="{{ $user->img }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <div id="btnEditarSave" class="btn btn-secondary">Editar</div>
                        <button type="submit" disabled id="btnGuardarSave" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @stop


    @section('js')
        <script>
            const btnEditar = document.querySelector("#btnEditar")
            const btnGuardar = document.querySelector("#btnGuardar")

            const inputName = document.querySelector("#nameUser")
            const emailUser = document.querySelector("#emailUser")
            const userName = document.querySelector("#userName")


            const btnEditarSave = document.querySelector("#btnEditarSave")
            const btnGuardarSave = document.querySelector("#btnGuardarSave")
            const imgUser = document.querySelector("#imgUser")
            const profileImage = document.querySelector("#profile-image")


            imgUser.addEventListener('change', function() {
                var file = this.files[0];
                var reader = new FileReader();

                reader.addEventListener('load', function() {
                    profileImage.setAttribute('src', reader.result);
                });

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    profileImage.setAttribute('src', "{{ asset('assets/images/no-image.png') }}");
                }
            });


            habilitarCampos = () => {
                inputName.disabled = false
                emailUser.disabled = false
                userName.disabled = false
                btnGuardar.disabled = false
                inputName.focus()
            }

            habilitarCamposSave = () => {
                btnGuardarSave.disabled = false
                imgUser.disabled = false
            }

            saveImg = () => {

                $('#formImagen').submit(function(event) {
                    event.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ route('save-image') }}',
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: formData,

                        success: function(response) {
                            if (response.error) {
                                console.error('Error al guardar la imagen: ' + response.error);
                            } else {
                                Swal.fire(
                                    'Good!',
                                    'Enhorabuena, Foto de perfil guardada satisfactoriamente!',
                                    'success'
                                )
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error al guardar la imagen: ' + error);
                        }   
                    });
                });

            }

            btnEditar.addEventListener("click", habilitarCampos);
            btnEditarSave.addEventListener("click", habilitarCamposSave);

            btnGuardarSave.addEventListener("click", saveImg);
        </script>
    @stop
