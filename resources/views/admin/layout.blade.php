<!doctype html>
<html lang="en" class="semi-dark">


<!-- Mirrored from codervent.com/dashkote/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Sep 2022 17:36:52 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{  asset('assets/front/img/'.$commonsetting->fav_icon) }}" type="image/png">


  <!-- loader-->
  <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
  <!--plugins-->
  <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="{{ asset('backend/assets/css/dark-theme.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/semi-dark.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/header-colors.css') }}" rel="stylesheet" />

@stack('custom-css')

  <title>{{$commonsetting->website_title}}</title>
  <style type="text/css">
    html.semi-dark .sidebar-wrapper, html.semi-dark .sidebar-wrapper .sidebar-header {
    background-color: {{$commonsetting->sidebar_color}};
  }
  .sidebar-wrapper .metismenu li {
    background: {{$commonsetting->navbar_color}};
}
html.semi-dark .sidebar-wrapper .metismenu a
{
  color: {{$commonsetting->navbar_link_color}};
}
html.semi-dark .sidebar-wrapper .metismenu .mm-active>a, html.semi-dark .sidebar-wrapper .metismenu a:active, html.semi-dark .sidebar-wrapper .metismenu a:focus, html.semi-dark .sidebar-wrapper .metismenu a:hover
{
  background-color:  {{$commonsetting->navbar_hover_color}}; ;

  }

  </style>

</head>

<body>
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/data-table/buttons.bootstrap4.min.css') }}">

  @yield('style')

</head>

<body>
  
<div class="wrapper">
      @include('admin.partial.side-navbar')

    @include('admin.partial.top-navbar')
    

    <div class="page-content-wrapper">
 
      @yield('content')
  </div>
  

  @include('admin.partial.footer')



<script src="{{  asset('backend/assets/js/jquery.min.js')}}"></script>
  <script src="{{  asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{  asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{  asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script type="module" src="../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
  <!--plugins-->

  <script src="{{  asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{  asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
  <script src="{{  asset('backend/assets/plugins/chartjs/chart.min.js')}}"></script>
  <script src="{{  asset('backend/assets/js/index.js')}}"></script>
  <!-- Main JS-->
  <script src="{{  asset('backend/assets/js/main.js')}}"></script>
    <script src="{{  asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
      <script src="//code.jquery.com/jquery-3.3.1.js"></script>
  <script src="//cdn.rawgit.com/twbs/bootstrap/v4.1.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('custom-scripts')

  

            @if(Session::has('success'))
      <script>
               const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

Toast.fire({
  icon: 'success',
  title: "{{ Session::get('success') }}"
})
      </script>
                  @endif



      @if(Session::has('error'))
      <script>
               const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

Toast.fire({
  icon: 'error',
  title: "{{ Session::get('error') }}"
})
      </script>
        @endif
     <div id="myModal" class="modal fade"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog"><div class="modal-content"><div class="modal-body"><p class="ajaxloader text-center"><i class="lni lni-spinner fa-spin fa-3x fa-fw margin-bottom margin-top text-center"></i></p></div></div></div>  
 </div>
        <div class="modal fade" id="myModal_status" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script>
            $(document).on('click', '.ajaxviewmodel', function (event) {
                var html ='<div class="modal-dialog"><div class="modal-content"><div class="modal-body"><p class="ajaxloader text-center"><i class="lni lni-spinner fa-spin fa-3x fa-fw margin-bottom margin-top text-center"></i></p></div></div></div>';
                event.preventDefault();
                $("#myModal").html(html);
                var link = $(this).attr("href");
                $('#myModal').modal('show');
                $.ajax({
                    url: link,
                    beforeSend: function() {
                    // setting a timeout
                        $(".ajaxloader").show();
                        },
                    success: function (data) {
                        $(".ajaxloader").hide();
                        $("#myModal").html(data);
                    }
                });
            });
            </script>
                
</body>
</html>
