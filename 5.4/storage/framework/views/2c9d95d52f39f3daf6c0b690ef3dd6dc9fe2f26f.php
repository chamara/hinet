<?php $settings = App\Models\AdminSettings::first(); 
$documents = $data->documents()->orderBy('id','desc')->paginate(20);
?>


<?php $__env->startSection('title'); ?>Edit Documents - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.startup-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h1 class="margin-bottom-40">Documents<span><a href="<?php echo e(url('edit/startup/documents/add',$data->id)); ?>" class="btn pull-right text-center btn-save custom-rounded">Add New</a></span></h1>

<div class="margin-top-40">
  <div class="table-responsive">
    <table class="table"> 
      <thead> 
        <tr>
          <th>Document</th>
          <th>Filename</th>
          <th>Delete</th>
        </tr>
      </thead> 

      <tbody> 
        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php if($document->type == 'pdf' ): ?>
            <img src="<?php echo e(asset('public/img/pdf.png')); ?>" class="startup-file"/>
            <?php elseif($document->type == 'xls' || $document->type == 'xlsx'): ?>
            <img src="<?php echo e(asset('public/img/xls.png')); ?>" class="startup-file"/>
            <?php endif; ?>
          </td>
          <td><a class="filename" target="_blank" href="<?php echo e(url('public/startups/documents',$document->path)); ?>"><?php echo e($document->filename); ?>.<?php echo e($document->type); ?></a></td>
          <td> <a href="<?php echo e(url('edit/startup/documents/delete/').'/'.$document->id); ?>" class="btn btn-danger actionDelete">Delete
          </a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
      </tbody> 
    </table>
  </div>
</div>

<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>