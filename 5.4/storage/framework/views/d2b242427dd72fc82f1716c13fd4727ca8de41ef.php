 
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Posts
      <i class="fa fa-angle-right margin-separator"></i><?php echo e($data->title); ?>

      <i class="fa fa-angle-right margin-separator"></i>Edit
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">

        <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
          </div>

          <!-- Form start -->
          <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/pages/'.$data->id)); ?>">

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="_method" value="PUT">

            <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php echo e($data->title); ?>" name="title" class="form-control" placeholder="Title">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php echo e($data->slug); ?>" name="slug" class="form-control" placeholder="Slug">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                  <textarea name="content"rows="5" cols="40" id="content" class="form-control" placeholder="Content"><?php echo e($data->content); ?></textarea>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="<?php echo e(url('panel/admin/pages')); ?>" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success pull-right">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('public/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('content');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>