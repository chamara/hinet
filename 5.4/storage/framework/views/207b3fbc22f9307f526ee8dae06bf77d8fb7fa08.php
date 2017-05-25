<div class="posts" id="posts"> 
	<div class="row">
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo $__env->make('includes.list-startups', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>