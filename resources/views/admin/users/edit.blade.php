
@extends('adminlte::page')

@section('title', __('experts.user').'|'. __('experts.edit'))

@section('content')
    <section class="content-header">

    </section>

    <div class="content px-3">
        <div class="card-outline card card-primary">
            <div class="card-header d-flex">
                <div class="col-sm-12">
                    <h2>{{ __('experts.edit') }} {{ __('experts.user') }}</h2>
                </div>
            </div>

            @include('adminlte-templates::common.errors')
            <form method="POST" action="{{route('users.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        @include('admin.users.fields_edit')
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row m-0 float-right mt-3">
                        <a class="btn btn-default mr-2" href="{{ route('users.index') }}"
                        <span class="align-middle">{{ __('experts.cancel') }}</span>
                        </a>

                        <button type="submit" class="btn btn-primary ">
                            <span class="align-middle">{{ __('experts.update') }}</span>
                            <i class="fa fa-save align-middle"></i>
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
