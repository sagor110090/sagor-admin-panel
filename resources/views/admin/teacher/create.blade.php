@extends('layouts.app',['pageTitle' => __(' Teacher Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Teacher') }}
    @endslot
@endcomponent


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create  Teacher') }}</div>

                <div class="card-body">
                    <a href="{{ url('/admin/teacher') }}" title="Back"><button
                            class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __('Back') }}
                            </button></a>
                    <br />
                    <br />


                    <form method="POST" action="{{ url('/admin/teacher') }}" id="formGet" accept-charset="UTF-8"
                        class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.teacher.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>

@endsection