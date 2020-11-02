@extends('layouts.app',['pageTitle' => __('test Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('test') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('test') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/test') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __(' Back') }}</button></a>
                        <a href="{{ url('/admin/test/' . $test->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('Edit') }}</button></a>

                        <form method="POST" id="deleteButton{{$test->id}}" action="{{ url('admin/test' . '/' . $test->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$test->id}})"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $test->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $test->name }} </td></tr><tr><th> Email </th><td> {{ $test->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
