@extends('layouts.app',['pageTitle' => __(' Student')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Student') }}
    @endslot
@endcomponent


<div class="card">
    <h6 class="card-header">{{ __(' Student List') }}</h6>

    <div class="card-body">
        @if (Helper::authCheck('student-create'))
            <a href="{{ url('/admin/student/create') }}" class="btn btn-success btn-sm"
                title="Add New  Student">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>
            @endif

        <form method="GET" action="{{ url('/admin/student') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="feather-16" data-feather="search"></i>
                        </button>
                    </span>
                </div>
        </form>

        <br/>
        <br/>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover"  style="width:100%;">
                <thead>
                    <tr>
                        <th  width='30'>#</th><th>Name</th><th>Address</th><th width='300'>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td><td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ url('/admin/student/' . $item->id) }}" title="View"><button class="btn btn-info btn-sm"><i class="feather-16" data-feather="eye"></i></button></a>
                        @if (Helper::authCheck('student-edit'))
                            <a href="{{ url('/admin/student/' . $item->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> </button></a>
                        @endif
                        @if (Helper::authCheck('student-delete'))
                            <form method="POST" id="deleteButton{{$item->id}}"
                                action="{{ url('/admin/student' . '/' . $item->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm"
                                    title="Delete"
                                    onclick="sweetalertDelete({{$item->id}})"><i class="feather-16" data-feather="trash-2"></i></button>
                            </form>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $student->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

    </div>
</div>


@endsection
