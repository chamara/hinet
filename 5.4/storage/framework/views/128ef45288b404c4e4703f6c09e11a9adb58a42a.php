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


<?php if(Session::has('incorrect_pass')): ?>
<div class="alert alert-danger btn-sm alert-fonts" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('incorrect_pass')); ?>

</div>
<?php endif; ?>

<?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h1 class="margin-bottom-40">Password</h1>
<form action="<?php echo e(url('account/password')); ?>" method="post" name="form">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

  <div class="form-group has-feedback">
    <label>Current Password</label>
    <input type="password" class="form-control input-lg" id="old_password" name="old_password" placeholder="Current Password" required>
  </div>

  <div class="form-group has-feedback">
    <label>New Password</label>
    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="New Password" required>
  </div>

  <!-- Confirm Password -->
  <div class="form-group has-feedback">
    <input type="password" class="form-control input-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
    <span id="result"></span>
  </div>  

  <button type="submit" id="buttonSubmit" class="btn btn-save btn-lg custom-rounded">Update</button>
</form>

<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Include Javascript -->
<?php echo $__env->make('includes.javascript-password-validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>