<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard Template || @isset($pageTitle) {{$pageTitle}}@endisset</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/app.min.css">
  <!-- Template CSS -->
  {{-- <link rel="stylesheet" href="{{ asset('assets') }}/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css"> --}}

  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets') }}/img/favicon.ico' />
  <link rel="stylesheet" href="{{ asset('assets') }}/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href=" {{asset('assets') }}/bundles/jquery-selectric/selectric.css">

  @stack('css')

</head>

<body class="{{Helper::layouts()}}">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layouts.parts.navbar')
      <div class="main-sidebar sidebar-style-2">
        @include('layouts.parts.sidebar')
      </div>
      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('layouts.parts.footer')
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('assets') }}/js/app.min.js"></script>
  {{-- <!-- JS Libraies -->
  <script src="{{ asset('assets') }}/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- JS Libraies for table -->
  <script src="{{ asset('assets') }}/bundles/datatables/datatables.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="{{ asset('assets') }}/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="{{ asset('assets') }}/js/page/datatables.js"></script>--}}
  <script src="{{ asset('assets') }}/bundles/jquery-selectric/jquery.selectric.min.js"></script> 

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets') }}/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets') }}/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets') }}/js/custom.js"></script>
  {{-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
  <script src="{{ asset('assets') }}/bundles/izitoast/js/iziToast.min.js"></script>

  @stack('js')
  <script src="{{ asset('assets') }}/bundles/sweetalert/sweetalert.min.js"></script>
  <script>
    function sweetalertDelete(id) {
      event.preventDefault();
      swal({
          title: "Are you sure?",
          text: "To continue this action!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Your action has beed done! :)", {
              icon: "success",
              buttons: false,
              timer: 1000
            });
            $("#deleteButton" + id).submit();
          }
        });
    }
    $('.oneTimeSubmit').click(function() {
      var validation = $('#fromGet').data('validator');
      alert(validation);
        var fromSub = $(this).closest('form').submit();
        if (fromSub) {
            $(this).attr('disabled', true);
        }
    });
    @if(Session::has('success'))
    iziToast.success({
      // title: 'Hello, world!',
      message: '{{Session::get('success')}}',
      position: 'topRight'
    });
    @endif
    @if(Session::has('warning'))
    iziToast.warning({
      // title: 'Hello, world!',
      message: '{{Session::get('warning')}}',
      position: 'topRight'
    });
    @endif
    @if(Session::has('error'))
    iziToast.error({
      // title: 'Hello, world!',
      message: '{{Session::get('error')}}',
      position: 'topRight'
    });
    @endif
    $('.select-layout').click(function(e) {
      // alert('click');
      var data = $(this).val();
      $.get("/admin/layoutSet/" + data,
        function(data, textStatus, jqXHR) {},
        "json"
      );
    });
    // $('.select-sidebar').click(function (e) { 
    //     console.log($('body').attr('class'));
    // });
  </script>
</body>

</html>