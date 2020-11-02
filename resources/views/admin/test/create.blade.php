@extends('layouts.app',['pageTitle' => __('test Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('test') }}
    @endslot
@endcomponent


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create test') }}</div>

                <div class="card-body">
                    <a href="{{ url('/admin/test') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{ __('Back') }}
                            </button></a>
                    <br />
                    <br />


                    <form method="POST" action="{{ url('/admin/test') }}" accept-charset="UTF-8"
                        class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.test.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>

@endsection