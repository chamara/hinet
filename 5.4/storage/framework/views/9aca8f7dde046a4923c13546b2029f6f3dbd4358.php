 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Pages (<?php echo e($data->count()); ?>)
     <a href="<?php echo e(url('panel/admin/pages/create')); ?>" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Post
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
    <i class="fa fa-check margin-separator"></i> <?php echo e(Session::get('success_message')); ?>

  </div>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"> 
            Posts
          </h3>
        </div>      
       <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
         <tbody>

          <?php if( $data->count() !=  0 ): ?>
          <tr>
            <th class="active">ID</th>
            <th class="active">Title</th>
            <th class="active">Slug</th>
            <th class="active">Actions</th>
          </tr>

          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($page->id); ?></td>
            <td><?php echo e($page->title); ?></td>
            <td><?php echo e(strtolower($page->slug)); ?></td>
            <td>
              <div id="delete" data-field-id="Post">
                <a href="<?php echo e(route('pages.edit', $page->id)); ?>" class="btn btn-success btn-xs padding-btn">
                  Edit
                </a> 

                <?php if( $data->count() != 1 ): ?>

                  <?php echo Form::open([
                  'method' => 'DELETE',
                  'route' => ['pages.destroy', $page->id],
                  'id' => 'form'.$page->id,
                  'class' => 'displayInline'
                  ]); ?>

                  <?php echo Form::submit('Delete', ['data-url' => $page->id, 'class' => 'btn btn-danger btn-xs padding-btn actionDelete']); ?>

                  <?php echo Form::close(); ?>


                <?php endif; ?>
            </div>
          </td>

        </tr><!-- /.TR -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
        <hr />
        <h3 class="text-center no-found">No Results</h3>
        <?php endif; ?>

      </tbody>

    </table>
  </div>
</div><!-- /.box -->
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