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
                        <th>Username</th>
                        <th>Address</th>
                        <th>Productname</th>
                        <th>Quantity</th>
                        <th>Grandtotal</th>
                        <th>Payment method</th>
                        <th>Order status</th>
                        
                        <th>Order Date</th>
                        <th>Qrcode</th>
                     </thead>

                     <tbody id="_allUser">
                     @foreach ($shares as $shares_details)
                           <tr>
                              <td>{{ $shares_details->id }}</td>
                              <td>{{ $shares_details->name }}</td>
                              <td>{{ $shares_details->address }}</td>

                              @if($shares_details->product_id==1)
                                 <td>New or Decal</td>
                              
                              @else
                                 <td>Reorder OR Decal</td>
                              
                            @endif
                             
                              <td>{{ $shares_details->quantity }}</td>
                              <td>{{ $shares_details->grand_total }}</td>
                              <td>{{ $shares_details->payment_method }}</td>
                              <td>{{ $shares_details->order_status }}</td>
                              <td>{{ $shares_details->created_at }}</td>
                              <td>
                                 <a class="thumb" href="#">
                                    <img src="/parking/public/assets/qrCode/{{ $shares_details->kit_number }}.jpg" alt="" class="zoom" id="qrid" style="width:150px;height:150px;">
                                    <p onclick="downloadImage('/parking/public/assets/qrCode/{{ $shares_details->kit_number }}.jpg', '{{ $shares_details->kit_number }}.jpg')" class="mt-2 link">Download</p>
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




<!-- THIS SCRIPT FOR DOWNLOAD IMAGE -->
<script>
   function downloadImage(url, name) {
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