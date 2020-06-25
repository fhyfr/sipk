<!DOCTYPE html>
<html>

<!-- Mirrored from moltran.coderthemes.com/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Jun 2018 04:29:06 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">
  <link rel="shortcut icon" href="{{ asset('/assets/img/logo-indocement.png') }}">

  <title>Login ERP PT. Indocement Tunggal Prakarsa</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/own.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>

<body>
  <div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 desc-login">
        <div class="text-desc">
          <span class="txt-erp">Sistem Enterprise <br> Resource Planning</span> <br>
          <img src="{{ asset('assets/img/logo-indocement.png') }}" width="125" height="150" alt="Logo" style="display:block; margin: 0 auto; padding-top: 20px;"> <br>
          <span class="txt-indo">PT Indocement Tunggal Prakarsa</span> <br> <br>
          <span class="txt-turut">Turut Membangun Kehidupan Bermutu</span>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" style="background-color: #fff;">
        <div class="card-body form-login">
          <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div style="margin: 25px 0px;">
              <span class="txt-login">Login Page</span>
            </div>
            <div class="form-group">
              <input id="username" type="text" value="{{ old('username') }}" class="form-control" name="username" tabindex="1" required autofocus placeholder="Username" autocomplete="off" style="width: 325px;">
              <div class="invalid-feedback">
                Username tidak boleh kosong
              </div>
              @error('username')
              <div class="text-danger" style="border: 1px solid #eeeeee; padding: 5px;">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="input-group">
                <input id="password" type="password" value="{{ old('password') }}" class="form-control" name="password" tabindex="2" placeholder="Password" style="width: 280px;" required>
                <div class="invalid-feedback">
                  Password tidak boleh kosong
                </div>
                @error('password')
                <div class="text-danger" style="border: 1px solid #eeeeee; padding: 5px;">
                  {{ $message }}
                </div>
                @enderror
                <div class="input-group-prepend" style="width: 45px;">
                  <div class="input-group-text">
                    <a type="button" id="show"><i class="fas fa-eye"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block btn-login" tabindex="4" style="background-color: #3665AD; width: 325px;">
                Masuk
              </button>
            </div>
            <!-- <hr /> -->
            <div class="mt-1">
              <a href="">
                Forgot Password
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer-login">
    <div class="text-center">
      Sistem Enterprise Resource Planning - Sistem Informasi 6B
    </div>
  </footer>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script>
    $("#show").click(function() {
      if ($("#password").attr("type") == "password") {
        $("#password").attr("type", "text");
      } else {
        $("#password").attr("type", "password");
      }
    });
  </script>
</body>

<!-- Mirrored from moltran.coderthemes.com/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Jun 2018 04:29:07 GMT -->

</html>