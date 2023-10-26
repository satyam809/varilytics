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
               <!-- <button class="btn btn-primary me-md-2" type="button" data-toggle="modal" data-target="#form_coupon">Generate Coupon Code</button> -->
               <button type="button" class="btn btn-primary me-md-2" data-toggle="modal" data-target="#form_coupon"><span class="glyphicon glyphicon-plus"></span> Generate Coupon</button>   
            </div>
               <br>
               <div style="overflow-x: auto;">
                  <table id="example2" class="table table-bordered">
                     <thead>
                        <th>Coupon Id</th>
                        <th>Coupon Code</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Action</th>
                     </thead>

                     <tbody id="_allUser">
                        
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              
                              <td>
                              <!-- href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary editProduct"> -->
                                 <a href="javascript:void(0)" data-toggle="tooltip"  data-id="" data-original-title="Edit" class="edit btn btn-primary edituser">
                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                 </a>
                                 <a  class="btn btn-danger" href = '#'>
                                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                 </a>
                              </td>
                           </tr>
                        
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



<div class="modal fade" id="form_coupon" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<form  method="POST"  action="{{ url('admin/addCoupondetails') }}"> 
            @csrf
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Coupon Code</label>
								<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
								<br />
								<button id="generate" class="btn btn-success" type="button" onclick="create_random_string(9)"><span class="glyphicon glyphicon-random"></span> Generate</button>
							</div>
							<div class="form-group">
								<label>Discount</label>
								<input type="number" class="form-control" name="discount" min="10" required="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("getCouponDetails2", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script> -->

<script type="text/javascript">
   function create_random_string(string_length){
      var random_string='';
      var characters = 'ABCDEFGHILJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
      for(i=0; i<string_length; i++){
         random_string += characters.charAt(Math.floor(Math.random() * characters.length));
      }
      console.log(random_string);
      // return random_string;
      // document.getElementById("coupon").value = random_string;
   }

</script>