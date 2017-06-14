<?php $__currentLoopData = App\Models\Questions::where('mode','on')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h4 class="profile-title"><?php echo e($question->question); ?></h4>
<p class="margin-bottom-40"><?php echo e($response->{'response_'.$loop->iteration}); ?></p>
<hr>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>