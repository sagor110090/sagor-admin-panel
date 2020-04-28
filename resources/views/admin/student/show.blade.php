@extends('layouts.app',['pageTitle' => __(' Student Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Student') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Student') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/student') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __(' Back') }}</button></a>
                        @if (!Helper::authCheck('student-edit'))
                        <a href="{{ url('/admin/student/' . $student->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (!Helper::authCheck('student-delete'))
                        <form method="POST" id="deleteButton{{$student->id}}" action="{{ url('admin/student' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$student->id}})"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $student->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $student->name }} </td></tr><tr><th> Class </th><td> {{ $student->class }} </td></tr><tr><th> Roll </th><td> {{ $student->roll }} </td></tr><tr><th> Id No </th><td> {{ $student->id_no }} </td></tr><tr><th> Blood Group </th><td> {{ $student->blood_group }} </td></tr><tr><th> Father </th><td> {{ $student->father }} </td></tr><tr><th> Monther </th><td> {{ $student->monther }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
