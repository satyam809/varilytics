<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <br>
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->

         <div class="row">
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3 id="totalTopic"></h3>

                     <p>Total Topics</p>
                  </div>
                  <div class="icon">
                     <i class="iion ion-stats-bars"></i>
                  </div>
                  <a href="{{ url('admin/topic') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3 id="taggedTopic"></h3>

                     <p>Tagged Topics</p>
                  </div>
                  <div class="icon">
                     <i class="iion ion-stats-bars"></i>
                  </div>
                  <a href="{{ url('admin/topic') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
         <!-- /.row -->
         <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
   function getTotalTopicsAndTagTopics(){
      $.ajax({
            url: "/getTotalTopicsAndTagTopics",
            method: "GET",
            dataType: "json",
            success: function(data) {
               //alert(data.taggedTopic);
               $("#taggedTopic").text(data.taggedTopic);
               $("#totalTopic").text(data.totaTopic);
                //console.log(data);
            }
        });
   }
   getTotalTopicsAndTagTopics();
</script>