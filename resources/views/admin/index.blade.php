
@extends('adminlte::page')

@section('title', 'Admin | Home')
@section('plugins.Chartjs', true)
@section('content_header')
    <div class="container wrapper-content">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass-end"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Friends Cup</span>
                        <span class="info-box-number">{{$fcCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cubes"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Colectivos</span>
                        <span class="info-box-number">{{$colectivosCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Clubes</span>
                        <span class="info-box-number">{{$clubsCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios</span>
                        <span class="info-box-number">{{$usersCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@stop

@section('content')

    <div class="container wrapper-content">
        <div class="content px-3">
            @include('flash::message')
            <div class="clearfix"></div>

            <div class="card card-outline card-primary" >

                <div class="card-header d-flex">
                    <div class="col-sm-6">
                        <h2>Dashboard</h2>
                    </div>
                </div>

                <div class="card-body">
               @if(Auth::user()->hasRole('admin'))

                                    <div class="row p-2">

                                        <div class="col-sm-4 mt-2">
                                            <div class="position-relative">
                                                <a style="color:black;" target="_blank" href="{{route('autologin.escuelas-juveniles')}}" >
                                                    <div>
                                                        <img class="rounded img-fluid" src="{{asset('assets/img/home/friendscup.png')}}"
                                                             style="width: 100%; height: auto"
                                                        >
                                                    </div>
                                                </a>
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-success text-lg">
                                                        <small>Friends Cup</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 mt-2">
                                            <div class="position-relative">
                                                <a style="color:black;" target="_blank" href="{{route('autologin.colectivos')}}" >
                                                    <div>
                                                        <img class="rounded" src="{{asset('assets/img/home/cc.png')}}"
                                                             style="width: 100%; height: auto"
                                                        >
                                                    </div>
                                                </a>
                                                <div class="ribbon-wrapper ribbon-lg">
                                                    <div class="ribbon bg-success text-lg">
                                                        <small>Campañas Colectivos</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 mt-2">
                                            <div class="position-relative">
                                                <a style="color:black;" target="_blank" href="{{route('autologin.facturacion')}}" >
                                                    <div>
                                                        <img class="rounded" src="{{asset('assets/img/home/liquidacion.png')}}"
                                                             style="width: 100%; height: auto"
                                                        >
                                                    </div>
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            <small>Liquidación</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 mt-2">
                                            <div class="position-relative">
                                                <a style="color:black;" target="_blank" href="{{route('autologin.panel-control')}}" >
                                                    <div>
                                                        <img class="rounded" src="{{asset('assets/img/home/btn_pc.png')}}"
                                                             style="width: 100%; height: auto"
                                                        >
                                                    </div>
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            <small>Estadísticas</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        {{--<div class="col-sm-4 mt-2">
                                            <div class="position-relative">
                                                <a style="color:black;" target="_blank" href="{{route('autologin.federaciones')}}" >
                                                    <div>
                                                        <img class="rounded" src="{{asset('assets/img/home/btn_pc.png')}}"
                                                             style="width: 100%; height: auto"
                                                        >
                                                    </div>
                                                    <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                            <small>Federaciones</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>--}}

                                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
@stop

@section('js')
@stop
