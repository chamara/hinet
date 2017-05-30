<div class="table-responsive">
	<table class="table"> 
		<tbody> 
			<?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><a target="_blank" href="<?php echo e(url('public/startups/documents',$document->path)); ?>">
					<?php if($document->type == 'pdf' ): ?>
					<img src="<?php echo e(asset('public/img/pdf.png')); ?>" class="startup-file"/>
					<?php elseif($document->type == 'xls' || $document->type == 'xlsx'): ?>
					<img src="<?php echo e(asset('public/img/xls.png')); ?>" class="startup-file"/>
					<?php endif; ?>
					</a>
				</td>
				<td><a class="filename" target="_blank" href="<?php echo e(url('public/startups/documents',$document->path)); ?>"><?php echo e($document->filename); ?></a></td>
				<td><?php echo e($document->filesize); ?>mb</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  		 		
		</tbody> 
	</table>
</div>