<!--MAIN APP LAYOUT TEMPLATE-->

<!--Admin Settings-->
<?php 
$settings = App\Models\AdminSettings::first();
$userAuth = Auth::user(); 
?> 

<!DOCTYPE html> 
<html lang="en">

<!--Start Header-->
<head>

	<!--Meta Data-->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<!-- Meta from admin settings -->
	<meta name="description" content="<?php echo $__env->yieldContent('description_custom'); ?><?php echo e($settings->description); ?>">
	<meta name="keywords" content="<?php echo e($settings->keywords); ?>" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.png')); ?>" />

	<!-- Title -->
	<title><?php $__env->startSection('title'); ?><?php echo $__env->yieldSection(); ?> <?php if( isset( $settings->title ) ): ?><?php echo e($settings->title); ?><?php endif; ?></title>

	<!-- Include CSS -->
	<?php echo $__env->make('includes.css_general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!-- Include Specific Page CSS -->
	<?php echo $__env->yieldContent('css'); ?>

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>
</head>
<body>
		<!-- Navbar -->
		<?php echo $__env->make('includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- Include Specific Page Content -->
		<?php echo $__env->yieldContent('content'); ?>

		<!-- Include Footer-->
		<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- Include Javascript General-->	
		<?php echo $__env->make('includes.javascript_general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- Include Specific Page Javascript-->
		<?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>
