<style type="text/css">
   .error {
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
               <h1>Edit status</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('userlist') }}">Task</a></li>
                  <li class="breadcrumb-item active">Edit Status</li>
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
                     <h3 class="card-title">Edit Status</h3>
                  </div>
               
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post" id="editform">
                     <div class="card-body">
                     <input type="hidden" class="form-control" id="id"  value="{{$taskdata['id']}}">

                     <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        
                        <input type="text" class="form-control" id="status"  name="status" value="{{$taskdata['status']}} ">
                        
                    </div>
                        <span class="text-danger" id="taskError"></span>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button onclick="submitForm()" type="button" class="btn btn-primary">Submit</button>
                     </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>




<script type="text/javascript">
   function submitForm() {

      let status = $("#status").val();
      let id = $("#id").val();
      $.ajax({
         method: 'POST',
         url: '/edit_form/' + id,
         data: {
            status: status,
            "_token": "{{ csrf_token() }}"
         },
         success: function(response) {
            console.log(response);
          if(response) {
           alert(response.success);
            $("#editform")[0].reset();
            window.location = "{{ url('userlist') }}";
          }
         },
         error:function (response) {
          console.log(response.responseJSON.errors);
          $('#taskError').text(response.responseJSON.errors.name);
          
        }
      });

   }
</script>