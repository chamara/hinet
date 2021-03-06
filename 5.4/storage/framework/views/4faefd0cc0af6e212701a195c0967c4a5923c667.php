<!-- FORM ERRORS -->

<?php if(count($errors) > 0): ?> 
<!-- Start Box Body -->
<div class="box-body">
	<div class="alert alert-danger" id="dangerAlert">
		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
		
		<i class="glyphicon glyphicon-alert myicon-right"></i>Error!<br><br>
		<ul class="list-unstyled">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><i class="glyphicon glyphicon-remove myicon-right"></i> <?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</div>
<?php endif; ?>		