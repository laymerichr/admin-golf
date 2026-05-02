
@extends('adminlte::page')

{{--@section('title', 'Usuario | Perfil)--}}

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Usuario Detalles</h4>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0] !== 'admin')
                        <div class="col-sm-6 float-right">
                            <a class="btn btn-danger float-right"
                               href="{{ route('home') }}">
                                {{ __('experts.return') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                @include('flash::message')
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    @include('homepage.users.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
