@extends('adminlte::page')
@section('title', 'Home')

@section('content_header')
    <h1>HomePage</h1>
@stop

@section('content')
    <div class="min-vh-100">
        @include('flash::message')

        <div class="container-fluid h-100">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <span><strong>{{$user->name}}</strong> </span>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        {{--TABLA DE PROCESOS--}}
                        <div class="card-body">
                           <p>

                           </p>
                        </div>

                        <div class="card-footer">

                        </div>
                    </div>
        </div>

        <div class="container-fluid h-100">
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{env('APP_NAME')}}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                {{--<h5 class="card-title">Create first milestone</h5>--}}
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            {{--TABLA DE PROCESOS--}}
                            <div class="card-body">

                            </div>

                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

