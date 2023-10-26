<style>
   .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
   }
   .link{
      text-decoration: underline;
   }
   .zoom:hover{

   }

   #thumbwrap {
	position:relative;
   }
   .thumb span { 
      position:absolute;
      visibility:hidden;
   }
   .thumb:hover, .thumb:hover span { 
      visibility:visible;
      top:0;
      /* left:100px;  */
      right: 100px;
      z-index:1;
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
               <!-- <button class="btn btn-primary me-md-2" type="button" data-toggle="modal" data-target="#addvehiclemodel">Add Vehicle</button> -->
               </div>
               <br>
               <div >   <!--style="overflow-x: auto;" -->
                  <table id="example2" class="table table-bordered">
                     <thead>
                        <th>Sr.No</th>
                        <th>Owner Name</th>
                        <!-- <th>Model Name</th> -->
                        <th>Vehicle Number</th>
                        <th>Type</th>
                        <th>Vehicle Color</th>
                        <th>Kit Number</th>
                        <th>QR Code</th>
                        <!-- <th>Registration No.</th> -->
                        <!-- <th>Registration Date</th> -->
                        <!-- <th>Chassis No.</th> -->
                        <!-- <th>Engine Name</th> -->
                        <!-- <th>Fuel Type</th> -->
                        
                        <!-- <th>Contact No.</th> -->
                        
                        <th>Vehicle Class</th>
                        <th>Action</th>
                     </thead>
                     <tbody id="_allUser">
                           @foreach ($registration as $vehicle_details)
                              <tr>
                                 <td>{{ $vehicle_details->id }}</td>
                                 <td>{{ $vehicle_details->owner_name }}</td>
                                 <td>{{ $vehicle_details->vehicle_number }}</td>
                                 <td>{{ $vehicle_details->vehicle_type }}</td>
                                 <td>{{ $vehicle_details->vehicle_color }}</td>
                                 <td>{{ $vehicle_details->kit_number }}</td>

                                 <!-- <td>{{ $vehicle_details->registration_no }}</td> -->
                                 <!-- <td>{{ $vehicle_details->registration_date }}</td> -->
                                 <!-- <td>{{ $vehicle_details->chassis_no }}</td> -->
                                 <!-- <td>{{ $vehicle_details->engine_name }}</td> -->
                                 <!-- <td>{{ $vehicle_details->fuel_type }}</td> -->
                                 <!-- <td>{{ $vehicle_details->model_name }}</td> -->
                                 
                                

                                 <td id="thumbwrap">
                                    <a class="thumb" href="#">
                                       <img src="https://api.qrserver.com/v1/create-qr-code/?size=60x60&data= Name:{{$vehicle_details->owner_name}},Registration No.:{{ $vehicle_details->registration_no }},Registration Date:{{ $vehicle_details->registration_date }},Chassis No:{{ $vehicle_details->chassis_no }},Engine No.:{{ $vehicle_details->engine_name }},Fuel Type:{{ $vehicle_details->fuel_type }},Model No.:{{ $vehicle_details->model_name }}.png" alt="" class="zoom" id="qrid">

                                       <p onclick="downloadImage('https://api.qrserver.com/v1/create-qr-code/?size=60x60&data= Name:{{$vehicle_details->owner_name}},Registration No.:{{ $vehicle_details->registration_no }},Registration Date:{{ $vehicle_details->registration_date }},Chassis No:{{ $vehicle_details->chassis_no }},Engine No.:{{ $vehicle_details->engine_name }},Fuel Type:{{ $vehicle_details->fuel_type }},Model No.:{{ $vehicle_details->model_name }}.png', '{{$vehicle_details->owner_name}}.png')" class="mt-2 link" >Download</p>
                                       
                                       <!-- <p onclick="downloadImage('https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Stack_Overflow_logo.svg/1280px-Stack_Overflow_logo.svg.png', 'LogoStackOverflow.png')" >DOWNLOAD</p> -->

                                       <span>
                                       <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data= Name:{{$vehicle_details->owner_name}},Registration No.:{{ $vehicle_details->registration_no }},Registration Date:{{ $vehicle_details->registration_date }},Chassis No:{{ $vehicle_details->chassis_no }},Engine No.:{{ $vehicle_details->engine_name }},Fuel Type:{{ $vehicle_details->fuel_type }},Model No.:{{ $vehicle_details->model_name }}" alt="" class="zoom" id="qrid2">
                                       </span>
                                    </a>
                                 </td>
                                 <td>{{ $vehicle_details->vehicle_class }}</td>
                                 <td>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $vehicle_details->id }}" data-original-title="Edit" class="edit btn btn-primary editvehicle">
                                       <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                    </a>

                                    <a  class="btn btn-danger" href = 'deleteVehicle/{{ $vehicle_details->id}}'>
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


