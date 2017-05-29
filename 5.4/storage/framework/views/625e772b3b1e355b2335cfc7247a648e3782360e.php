 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Startups(<?php echo e($data->total()); ?>)
     <a href="<?php echo e(url('panel/admin/startup/add')); ?>" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add startup
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
      <i class="fa fa-check margin-separator"></i>  <?php echo e(Session::get('success_message')); ?>	        
    </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Startups</h3>
            <div class="box-tools">

              <?php if( $data->total() !=  0 ): ?>   
              <!-- form -->
              <form role="search" autocomplete="off" action="<?php echo e(url('panel/admin/startups')); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="q" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form><!-- form -->
              <?php endif; ?>

            </div>
          </div>


          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                <?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                <tr>
                  <th class="active">ID</th>
                  <th class="active">Title</th>
                  <th class="active">User</th>
                  <th class="active">Investment Sought</th>
                  <th class="active">Funds Raised</th>
                  <th class="active">Status</th>
                  <th class="active">Date Added</th>
                  <th class="active">Actions</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $startup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($startup->id); ?></td>
                  <td><img src="<?php echo e(asset('public/startups/logo').'/'.$startup->logo); ?>" width="20" /> 
                    <a title="<?php echo e($startup->title); ?>" href="<?php echo e(url('startup',$startup->id)); ?>" target="_blank"><?php echo e(str_limit($startup->title,20,'...')); ?> <i class="fa fa-external-link-square"></i></a>
                  </td>
                  <td><?php echo e($startup->user()->name); ?></td>
                  <td><?php echo e($settings->currency_symbol.number_format($startup->goal)); ?></td>
                  <td><?php echo e($settings->currency_symbol.number_format($startup->investments()->sum('investment'))); ?></td>
                  <td>
                    <?php if( $startup->status == 'active' && $startup->finalized == 0 ): ?>
                    <span class="label label-success">Active</span>
                    <?php elseif( $startup->status == 'pending' && $startup->finalized == 0 ): ?>
                    <span class="label label-warning">Pending</span>
                    <?php else: ?>
                    <span class="label label-default">Finalized</span>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e(date('d M, y', strtotime($startup->created_at))); ?></td>
                  <td> <a href="<?php echo e(url('panel/admin/startups/edit',$startup->id)); ?>" class="btn btn-success btn-xs padding-btn">
                    Edit
                  </a> </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                <hr />
                <h3 class="text-center no-found">No Results Found</h3>

                <?php if( isset( $query ) ): ?>
                <div class="col-md-12 text-center padding-bottom-15">
                  <a href="<?php echo e(url('panel/admin/startups')); ?>" class="btn btn-sm btn-danger">Back</a>
                </div>

                <?php endif; ?>

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