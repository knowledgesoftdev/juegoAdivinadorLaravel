@extends('adminlte::page')

@section('title', 'Panel de Usuario')

@section('content_header')
    <h1>Panel Juego Adivinador</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Número Escondido</h3>
                        <h3 class="card-title">Puntos: <span id="points">{{ $totalSumaUsuario === '0.0' ? '0.0' : $totalSumaUsuario }}</span></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="group cartas"></div>
                </div>
                <div class="card-footer">

                </div>
                </form>
            </div>
        </div>
    @stop

    @section('css')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');

            .group {
                text-align: center;
            }

            .cartas {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .estiloDiv {
                width: 20%;
                height: 250px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                background-color: #343A40;
                margin: .8rem;
                border-radius: .5rem;
                font-weight: bold;
                font-size: 2rem;
                color: #fff;
                box-shadow: 0px 1px 24px -15px rgba(0, 0, 0, 0.75);
            }

            .swal2-html-container {
                font-size: 2rem;
            }

            .swal2-styled {
                font-family: 'VT323', monospace;
            }
        </style>
    @stop

    @section('js')
        <script>
            //OBTENIENDO LOS IDS
            const divCartas = document.querySelector(".cartas");
            const divs = document.querySelector(".estiloDiv");
            const point=document.querySelector("#points")

            //FUNCIONES
            crearDivs = () => {
                let numAleatorio = Math.floor(Math.random() * 20 + 1);
                for (let i = 1; i <= 20; i++) {
                    let div = document.createElement("div");
                    div.classList.add("estiloDiv");
                    let numeroDiv = document.createTextNode(i);

                    div.appendChild(numeroDiv);
                    divCartas.appendChild(div);

                    div.addEventListener("click", () => {
                        if (numAleatorio === i) {
                            Swal.fire(
                                'Good!',
                                'Enhorabuena, encontrastes el número, a que no puedes volver a intentarlo!',
                                'success'
                            )
                            guardarPuntos();
                            reiniciarJuego();
                        }

                        if (i > numAleatorio) {
                            Swal.fire(
                                'Oops...',
                                'Menos..!',
                                'error',
                            )
                        }

                        if (i < numAleatorio) {
                            Swal.fire(
                                'Oops...',
                                'Más..!',
                                'error',
                            )
                        }
                    });
                }
            };

            reiniciarJuego = () => {
                divCartas.innerHTML = "";
                crearDivs();
            };

            //EVENTOS
            window.addEventListener("load", crearDivs);

            guardarPuntos = () => {
                
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    url: '{{ route('guardar-puntuacion') }}',
                    data: {
                        puntos: 0.5
                    },
                    success: function(response) {
                        valorPuntosResponse=parseFloat(response.points);
                        valorPuntosSpan=parseFloat(points.textContent);

                        points.textContent=valorPuntosResponse+valorPuntosSpan
                       
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al guardar los puntos: ' + error);
                    }
                });
            }
        </script>
    @stop
