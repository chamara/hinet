 
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Picklists
      <i class="fa fa-angle-right margin-separator"></i>Categories
      <i class="fa fa-angle-right margin-separator"></i><?php echo e($categories->name); ?>      
      <i class="fa fa-angle-right margin-separator"></i>Edit
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="content">

      <div class="row">

        <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Category</h3>
          </div>

          <!-- form start -->
          <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/categories/update')); ?>" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e($categories->id); ?>">

            <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php echo e($categories->name); ?>" name="name" class="form-control" placeholder="Name">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php echo e($categories->slug); ?>" name="slug" class="form-control" placeholder="Slug">
                </div>
              </div>
            </div>


            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Thumbnail (Optional)</label>
                <div class="col-sm-10">
                  <div class="btn btn-info box-file">
                    <input type="file" accept="image/*" name="thumbnail" />
                    <i class="glyphicon glyphicon-cloud-upload myicon-right"></i>Replace Image
                  </div>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="<?php echo e(url('panel/admin/categories')); ?>" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success pull-right">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>