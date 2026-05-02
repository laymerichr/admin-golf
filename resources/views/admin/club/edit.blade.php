
@extends('adminlte::page')

@section('title', 'Editar Entrada')

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">
        <div class="card-outline card card-primary">
            <div class="card-header d-flex">
                <div class="col-sm-12">
                    <h2>Editar Entrada</h2>
                </div>
            </div>

            @include('adminlte-templates::common.errors')
            <form method="POST" action="{{route('enradas.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        @include('admin.enradas.fields_edit')
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row m-0 float-right mt-3">
                        <a class="btn btn-default mr-2" href="{{ route('enradas.index') }}">
                        <span class="align-middle">Cerrar</span>
                        </a>

                        <button type="submit" class="btn btn-primary ">
                            <span class="align-middle">Actualizar</span>
                            <i class="fa fa-save align-middle"></i>
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
