<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! url('plugins/fontawesome-free/css/all.min.css') !!}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{!! url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! url('dist/css/adminlte.min.css') !!}">
  <style type="text/css">
    .error {
      color: red;
      font-weight: 800;
    }

    .open_my_popup {
      display: none;
    }

    .open_my_popup .imgae_view_bg {
      width: 100%;
      height: 100vh;
      background: #000;
      position: fixed;
      top: 0px;
      left: 0px;
      opacity: 0.8;
      z-index: 999;
    }

    .open_my_popup .view_popup {
      width: 96%;
      margin: 0px 2%;
      height: 100vh;
      position: fixed;
      top: 0px;
      right: 0px;
      z-index: 999;
    }

    .open_my_popup .view_popup img {
      width: 100%;
      height: 119vh;
      object-fit: contain;
      padding-top: 84px;
      padding-bottom: 157px;
    }

    .close_my_popup {
      position: fixed;
      top: 75px;
      right: 10px;
      background: #1b79b8;
      width: 30px;
      height: 30px;
      text-align: center;
      z-index: 99999;
      border-radius: 50%;
    }

    .close_my_popup img {
      width: 15px;
      padding-top: 7px;
    }

    .field-icon {
      float: right;
      margin-left: -18px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">


      <div class="card-body login-card-body">


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif

        <p class="login-box-msg">Register</p>

        <form action="{{ url('/register') }}" method="POST" id="login-form" enctype="multipart/form-data">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" id="name" name="name" value="">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('name'))
          <label id="" class="error" for="name">{{ $errors->first('name') }}</label>
          @endif
          <label id="name-error" class="error" for="name"></label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>

          </div>
          @if ($errors->has('email'))
          <!-- <span class="text-danger"></span> -->
          <label id="" class="error" for="email">{{ $errors->first('email') }}</label>
          @endif
          <label id="email-error" class="error" for="email"></label>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="">
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>


          </div>
          @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
            @endif





          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
        <!-- /.social-auth-links -->

        <!-- // base url/ controller/ method -->
        <p class="mb-0">
          <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{!! url('plugins/jquery/jquery.min.js') !!}"></script>
  <!-- Bootstrap 4 -->
  <script src="{!! url('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <!-- AdminLTE App -->
  <script src="{!! url('dist/js/adminlte.min.js') !!}"></script>


  <!-- jquery-validation -->
  <script src="{!! url('plugins/jquery-validation/jquery.validate.min.js') !!}"></script>
  <script src="{!! url('plugins/jquery-validation/additional-methods.min.js') !!}"></script>

  <!-- <script src="{!! url('dist/js/demo.js') !!}"></script> -->


  
</body>

</html>