@extends('layouts.app',['pageTitle' => __('Email')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __('Email') }}
@endslot
@endcomponent
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="body">
                        <div id="mail-nav">
                            <button type="button"
                                class="btn btn-danger waves-effect btn-compose m-b-15">COMPOSE</button>
                            <ul class="" id="mail-folders">
                                <li>
                                    <a href="javascript:;" title="Sent">Sent ({{Helper::getAll('mailboxs')->where('status','send')->count()}})</a>
                                </li>
                                <li>
                                    <a href="javascript:;" title="Draft">Draft</a>
                                </li>
                                <li>
                                    <a href="javascript:;" title="Bin">Bin</a>
                                </li>
                                <li>
                                    <a href="javascript:;" title="Important">Important</a>
                                </li>
                                <li>
                                    <a href="javascript:;" title="Starred">Starred</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="boxs mail_listing">
                        <div class="inbox-center table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="1">
                                            <div class="inbox-header">
                                                Compose New Message
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert"></div>
                                <form class="form-horizontal composeForm needs-validation" novalidate=""
                                    id="upload_image_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address" name="email" class="form-control"
                                                required placeholder="TO">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="subject" name="subject" class="form-control" required
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <textarea class="summernote" id="content" name="content"></textarea>
                                    <div class="compose-editor m-t-20">
                                        <input type="file" class="default" name="attach" id="attach">
                                    </div>
                                    <div class="mt-3">

                                        <button type="submit" class="btn btn-info btn-border-radius waves-effect"
                                            id="send">Send</button>
                                        <button type="submit" hidden class="btn-progress" id="send">Send</button>
                                        <button type="button"
                                            class="btn btn-danger btn-border-radius waves-effect">Draft</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets') }}/bundles/summernote/summernote-bs4.css">
@endpush
@push('js')
<script src="{{ asset('assets') }}/bundles/summernote/summernote-bs4.js"></script>
<script>
    $('#upload_image_form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#send').addClass('btn-progress');
        $.ajax({
            type: 'POST',
            url: "/admin/sendSingleMail/",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                this.reset();
                $('.alert').replaceWith('<div class="alert alert-success">Successfully Send</div>');
                $('#send').removeClass('btn-progress');
            },
            error: function(data) {
                console.log(data);
                $('.alert').replaceWith(
                    '<div class="alert alert-danger">Sending Failed fill up the field</div>');
                $('#send').removeClass('btn-progress');
            }
        });
    });
    //   $('#send').click(function (e) { 
    //       e.preventDefault();
    //     $('#send').addClass('btn-progress');
    //     var data = {
    //         _token: "{{ csrf_token() }}",
    //         email : $('#email_address').val(),
    //         subject : $('#subject').val(),
    //         content : $('#content').val(),
    //         attach : $('#attach').val(),
    //     }
    //     $.ajax({
    //     type: 'POST',
    //     url: '/admin/sendSingleMail/',
    //     data: data,
    //     success: function(data, status, xhr) {
    //     // handle success
    //         $('.alert').replaceWith('<div class="alert alert-success">Successfully Send</div>');
    //         $('#send').removeClass('btn-progress');
    //     },
    //     error: function(xhr, status, error) {
    //         // handle error
    //         $('.alert').replaceWith('<div class="alert alert-danger">Sending Failed fill up the field</div>');
    //         $('#send').removeClass('btn-progress');
    //     }
    //     });
    //   });
</script>
@endpush