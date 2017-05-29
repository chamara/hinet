<!-- Extend app -->


<!-- Title -->
<?php $__env->startSection('title'); ?>Forgot Password - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
	<div class="text-center margin-bottom-40">
		<img src="<?php echo e(asset('public/img/logo-dark.png')); ?>" class="login-logo"/>
	</div>

	<!-- Login form -->
	<div class="login-form">

		<!-- Header -->
		<h1 class="margin-bottom-40 text-center position-relative">Forgot Password</h1>

		<?php if(session('status')): ?>
		<div class="alert alert-success">
			<?php echo e(session('status')); ?>

		</div>
		<?php endif; ?>

		<?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<form action="<?php echo e(url('/password/email')); ?>" method="post" name="form" id="signup_form">
			<?php echo e(csrf_field()); ?>

			<div class="form-group has-feedback">
				<input type="text" class="form-control input-lg" name="email" id="email" placeholder="Email">
			</div>
			<button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded">Send</button>
			<a href="<?php echo e(url('login')); ?>" class="text-center btn-block margin-top-10 back_btn"><i class="fa fa-long-arrow-left"></i> Go Back</a>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>