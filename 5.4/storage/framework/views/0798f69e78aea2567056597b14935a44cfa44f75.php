<div class="table-responsive">
	<table class="table"> 
		<tbody> 
			<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
			<td><img src="<?php echo e(url('public/startups/teams',$team->avatar)); ?>" class="team-avatar"/>
			<ul class="list-inline margin-top-20">
			<?php if( $team->linkedin != '' ): ?>   
			<li><a target="_blank" href="<?php echo e($team->linkedin); ?>" class="ico-social"><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>
			</ul ></td>
			<td><?php echo e($team->name); ?></td>
			<td><?php echo e($team->title); ?></td>
			<td><?php echo e($team->shareholding + 0); ?>%</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  		 		
		</tbody> 
	</table>
</div>