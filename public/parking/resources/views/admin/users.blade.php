<style>
   .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">

         </div>
      </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div id="alert_message">
      </div>
      <div class="row">
         <div class="col-12">

            <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- /.card-header -->
            <div class="card-body">
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
               <!-- <button class="btn btn-primary me-md-2" type="button" data-toggle="modal" data-target="#USERModal">Add user</button> -->
               </div>
               <br>
               <div style="overflow-x: auto;">
                  <table id="example2" class="table table-bordered">
                     <thead>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- <th>Username</th> -->
                        <th>Contact No.</th>
                        <th>Emergency Contact</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Action</th>
                     </thead>

                     <tbody id="_allUser">
                        @foreach ($users as $user_details)
                           <tr>
                              <td>{{ $user_details->id }}</td>
                              <td>{{ $user_details->name }}</td>
                              <td>{{ $user_details->email }}</td>
                              <!-- <td>{{ $user_details->username }}</td> -->
                              <td>{{ $user_details->contact_number }}</td>
                              <td>{{ $user_details->emergency_contact }}</td>
                              <td>{{ $user_details->address }}</td>
                              <td>{{ $user_details->pincode	 }}</td>
                              <td>{{ $user_details->state }}</td>
                              <td>{{ $user_details->city }}</td>
                              <td>
                              <!-- href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary editProduct"> -->
                                 <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $user_details->id }}" data-original-title="Edit" class="edit btn btn-primary edituser">
                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                 </a>
                                 <a  class="btn btn-danger" href = 'deleteUsers/{{ $user_details->id }}'>
                                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                 </a>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>

                  </table>
               </div>

            </div>
            <!-- /.card-body -->

            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- The USER ADD Modal -->
<div class="modal fade" id="USERModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" method="POST" action="{{ url('admin/adduserdetails') }}">
            @csrf
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom01">Name</label>
                     <input type="text" class="form-control" name="name"  required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Email</label>
                     <input type="email" class="form-control"  name="email"  required>
                  </div>
               </div>

               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom01"></label>
                     <input type="text" class="form-control" name="name"  required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Email</label>
                     <input type="email" class="form-control"  name="email"  required>
                  </div>
               </div>

               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom03">User Name</label>
                     <input type="text" class="form-control"  name="username" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Enter Password</label>
                     <input type="password" class="form-control"  name="password"  required>
                  </div>
               </div>

               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom03">Contact Number</label>
                     <input type="number" class="form-control"  name="contact_number" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Emergency Contact</label>
                     <input type="number" class="form-control"  name="emergency_contact"  required>
                  </div>
               </div>   
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!--  Modal END -->



  <!-- The USER Update Modal -->
<div class="modal fade"  id="edituserdetails">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update User Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" method="POST" action="{{ url('admin/updateUserDetails') }}">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <input type ="hidden" id="user_id" value="" name="userid">
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom01">Name</label>
                     <input type="text" class="form-control" name="name" value="" id="uname">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Email</label>
                     <input type="email" class="form-control"  name="email" value="" id="email">
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom03">User Name</label>
                     <input type="text" class="form-control"  name="username" value="" id="username">
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Enter Password</label>
                     <input type="password" class="form-control"  name="password" value="" id="password">
                  </div>
               </div>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="submit" id="">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- Udate Modal END -->



  <script>
   $('body').on('click', '.edituser', function () {

      // alert("Hello");

      var usr_id = $(this).data('id');
      
      $.ajax({
          data: {id:usr_id, _token:'{{ csrf_token() }}'},
          url: "getUserDetails",
          type: "POST",
          //dataType: 'json',
          success: function (data) {
           console.log(data);
           $('#user_id').val(data[0].id);
            $('#uname').val(data[0].name);
            $('#email').val(data[0].email);
            $('#username').val(data[0].username);
            $('#password').val(data[0].password);
            $('#edituserdetails').modal('show'); 
          }
      });

     
   });
  </script>






  
