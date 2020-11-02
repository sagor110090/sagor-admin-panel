@extends('layouts.app',['pageTitle' => __('test1 Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('test1') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('test1') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/test1') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="eye"></i> {{ __(' Back') }}</button></a>
                        @if (Helper::authCheck('test1-edit'))
                        <a href="{{ url('/admin/test1/' . $test1->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (Helper::authCheck('test1-delete'))
                        <form method="POST" id="deleteButton{{$test1->id}}" action="{{ url('admin/test1' . '/' . $test1->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$test1->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $test1->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $test1->name }} </td></tr><tr><th> Email </th><td> {{ $test1->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
