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
               <div style="overflow-x: auto;">
                  <table id="example2" class="table table-bordered">
                     <thead>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permission</th>
                        <th>Action</th>
                     </thead>
                     <tbody id="_allUser">
                        <?php
                        $i = 1;
                        foreach ($users as $value) {
                           if ($value->permission == null) {
                              $role = '';
                           } else if ($value->permission->designation_id == 2) {
                              $role = 'Data Operator';
                           } else if ($value->permission->designation_id == 1) {
                              $role = 'Manager';
                           }
                        ?>
                           <tr id="{{ $value->id }}">
                              <td>{{ $i}}</td>
                              <td>{{$value->name}}</td>
                              <td>{{$value->email}}</td>
                              <td>{{ $role}}</td>
                              <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="userId({{$value->id}})">Edit</button></td>
                              <td>
                                 <button class="btn btn-primary" style="color: aliceblue;" data-toggle="modal" data-target="#editDetail" data-id="{{$value->id}}" id="getUserDetails">Edit</button>&nbsp;&nbsp;
                                 <button class="btn btn-danger delete_records" onclick="deleteUsers({{$value->id}})" style="color: aliceblue;">Delete</button>
                                 <button class="btn btn-primary" data-toggle="modal" data-target="#invoiceModal" onclick="otherDetail({{$value->id}})">Invoice</button>
                              </td>

                           </tr>
                        <?php $i++;
                        } ?>
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

<!-- Control Sidebar -->
<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

         </div>
         <div class="modal-body">
            <form id="allRoles">
               <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
               <input type="hidden" name="userId" id="userId">
               <select class="form-control" name="designation" id="designation">
                  <option value="">Select Role</option>
                  <option value="1">Manager</option>
                  <option value="2">Data Operator</option>
               </select>
               <br>
               <ul class=" list-group">
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck1" type="checkbox" value="1" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck1" style="padding: inherit;">Master</label>
                     </div>
                  </li>
                  <li class="list-group-item">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck2" type="checkbox" value="2" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck2" style="padding: inherit;">Pages</label>
                     </div>
                  </li>
                  <li class="list-group-item">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck3" type="checkbox" value="3" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck3" style="padding: inherit;">Topics</label>
                     </div>
                  </li>
                  <li class="list-group-item">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck4" type="checkbox" value="4" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck4" style="padding: inherit;">Contact</label>
                     </div>
                  </li>
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck5" type="checkbox" value="5" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck5" style="padding: inherit;">User</label>
                     </div>
                  </li>
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck6" type="checkbox" value="6" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck6" style="padding: inherit;">Assign Work</label>
                     </div>
                  </li>
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck7" type="checkbox" value="7" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck7" style="padding: inherit;">Review Work</label>
                     </div>
                  </li>

                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck8" type="checkbox" value="8" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck8" style="padding: inherit;">Customers</label>
                     </div>
                  </li>
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck9" type="checkbox" value="9" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck9" style="padding: inherit;">Combine</label>
                     </div>
                  </li>
                  <li class="list-group-item rounded-0">
                     <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="customCheck10" type="checkbox" value="10" name="role[]">
                        <label class="cursor-pointer font-italic d-block custom-control-label" for="customCheck10" style="padding: inherit;">Scrapping</label>
                     </div>
                  </li>
               </ul>
               <br>
               <input type="submit" value="Submit">
            </form>
         </div>

      </div>

   </div>
</div>
<div class="modal fade" id="editDetail" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

         </div>
         <div class="modal-body">
            <form id="editUserDetail">
               {{ csrf_field() }}
               <input type="hidden" class="form-control" name="user_id" id="user_id">
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Name</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                     <span class="text-danger error-text name_err"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Email</label>
                  <div class="col-md-8">
                     <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                     <span class="text-danger error-text email_err"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Username</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                     <span class="text-danger error-text username_err"></span>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Password</label>
                  <div class="col-md-8">
                     <input type="password" class="form-control" name="password" id="password-field" placeholder="Enter Password" autocomplete="new-password">
                     <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
               </div>
               <input type="submit" value="Submit">
            </form>
         </div>

      </div>

   </div>
</div>

<!-- invoice modal-->
<div class="modal fade" id="invoiceModal" role="dialog">
   <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

         </div>
         <div class="modal-body">
            <form id="invoiceDetail">
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Date</label>
                  <div class="col-md-8">
                     <input type="date" class="form-control" id="date" name="date">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Name</label>
                  <div class="col-md-8">
                     <input type="hidden" class="form-control" id="invoiceUserId">
                     <input type="text" class="form-control" id="user-name">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Address</label>
                  <div class="col-md-8">
                     <input type="email" class="form-control" id="address">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">PAN No</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="pan_no">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">Account No</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="account_no">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">No of Table</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="total_table">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">No of Row</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="total_rows">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-4 col-form-label col-form-label-md">No of Column</label>
                  <div class="col-md-8">
                     <input type="text" class="form-control" id="total_columns">
                  </div>
               </div>
            </form>

         </div>

      </div>

   </div>
</div>

