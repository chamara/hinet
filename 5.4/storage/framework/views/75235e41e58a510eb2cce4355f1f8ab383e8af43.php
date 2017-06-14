 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Social Profiles
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

  <div class="content">
    <div class="row">
      <div class="col-md-9">
        <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Social</h3>
          </div>

          <!-- form start -->
          <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/social-profiles')); ?>" enctype="multipart/form-data">
           
           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">	
           
           <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           
           <!-- Start Box Body -->
           <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->facebook); ?>" name="facebook" id="facebook" class="form-control" placeholder="http://www.facebook.com">
              </div>
            </div>
          </div>
          
          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->twitter); ?>" name="twitter" id="twitter" class="form-control" placeholder="http://www.twitter.com">
              </div>
            </div>
          </div>
          
          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Google Plus</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->googleplus); ?>" name="googleplus" id="googleplus" class="form-control" placeholder="http://www.google.com">
              </div>
            </div>
          </div>
          
          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->instagram); ?>" name="instagram" id="instagram" class="form-control" placeholder="http://www.instagram.com">
              </div>
            </div>
          </div>

          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Linkedin</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->linkedin); ?>" name="linkedin" id="linkedin" class="form-control" placeholder="http://www.linkedin.com">
              </div>
            </div>
          </div>

          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">AngelList</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo e($settings->angellist); ?>" name="angellist" id="angellist" class="form-control" placeholder="http://www.angel.co">
              </div>
            </div>
          </div>
      
          <div class="box-footer">
            <a href="<?php echo e(url('panel/admin')); ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">Save</button>
          </div>
  </div>
  
</div>

</div>          
        </form>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>