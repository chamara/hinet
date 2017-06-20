<?php $settings = App\Models\AdminSettings::first(); ?>


<?php $__env->startSection('title'); ?>Dashboard - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.startup-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
 <div class="col-md-6">
  <div class="panel panel-default panel-transparent">
    <div class="panel-body">
      <div class="media none-overflow">
        <div class="media-center margin-bottom-5">
          <!-- *********** LOGO ************* -->
          <form action="<?php echo e(url('upload/logo')); ?>" method="POST" id="formLogo" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="text-center">
              <button type="button" id="logo_file">
                <img src="<?php echo e(asset('public/startups/logo').'/'.$data->logo); ?>" class="logoUser" width="150" height="150"/>
              </button>
              <input type="file" name="photo" id="uploadLogo" accept="image/*" style="visibility: hidden;">
            </div>
          </form><!-- *********** LOGO ************* -->
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-6">
  <div class="panel panel-default panel-transparent">
    <div class="panel-body">
      <div class="media none-overflow">
        <div class="media-center margin-bottom-5">

          <!-- *********** cover ************* -->
          <form action="<?php echo e(url('upload/cover')); ?>" method="POST" id="formCover" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="text-center">
              <button type="button" id="cover_file">
               <img src="<?php echo e(asset('public/startups/cover').'/'.$data->cover); ?>" class="coverUser" height="150px" width="auto"/>
             </button>
             <input type="file" name="photo" id="uploadCover" accept="image/*" style="visibility: hidden;">
           </div>
         </form><!-- *********** Cover ************* -->
       </div>
     </div>
   </div>
 </div>
</div>
</div>

<form method="POST" action="" enctype="multipart/form-data" id="formUpdate">  
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Startup Name</label>
    <input type="text" value="<?php echo e($data->title); ?>" name="title" id="title" class="form-control input-lg" placeholder="Name">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Tagline</label>
    <input type="text" value="<?php echo e($data->oneliner); ?>" name="oneliner" class="form-control input-lg" placeholder="One Liner">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Website</label>
    <input type="text" value="<?php echo e($data->website); ?>" name="website" class="form-control input-lg" placeholder="Website">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Facebook</label>
    <input type="text" value="<?php echo e($data->facebook); ?>" name="facebook" class="form-control input-lg" placeholder="Facebook">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Twitter</label>
    <input type="text" value="<?php echo e($data->twitter); ?>" name="twitter" class="form-control input-lg" placeholder="Twitter">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Linkedin</label>
    <input type="text" value="<?php echo e($data->linkedin); ?>" name="linkedin" class="form-control input-lg" placeholder="Linkedin">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Video</label>
    <input type="text" value="<?php echo e($data->video); ?>" name="video" class="form-control input-lg" placeholder="https://www.youtube.com/watch?v=dhreqc-WYy8">
  </div>

  <div class="form-group">
    <label>Short Description</label>
    <textarea name="description" data-limit=300 rows="5" id="description" class="form-control input-lg" placeholder="Description"><?php echo e($data->description); ?></textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Choose a Category</label>
    <select name="categories_id" class="form-control input-lg">
      <option value="">Select One</option>
      <?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
      <option <?php if( $category->id == $data->categories_id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Location</label>
    <input type="text" value="<?php echo e($data->location); ?>" name="location" class="form-control input-lg" placeholder="Location">
  </div>


  <!-- Alert -->
  <div class="alert alert-success display-none" id="successAlert">
    <ul class="list-unstyled" id="success_update">
      <li>Saved!</li>
    </ul>
  </div>

  <button type="submit" id="buttonFormUpdate" class="btn btn-save custom-rounded">Save</button>
</form>
<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD COVER  * ===============>>>>>>>//
$(document).on('change', '#uploadCover', function(){

  $('.wrap-loader').show();

  (function(){
    $("#formCover").ajaxForm({
      dataType : 'json', 
      success:  function(e){
        if( e ){
          if( e.success == false ){
            $('.wrap-loader').hide();

            var error = '';
            for($key in e.errors){
              error += '' + e.errors[$key] + '';
            }
            swal({   
              title: "Error",   
              text: ""+ error +"",   
              type: "error",   
              confirmButtonText: "Ok" 
            });

            $('#uploadCover').val('');

          } else {

            $('#uploadCover').val('');
            $('.coverUser').attr('src',e.cover);
            $('.wrap-loader').hide();
          }

}//<-- e
else {
  $('.wrap-loader').hide();
  swal({   
    title: "Error",   
    text: 'Error',   
    type: "error",   
    confirmButtonText: "Ok" 
  });

  $('#uploadCover').val('');
}
}//<----- SUCCESS
}).submit();
})(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD COVER  * ===============>>>>>>>//
</script>

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD LOGO  * ===============>>>>>>>//
$(document).on('change', '#uploadLogo', function(){

  $('.wrap-loader').show();

  (function(){
    $("#formLogo").ajaxForm({
      dataType : 'json', 
      success:  function(e){
        if( e ){
          if( e.success == false ){
            $('.wrap-loader').hide();

            var error = '';
            for($key in e.errors){
              error += '' + e.errors[$key] + '';
            }
            swal({   
              title: "Error",   
              text: ""+ error +"",   
              type: "error",   
              confirmButtonText: "Ok" 
            });

            $('#uploadLogo').val('');

          } else {

            $('#uploadLogo').val('');
            $('.logoUser').attr('src',e.logo);
            $('.wrap-loader').hide();
          }

}//<-- e
else {
  $('.wrap-loader').hide();
  swal({   
    title: "Error",   
    text: 'Error',   
    type: "error",   
    confirmButtonText: "Ok" 
  });

  $('#uploadLogo').val('');
}
}//<----- SUCCESS
}).submit();
})(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD LOGO  * ===============>>>>>>>//
</script>

<!-- Limit Textarea Function -->
<script type="text/javascript">
  $(document).ready(function () {
    $('textarea').on("propertychange keyup input paste",

      function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
          $(this).val($(this).val().substring(0, limit));
        }
        $(this).next('span').text(remainingChars<=0?0:remainingChars);
      });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>