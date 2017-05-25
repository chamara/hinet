<!-- Admin Settings -->
<?php $settings = App\Models\AdminSettings::first();?>

<!-- Extend App -->


<!--Page Title-->
<?php $__env->startSection('title'); ?>Invest in UK Startups - <?php $__env->stopSection(); ?>

<!-- Content Section -->
<?php $__env->startSection('content'); ?> 
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Startup Funding Club</h1>
		<div class="text-center">
			<a href="<?php echo e(url('/register/startup')); ?>" class="btn btn-lg btn-green">Create Startup Profile</a><a href="<?php echo e(url('/register/investor')); ?>" class="btn text-center btn-lg btn-green margin-left">Join as Investor</a>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container margin-top-40">
	<!-- Header -->
	<h1 class="text-center margin-bottom-40">Featured Startups</h1>	

	<!-- Featured Opportunities -->
	<div class="margin-bottom-40">
		<?php echo $__env->make('includes.featured-opportunities', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>