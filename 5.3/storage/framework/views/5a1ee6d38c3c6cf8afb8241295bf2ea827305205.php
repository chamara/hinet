<!--Extend App Layout--> 


<!--Page Title-->
<?php $__env->startSection('title'); ?>Login - <?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
  <div class="text-center">
    <img src="<?php echo e(asset('public/img/logo-dark.png')); ?>" class="login-logo"/>
  </div>
  <div class="login-form">
    <h1 class=" margin-bottom-40 text-center"></h1>

    <!-- Include errors -->
    <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Login Form -->
    <form action="<?php echo e(url('login')); ?>" method="post" name="form" id="signup_form">

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

      <!-- Username or Email -->
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="email" id="username_or_email" placeholder="Email">
      </div>

      <!-- Password -->
      <div class="form-group">
        <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
      </div>

      <!-- Submit -->
      <button type="submit" id="buttonSubmit" class="btn btn-lg btn-block btn-main custom-rounded">Login</button>
    </form>
    <hr>
    <p><a href="<?php echo e(url('/password/reset')); ?>">Forgot Password?</a></p>
    <p>Don't have an account yet?<a href="<?php echo e(url('/register')); ?>"> Sign Up</a></p>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>