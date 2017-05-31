<!-- Admin Settings -->
<?php $settings = App\Models\AdminSettings::first();?>

<!--Extend App Layout-->


<!--Page Title-->
<?php $__env->startSection('title'); ?>Register - <?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
  <div class="text-center margin-bottom-40">
    <img src="<?php echo e(asset('public/img/logo-dark.png')); ?>" class="login-logo"/>
  </div>
  <div class="signup-form">
    <h1 class=" margin-bottom-40 text-center"></h1>

    <?php if($settings->disable_startups_reg == 'no'): ?>
      <div class="form-group">
        <a href="<?php echo e(url('/register/startup')); ?>" class="btn btn-block btn-lg btn-main custom-rounded">Create Startup Profile</a>
      </div>
    <?php endif; ?>

    <?php if($settings->disable_investors_reg == 'no'): ?>
      <div class="form-group">
        <a href="<?php echo e(url('/register/investor')); ?>" class="btn btn-block btn-lg btn-main custom-rounded">Request to Join as Investor</a>
      </div>
    <?php endif; ?>

    <hr>
    <p>Already registered? <a href="<?php echo e(url('/login')); ?>">Login</a></p>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>