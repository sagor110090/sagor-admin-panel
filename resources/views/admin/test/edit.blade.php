@extends('layouts.app',['pageTitle' => __('test Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('test') }}
    @endslot
@endcomponent

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit test') }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/test') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        <form method="POST" action="{{ url('/admin/test/' . $test->id) }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""  enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.test.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>

@endsection
