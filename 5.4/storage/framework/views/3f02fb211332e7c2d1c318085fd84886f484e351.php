<?php $settings = App\Models\AdminSettings::first(); 
$teams = $data->teams()->orderBy('id','desc')->paginate(20);
?>


<?php $__env->startSection('title'); ?>Edit - Team <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.startup-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h1 class="margin-bottom-40">Team<span><a href="<?php echo e(url('edit/startup/teams/add',$data->id)); ?>" class="btn pull-right text-center btn-save custom-rounded">Add New</a></span></h1>
<div class="margin-top-40">
  <div class="table-responsive">
    <table class="table"> 
      <thead> 
        <tr>
          <th>Name</th>
          <th>Title</th>
          <th>Shareholding</th>
          <th>Delete</th>
        </tr>
      </thead> 

      <tbody> 
        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($team->name); ?></td>
          <td><?php echo e($team->title); ?></td>
          <td><?php echo e($team->shareholding); ?>%</td>
          <td><a href="<?php echo e(url('edit/startup/teams/delete/').'/'.$team->id); ?>" class="btn btn-danger actionDelete">Delete
          </a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
      </tbody> 
    </table>
  </div>
</div>




<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>


<!-- Limit Textarea Function -->
<script type="text/javascript">
  $(document).ready(function () {
    $('textarea').on("propertychange keyup input paste",

      function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
          $(this).val($(this).val().substring(0, limit));
        }
        $(this).next('span').text(remainingChars<=0?0:remainingChars);
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>