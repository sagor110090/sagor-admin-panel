@extends('layouts.app',['pageTitle' => __(' Student Show')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Student') }}
    @endslot
@endcomponent
<div class="card">
    <div class="card-header">{{ __(' Student') }}</div>
    <div class="card-body">

        <a href="#" onclick="history.back()" title="Back"><button
            class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __('Back') }}
            </button></a>
        @if (Helper::authCheck('student-edit'))
        <a href="{{ url('/admin/student/' . $student->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
        @endif

        @if (Helper::authCheck('student-delete'))
        <form method="POST" id="deleteButton{{$student->id}}" action="{{ url('admin/student' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$student->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
        </form>
        @endif
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr><th> Name </th><td> {{ $student->name }} </td></tr><tr><th> Address </th><td> {{ $student->address }} </td></tr>
                </tbody>
            </table>
        </div>

    </div>
</div>


@endsection
