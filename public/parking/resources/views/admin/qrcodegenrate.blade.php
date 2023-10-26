<style>
   .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
   }

   .link {
      text-decoration: underline;
   }

   #thumbwrap {
      position: relative;
   }

   .thumb span {
      position: absolute;
      visibility: hidden;
   }

   .thumb:hover,
   .thumb:hover span {
      visibility: visible;
      top: 0;
      /* left:100px;  */
      right: 100px;
      z-index: 1;
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
                  <button class="btn btn-primary me-md-2" type="button" data-toggle="modal" data-target="#createqrcode">Generate Qrcode</button>
               </div>
               <br>
               <div class="card-body"> <!--style="overflow-x: auto;" -->
                  <table id="example1" class="table table-bordered">
                     <thead>
                        <th>Sr.No</th>
                        <th>Qr Code Image</th>
                        <th>Image Url</th>
                     </thead>
                     <tbody>
                        @foreach ($qrdata as $key => $qr_details)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>
                              <a class="thumb" href="#">
                                 <img src="/parking/public/assets/qrCode/{{ $qr_details->kit_number }}.jpg" alt="" class="zoom" id="qrid" style="width:150px;height:150px;">
                            
                                 <p onclick="downloadImage('/parking/public/assets/qrCode/{{ $qr_details->kit_number }}.jpg', '{{ $qr_details->kit_number }}.jpg')" class="mt-2 link">Download</p>

                              </a>
                           </td>
                           <td>http://143.244.140.172/parking/public/assets/qrCode/{{ $qr_details->kit_number }}.jpg</td>
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
<div class="modal fade" id="createqrcode">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Generate Qrcode</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
            <form class="needs-validation" method="POST" action="{{ url('admin/genrateqrcode') }}">
               @csrf
               <div class="form-row">
                  <div class="col-md-6 mb-3">
                     <label for="validationCustom02">Generate No. of Qrcode</label>
                     <input type="number" class="form-control" name="qrcode" />
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