<?php  
// ** Data User logged ** //
$user = Auth::user();
$settings = App\Models\AdminSettings::first();

$data = App\Models\investments::leftJoin('startups', function($join) {
  $join->on('investments.startups_id', '=', 'startups.id');
})
->where('investments.user_id',Auth::user()->id)
->select('investments.*')
->addSelect('startups.title')
->addSelect('startups.logo')
->addSelect('startups.valuation')
->orderBy('investments.id','DESC')
->paginate(20);
?>


<?php $__env->startSection('title'); ?> Portfolio - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.investor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<h1 class="margin-bottom-40">Portfolio</h1>
<div class="table-responsive">
  <table class="table table-striped"> 

    <?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
    <thead> 
      <tr>
        <th>My Investments</th>
        <th>Invested</th>
        <th>Startup Valuation</th>
        <th>Performance</th>
      </tr>
    </thead> 

    <tbody> 
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><img src="<?php echo e(url('public/startups/logo',$investment->logo)); ?>" width="50px" height="50px">&emsp;<?php echo e($investment->title); ?></td>
        <td><?php echo e($settings->currency_symbol.number_format($investment->investment)); ?></td>
        <td><?php echo e($settings->currency_symbol.number_format($investment->valuation)); ?></td>

        <!-- Example of performacnce - Calculation to be added -->
        <td class="uplift">+5%</td>
      </tr><!-- /.TR -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php else: ?>
      <hr />
      <h3 class="text-center no-found">No invesments made.</h3>

      <?php endif; ?>   		  		 		
    </tbody> 
  </table>
</div>
<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>