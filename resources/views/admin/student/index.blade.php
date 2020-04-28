@extends('layouts.app',['pageTitle' => __(' Student Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Student') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Student List') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('student-create'))
            <a href="{{ url('/admin/student/create') }}" class="btn btn-success btn-sm" title="Add New  Student">
                <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}
            </a>
            @endif

            <form method="GET" action="{{ url('/admin/student') }}" accept-charset="UTF-8"
                class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Id No</th>
                            <th>Blood Group</th>
                            <th>Father</th>
                            <th>Monther</th>
                            <th width='120'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->class }}</td>
                            <td>{{ $item->roll }}</td>
                            <td>{{ $item->id_no }}</td>
                            <td>{{ $item->blood_group }}</td>
                            <td>{{ $item->father }}</td>
                            <td>{{ $item->monther }}</td>
                            <td>
                                <a href="{{ url('/admin/student/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye"
                                            aria-hidden="true"></i></button></a>
                                @if (Helper::authCheck('student-edit'))
                                <a href="{{ url('/admin/student/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('student-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/student' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="sweetalertDelete({{$item->id}})"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $student->appends(['search' => Request::get('search')])->render()
                    !!} </div>
            </div>

        </div>
    </div>
</div>

@endsection