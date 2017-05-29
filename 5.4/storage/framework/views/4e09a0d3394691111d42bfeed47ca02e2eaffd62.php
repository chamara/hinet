<!-- Admin Settings -->
<?php $settings = App\Models\AdminSettings::first();?>

<!-- Extend App -->


<!--Page Title-->
<?php $__env->startSection('title'); ?>For Investors - <?php $__env->stopSection(); ?>

<!-- Content Section -->
<?php $__env->startSection('content'); ?>
<div class="banner-divider banner-blue">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">The Trusted Platform for Accredited UK Investors</h1>
		<?php if($settings->disable_investors_reg == 'no'): ?>
			<div class="text-center">
				<a href="<?php echo e(url('/register/investor')); ?>" class="btn text-center btn-lg btn-blue custom-rounded">Request to join</a>
			</div>
		<?php endif; ?>
	</div>
</div>

<!-- Container -->
<div class="container container-narrow margin-top-40 margin-bottom-40">
	<div class="row margin-bottom-40">
		<h1 class="margin-bottom-40 investors-header">This page is under construction...</h1>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>