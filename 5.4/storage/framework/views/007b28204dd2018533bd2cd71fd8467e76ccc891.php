<!-- Extend App -->


<?php $__env->startSection('title'); ?><?php echo e($category->name.' - '); ?><?php $__env->stopSection(); ?>

<!-- Content Section -->
<?php $__env->startSection('content'); ?> 
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Current Investment Opportunties</h1>
		<div class="text-center">
			<a href="<?php echo e(url('/register/startup')); ?>" class="btn btn-lg btn-green custom-rounded">Learn How to Invest</a>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container margin-top-40">
	<!-- Select Filter -->
	<h1><?php echo e($category->name.' - '); ?> Opportunities
		<span>
			<select class="select-filter" name="filter" onchange="location = this.value;">
				<option selected disabled><?php echo e($category->name); ?></option> 
				<option value="/opportunities">Show All</option> 
				<?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($category->startups()->count() != 0): ?> 
				<option value="./<?php echo e($category->slug); ?>"><?php echo e($category->name); ?> (<?php echo e($category->startups()->count()); ?>)</option>
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</span>
	</h1>

	<!-- Featured Opportunities -->
	<div class="margin-bottom-40">
		<?php echo $__env->make('includes.opportunities', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>