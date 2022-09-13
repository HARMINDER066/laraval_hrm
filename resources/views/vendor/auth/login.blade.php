<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/dashkote/demo/ltr/authentication-sign-in-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Sep 2022 17:43:10 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="{{  asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{  asset('backend/assets/js/pace.min.js')}}"></script>

  <!--plugins-->
  <link href="{{  asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{  asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{  asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{  asset('backend/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{  asset('backend/assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <title>Dashkote - Bootstrap5 Admin Template</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Sign In</h4>
                <p>Sign In to your account</p>
              </div>
              <form class="form-body row g-3" method="post" action="{{route('vendor.loginsubmit')}}">
                @csrf
                <div class="col-12">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail">
                </div>
                <div class="col-12">
                  <label for="inputPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword">
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                    <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end wrapper-->
<script src="{{  asset('backend/assets/js/jquery.min.js')}}"></script>

    <script src="{{  asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

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

</body>
</html>