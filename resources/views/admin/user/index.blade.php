@include('templates.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Task</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Admin</a></li>
                  <li class="breadcrumb-item active">Task</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div>
                  <div class="text-center">
                     <a href="{{ url('addtask') }}" style="float: right; margin-right: 27px;
               margin-top: 16px;" class="btn btn-default btn-rounded mb-4"> Add task</a>
                  </div>
               </div>
               <div class="card-header">
                  <h3 class="card-title">Task</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body table-responsive-sm">
                  

                 
                  <table id="example1" class="table-hover table-sm table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>S.No.</th>
                           <!-- <th>Image</th> -->
                           <th>name</th>
                           <th>task</th>
                           <th>status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($task as $key => $value)
                     
                     <tr>
                        <td>{{ $key+1 }}</td>
                       
                        <td>{{ $value->user->name}}</td>
                        <td>{{ $value->task}}</td>
                        <td>
                        @if( $value->status == 'pending')
                        <button  class="btn btn-danger">Pending</button> 
                        @else
                        <button  class="btn btn-primary">Done</button> 
                      @endif                       
                        </td>
                        <td><a class="btn btn-sm bg-gradient-info btn-flat" href="{{ URL::to('edit/' . Crypt::encrypt($value->id) )}}"><i class="fas fa-edit" title="Edit"></i> Edit</a> </td>
                     </tr>
                  </tbody>
                  @endforeach
                  </table>

               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>



@include('templates.footer')