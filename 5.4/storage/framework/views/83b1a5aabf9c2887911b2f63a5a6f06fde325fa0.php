<div class="posts" id="posts"> 
	<div class="row">	
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo $__env->make('includes.list-startups', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4">
		<div class="pull-right padding-20"><?php echo e($data->links('vendor.pagination.default')); ?></div>
		</div>
	</div>
</div>