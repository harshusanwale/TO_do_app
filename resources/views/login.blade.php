<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! url('plugins/fontawesome-free/css/all.min.css') !!}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{!! url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! url('dist/css/adminlte.min.css') !!}">
  <style type="text/css">
   
    .error{
        color: red;
        font-weight: 800;
    }
 
    .loader{
    display:none;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("{!! url('dist/img/loader.gif') !!}")
                50% 50% no-repeat rgb(249,249,249);
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
      <p class="login-box-msg">Sign in to start your session</p>
     <!-- -->
 

      <form action="{{ url('/login') }}" method="POST" id="login-form">
        @csrf  
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="" >
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

        </div>
        <label id="email-error" class="error" for="email"></label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" 
          value="" >
          @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

         
        </div>
         <label id="password-error" class="error" for="password"></label>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" name="remember" id="remember" > -->
              <!-- <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2" ></i> Sign in using Facebook
        </a> -->
<!--        
         <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2" ></i> Sign in using Google+
        </a> -->
        
       
      </div>
    

     
      <!-- /.social-auth-links -->

    <!-- // base url/ controller/ method -->
      <p class="mb-0">
        <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
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

 <script type="text/javascript">
  
  $( document ).ready(function() {
          // Initialize form validation on the registration form.
          //---------------------- start for validations ---------------------
            $("#login-form").validate({
            rules: {
              email: {
                required: true,             
                email: true
              },
              password: {
                required: true,
                minlength:8,
                maxlength: 16,
              },
            },
            // Specify validation error messages
            messages: {
              email: {
                required: 'Please Enter Email',
                email:'Please enter a valid email address',
               
              },
              password: {
                required: 'Please Enter password',
                minlength:'Minimum length of input 6 characters',
                maxlength:'maximum length of input 16 characters',
               
              },
            },

      

       



                       });
        });

 
        
</script>
</body>
</html>
