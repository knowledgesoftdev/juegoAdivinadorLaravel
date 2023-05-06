@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tabla Puntuación Diaria</h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 500px;" >
                    <table class="table table-bordered text-center table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Puntajes</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($points as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->points }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y | h:m:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tabla Puntuación Mensual</h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    @stop
