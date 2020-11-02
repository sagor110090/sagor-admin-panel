@extends('layouts.app',['pageTitle' => __('test Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __('test') }}
    @endslot
@endcomponent

        <div class="col-md-12">
            <div class="card">
                <h6 class="card-header">{{ __('test List') }}</h6>

                <div class="card-body">
                    
                    <a href="{{ url('/admin/test/create') }}" class="btn btn-success btn-sm"
                        title="Add New test">
                        <i class="fa fa-plus" aria-hidden="true"></i> {{ __('Add New') }}
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th  width='30'>#</th><th>Name</th><th>Email</th><th width='300'>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('/admin/test/' . $item->id) }}" title="View"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/test/' . $item->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> </button></a>

                                        <form method="POST" id="deleteButton{{$item->id}}"
                                            action="{{ url('/admin/test' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="sweetalertDelete({{$item->id}})"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>

                </div>
            </div>
        </div>

@endsection
