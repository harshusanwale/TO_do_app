<style type="text/css">
   .error{
   color: red;
   font-weight: 800;
   }
</style>
@include('templates.header')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>View User</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ route('Userlist') }}">User</a></li>
               <li class="breadcrumb-item active">View User</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">View user</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" id="edit_form" action="{{ url('view/'.Crypt::encrypt($data['id'])) }}"  enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{$data['name']}}">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$data['email']}}">
                     </div>
                     <div class="form-group">
                        
      
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"  src="{{ asset('upload/'.$data['image']) }}" alt="User profile picture">
                     </div>
                     </div>

                   
                        <!-- /.card-body -->
   
               </form>
               </div>
               <!-- /.card -->
               <!-- general form elements -->
               <!-- /.card -->
               <!-- Input addon -->
               <!-- /.card -->
               <!-- Horizontal Form -->
               <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

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
            $("#edit_form").validate({
            rules: {
              name: {
                required: true,
                minlength: 3,
                maxlength: 50,
                // email: true
              },
              email: {
                required: true,
                
                email: true
              },
              image: {
                required: true,
               
              },
              
              

            },
            // Specify validation error messages
            messages: {
              name: {
                required: 'Please enter name',
                minlength:'Minimum length of input 3 characters',
                maxlength:'Maximum length of input 50 characters'
               
              },
              email: {
                required: 'Please enter email',
                email:'Please enter a valid email address',
               
              },
              image: {
                required: 'Please choose image',
              
               
              },
            
            },

      

           // submitHandler: function(form) {
              
           //      var email = $('#email').val();
           //      var password = $('#password').val();

           //       console.log(password);
           //       console.log(email);
           //      if($('#remember').is(':checked')){
           //         console.log('checked iff');
           //         if(email != '' && password != ''){
           //             localStorage.setItem("remember_email", email);
           //             localStorage.setItem("remember_password", password);
           //         }
           //      }else{
           //         console.log('checked else');
           //         localStorage.removeItem("remember_email");
           //         localStorage.removeItem("remember_password");
           //      }
           //    }

                       });
        });

      
        
</script>