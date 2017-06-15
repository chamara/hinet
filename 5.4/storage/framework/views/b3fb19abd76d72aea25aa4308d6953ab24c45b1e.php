 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
       Admin<i class="fa fa-angle-right margin-separator"></i>Picklists<i class="fa fa-angle-right margin-separator"></i>Statuses
       <a href="<?php echo e(url('panel/admin/statuses/add')); ?>" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Status
       </a>
     </h4>    
    </section>

  <!-- Main content -->
  <section class="content">

    <?php if(Session::has('success_message')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <?php echo e(Session::get('success_message')); ?>	        
    </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> 
              Statuses                     
            </h3>
          </div>        
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                <tr>
                  <th class='active'>ID</th>
                  <th class='active'>Status</th>
                  <th class='active'>Table</th>
                  <th class='active'>Mode</th>
                  <th class='active'>Actions</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($status->id); ?></td>
                  <td><?php echo e($status->status); ?></td>
                  <td><?php echo e($status->table); ?></td>
                  <?php if( $status->mode == 'on' ) {
                    $mode = 'success';
                  } else {
                    $mode = 'danger';
                  } ?>
                  <td><span class="label label-<?php echo e($mode); ?>"><?php echo e(ucfirst($status->mode)); ?></span></td>                  
                  <td>
                    <div id="delete" data-field-id="Status">
                      <a href="<?php echo e(url('panel/admin/statuses/edit/').'/'.$status->id); ?>" class="btn btn-success btn-xs padding-btn">
                        Edit
                      </a> 
                      <a href="javascript:void(0);" data-url="<?php echo e(url('panel/admin/statuses/delete/').'/'.$status->id); ?>" class="btn btn-danger btn-xs padding-btn actionDelete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr><!-- /.TR -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>        	
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- Include Javascript -->
<?php echo $__env->make('includes.javascript-admin-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>