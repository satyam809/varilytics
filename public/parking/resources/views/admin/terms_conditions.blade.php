<style>
   .field-icon {
      float: right;
      margin-left: -25px;
      margin-top: -25px;
      position: relative;
      z-index: 2;
   }
   .tox-notifications-container{display: none}
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="needs-validation" method="POST" action="{{ url('admin/addconditiondetails') }}">
                    @csrf
                        <div class="row pb-2">
                            <div class="col-md-12 bg-light text-right">
                                <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" id="conditionid" name="cvalue" value="{{ $condition->id }}">
                        <textarea name="conditions_value" placeholder="Write Something About your Term & Conditions !">{{ $condition->conditions_value }}</textarea>
                    </form>
                </div> 
            </div>
        </div><!-- /.container-fluid --> 
   </section>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>