<!-- The  ADD USER vehicle details Modal -->
<div class="modal fade" id="addvehiclemodel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Vehicle Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" method="POST" action="{{ url('admin/addvehicledetails') }}">
            @csrf
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom01">Owner Name</label><br>
                     
                     <select class="form-control" name="owner_name">
                        
                     </select>
                    
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Registration No.</label>
                     <input type="text" class="form-control"  name="registration_no"  id="registration_no" required>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom03">Registration Date</label>
                     <input type="date" class="form-control"  name="registration_date" id="registration_date" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Chassis No.</label>
                     <input type="text" class="form-control"  name="Chassis_no"  id="Chassis_no" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Engine Name</label>
                     <input type="text" class="form-control"  name="engine_name"  id="engine_name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Fuel Type</label>
                     <input type="text" class="form-control"  name="fuel_type"  id="fuel_type" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Model Name</label>
                     <input type="text" class="form-control"  name="model_name" id="model_name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Vehicle Class</label>
                     <input type="text" class="form-control"  name="vehicle_class"  id="vehicle_class" required>
                  </div>
               </div>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <!-- <button class="btn btn-primary"  onclick="generate()">Generate Qrcode</button> -->
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!--  Modal END -->


  <!-- The update vehicle details -->
<div class="modal fade" id="editVehicledetails">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Vehicle Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" method="POST" action="{{ url('admin/updatevehicleDetails') }}">

               <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
               <input type ="hidden" id="vehicle_id1" value="" name="vehicleid">


               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom01">Owner Name</label>
                     <input type="text" class="form-control" name="owner_name" id="owner_name" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Registration No.</label>
                     <input type="text" class="form-control"  name="registration_no"   id="registration_no1" required>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom03">Registration Date</label>
                     <input type="date" class="form-control"  name="registration_date" id="registration_date1" required >
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Chassis No.</label>
                     <input type="text" class="form-control"  name="chassis_no"   id="Chassis_no1" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Engine Name</label>
                     <input type="text" class="form-control"  name="engine_name"   id="engine_name1" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Fuel Type</label>
                     <input type="text" class="form-control"  name="fuel_type"   id="fuel_type1" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Model Name</label>
                     <input type="text" class="form-control"  name="model_name"   id="model_name1" required>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Vehicle Class</label>
                     <input type="text" class="form-control"  name="vehicle_class"  id="vehicle_class1" required>
                  </div>
               </div> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="submit">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!--  Modal END -->


  


  <!-- THIS SCRIPT FOR DOWNLOAD IMAGE -->
  <script>
   function downloadImage(url, name){
      fetch(url)
        .then(resp => resp.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            // the filename you want
            a.download = name;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(() => alert('An error sorry'));
   }

  </script>

  <!--   END -->


<!-- THIS SCRIPT FOR UPDATE USER DETAILS -->

  <script>
   $('body').on('click', '.editvehicle', function () {

      // alert("Hello");

      var vehicle_id = $(this).data('id');
      // alert(vehicle_id);

      $.ajax({
          data: {id:vehicle_id, _token:'{{ csrf_token() }}'},
          url: "getVehicleDetails",
          type: "POST",
          //dataType: 'json',
          success: function (data) {
           console.log(data);
           $('#vehicle_id1').val(data[0].id);
           $('#owner_name').val(data[0].owner_name);
           $('#registration_no1').val(data[0].registration_no);
           $('#registration_date1').val(data[0].registration_date);
           $('#Chassis_no1').val(data[0].chassis_no);
           $('#engine_name1').val(data[0].engine_name);
           $('#fuel_type1').val(data[0].fuel_type);
           $('#model_name1').val(data[0].model_name);
           $('#vehicle_class1').val(data[0].vehicle_class);
         
            $('#editVehicledetails').modal('show'); 
          }
      });

     
   });
  </script>

  <!--   END -->

  

