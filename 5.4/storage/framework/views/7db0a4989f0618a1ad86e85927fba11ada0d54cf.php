<?php  
$user = Auth::user();

if($user->role == 'startup'){
  $data = App\Models\Startups::where('user_id',Auth::user()->id)->firstOrFail();
}
?>


<?php $__env->startSection('title'); ?>Account- <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if( $user->role == 'startup'): ?> 
<?php echo $__env->make('includes.startup-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif( $user->role == 'investor'): ?> 
<?php echo $__env->make('includes.investor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
<?php echo $__env->make('includes.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if(session('notification')): ?>
<div class="alert alert-success btn-sm alert-fonts" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(session('notification')); ?>

</div>
<?php endif; ?>
<h1 class="margin-bottom-40">Accounts</h1>
<form action="<?php echo e(url('upload/avatar')); ?>" method="POST" id="formAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="text-center">
   <button type="button" class="btn btn-default no-padding btn-border btn-sm" id="avatar_file" style="margin-top: 10px;">
     <img src="<?php echo e(asset('public/avatar').'/'.Auth::user()->avatar); ?>" alt="User" width="150" height="150" class="avatarUser"  />
   </button>
   <input type="file" name="photo" id="uploadAvatar" accept="image/*" style="visibility: hidden;">
 </div>
</form>

<form action="<?php echo e(url('account')); ?>" method="post" name="form">
 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

 <!-- Full Name -->
 <div class="form-group has-feedback">
   <label>Full Name</label>
   <input type="text" class="form-control input-lg" value="<?php echo e(e( $user->name )); ?>" id="full_name" name="full_name" placeholder="Full Name" required>
 </div>

 <div class="form-group has-feedback">
   <label>Email</label>
   <input type="email" class="form-control input-lg" value="<?php echo e($user->email); ?>" id="email" name="email" placeholder="Email" required>
 </div>

 <button type="submit" id="buttonSubmit" class="btn btn-lg btn-save custom-rounded">Save</button>

</form>


<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
$(document).on('change', '#uploadAvatar', function(){

  $('.wrap-loader').show();
  
  (function(){
    $("#formAvatar").ajaxForm({
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

          $('#uploadAvatar').val('');

          } else {
              $('#uploadAvatar').val('');
              $('.avatarUser').attr('src',e.avatar);
              $('.wrap-loader').hide();
            }
          } //<-- e
          else {
            $('.wrap-loader').hide();
            swal({   
            title: "Error",   
            text: 'Error',   
            type: "error",   
            confirmButtonText: "Ok" 
            });

            $('#uploadAvatar').val('');
          }
      }//<----- SUCCESS
    }).submit();
  })(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>