 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Investments (<?php echo e($data->total()); ?>)
     <a href="<?php echo e(url('panel/admin/investment/add')); ?>" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Offline Investment
     </a>
   </h4>

 </section>
 <!-- Main content -->
 <section class="content">

   <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"> 
            Investments
          </h3>
        </div>

        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
           <tbody>

            <?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
            <tr>
              <th class="active">ID</th>
              <th class="active">Full Name</th>
              <th class="active">Startups</th>
              <th class="active">Email</th>
              <th class="active">Investment</th>
              <th class="active">Date</th>
              <th class="active">Actions</th>
            </tr><!-- /.TR -->

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($investment->id); ?></td>
              <td><?php echo e($investment->fullname); ?></td>
              <td><a href="<?php echo e(url('startup',$investment->startups_id)); ?>" target="_blank"><?php echo e(str_limit($investment->startups()->title, 10, '...')); ?> <i class="fa fa-external-link-square"></i></a></td>
              <td><?php echo e($investment->email); ?></td>
              <td><?php echo e($settings->currency_symbol.number_format($investment->investment)); ?></td>
              <td><?php echo e(date('d M, y', strtotime($investment->created_at))); ?></td>
              <td> <a href="<?php echo e(url('panel/admin/investments',$investment->id)); ?>" class="btn btn-success btn-xs padding-btn">
                View
              </a> </td>
            </tr><!-- /.TR -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <hr />
            <h3 class="text-center no-found">No Results Found</h3>

            <?php endif; ?>

          </tbody>

        </table>

      </div>
    </div><!-- /.box -->
    <?php if( $data->lastPage() > 1 ): ?>
    <?php echo e($data->links()); ?>

    <?php endif; ?>
  </div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>