<script>
   $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
         input.attr("type", "text");
      } else {
         input.attr("type", "password");
      }
   });
   // fetch contact records

   // function usersFetch() {
   //    //alert("test");
   //    $.ajax({
   //       url: "/admin/allusers",
   //       method: "get",
   //       dataType: "json",
   //       success: function(data) {
   //          //console.log(data[5].permission);
   //          if (data.status == false) {
   //             $("#allUser").append("<b>" + data.message + "</b>");
   //          } else {
   //             var i = 1;
   //             var role;
   //             $.each(data, function(key, value) {
   //                if (value.permission == null) {
   //                   role = '';
   //                } else if (value.permission.designation_id == 2) {
   //                   role = 'Data Operator';
   //                } else if (value.permission.designation_id == 1) {
   //                   role = 'Manager';
   //                }
   //                $("#allUser").append(`<tr id="${value.id}">
   //                         <td>${i}</td>
   //                         <td>${value.name}</td>
   //                         <td>${value.email}</td>
   //                         <td>${role}</td> 
   //                         <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="userId(${value.id})">Edit</button></td>  
   //                         <td>
   //                         <button class="btn btn-primary" style="color: aliceblue;" data-toggle="modal" data-target="#editDetail" data-id=${value.id} id="getUserDetails">Edit</button>&nbsp;&nbsp;
   //                         <button class="btn btn-danger delete_records" onclick="deleteUsers(${value.id})" style="color: aliceblue;">Delete</button></td>
                          
   //                      </tr>`);
   //                i++;
   //             });
   //             // $("#usersTable").dataTable();

   //          }
   //       },
   //    });
   // }

   function userId(id) {
      $("#allRoles").trigger("reset");
      $('#designation option:selected').removeAttr('selected');
      $('input:checkbox').removeAttr('checked');
      //console.log(id);
      $("#userId").val(id);
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
         url: "/get_userRole/" + id,
         method: "POST",
         dataType: "json",
         data: {
            id: id,
            "_token": token,
         },
         success: function(data) {
            $("#designation").find('option[value="' + data[0].designation_id + '"]').attr("selected", "selected");

            var arr = JSON.parse(data[0].role_id);
            for (var i = 0; i < arr.length; i++) {
               $("#customCheck" + arr[i]).attr("checked", "checked");
            }
         }
      });
   }
   $('#invoiceModal').on('hidden.bs.modal', function() {
      $("#invoiceDetail").trigger("reset");
   });

   function otherDetail(id) {
      
      $('#invoiceUserId').val(id);
      // $.ajax({
      //    url: "/getInvoiceDetail/" + id,
      //    method: "GET",
      //    dataType: "json",
      //    success: function(data) {
      //       //console.log(data);
      //       $('#user_id').val(data[0].id);
      //       $('#user-name').val(data[0].name);
      //       $('#address').val(data[0].address);
      //       $('#pan_no').val(data[0].pan_no);
      //       $('#account_no').val(data[0].account_no);
      //       $('#total_columns').val(data[0].total_columns);
      //       $('#total_rows').val(data[0].total_rows);
      //       $('#total_table').val(data[0].total_table);
      //    }
      // });
   }
   $(document).ready(function() {
      $(document).on("click", "#getUserDetails", function(e) {
         let userid = $(this).data('id');
         $.ajax({
            url: "/getUserDetails/" + userid,
            method: "get",
            dataType: "json",
            success: function(data) {
               console.log(data);
               //console.log(data[0].username);
               $("#username").val(data[0].username);
               $("#email").val(data[0].email);
               $("#name").val(data[0].name);
               $("#user_id").val(data[0].id);
            }
         });

      });
      $(document).on("change", "#date", function(e) {
         // alert($('#date').val());
         // alert($('#invoiceUserId').val());
         $.ajax({
            url: "/getInvoiceDetail/" + $('#invoiceUserId').val() + "/" + $('#date').val(),
            method: "GET",
            dataType: "json",
            success: function(data) {
               console.log(data);
               //$('#user_id').val(data[0].id);
               $('#user-name').val(data[0].name);
               $('#address').val(data[0].address);
               $('#pan_no').val(data[0].pan_no);
               $('#account_no').val(data[0].account_no);
               $('#total_columns').val(data[0].total_columns);
               $('#total_rows').val(data[0].total_rows);
               $('#total_table').val(data[0].total_table);
            }
         });
      });

   });
   $("#editUserDetail").on('submit', function(e) {
      e.preventDefault();
      $.ajax({
         url: "/changeUserDetails",
         method: "POST",
         dataType: "JSON",
         processData: false,
         contentType: false,
         cache: false,
         data: new FormData(this),
         success: function(data) {
            //console.log(data);
            //alert(JSON.stringify(data));
            if (data.status == true) {
               location.reload();
               alert(data.message);
            } else {
               ErrorMsg(data.error);
            }

         }
      });
   });
   $("#allRoles").on("submit", function(e) {
      e.preventDefault();
      var designation = $("#designation").val();
      var role = $("input[name='role[]']:checked").val();
      console.log("designation = " + designation);
      console.log("role = " + role);
      if (designation >= 1 && role >= 1) {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         $.ajax({
            url: "/save_roles",
            method: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(data) {
               console.log(data);
               if (data.status == true) {
                  $('#myModal').modal('hide');
                  $("#alert_message").html("<div class='alert alert-success alert-dismissible in'>" +
                     "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + "<span>" + data.message + "</span" + "</div>");
                  $("#allRoles").trigger('reset');
                  $('#allUser').html('');
                  alert(data.message);
                  location.reload();

               }

            },
         });
      } else {
         alert('Please select role and module');
      }
   });




   // delete user
   function deleteUsers(id) {
      //console.log(id);
      var token = $("meta[name='csrf-token']").attr("content");
      //console.log(token);
      if (confirm("Are you sure you want to delete this")) {
         $.ajax({
            type: "POST",
            url: "/deleteUsers/" + id,
            dataType: "json",
            cache: false,
            data: {
               "id": id,
               "_token": token,
            },
            success: function(data) {
               //console.log(data);
               if (data.status == true) {
                  //$('#allCommYrvalue').html('');
                  location.reload();
                  //allCommYrvalue();
               }
            }
         });
      }
   }
   usersFetch();

   function ErrorMsg(msg) {
      $.each(msg, function(key, value) {
         $('.' + key + '_err').text(value);
      });
   }
</script>