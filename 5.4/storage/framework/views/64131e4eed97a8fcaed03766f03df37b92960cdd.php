  <!--Extend Admin-->
  

  <!--Content Section--> 
  <?php $__env->startSection('content'); ?>

  <!--Wrapper-->
  <div class="content-wrapper">

    <!--Header-->
    <section class="content-header">
      <h4>Admin
        <i class="fa fa-angle-right margin-separator"></i>Investments
        <i class="fa fa-angle-right margin-separator"></i>Add New
      </h4>
    </section>

    <!--Main content-->
    <section class="content">
      <div class="content">
        <div class="row">

          <!--Admin box-->
          <div class="box startups">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Investment</h3>
            </div>

            <!--Form Start-->
            <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/investment/add')); ?>" enctype="multipart/form-data">  	
              <!--CSRF Token-->        
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">	

              <!--Include Form Errors-->
              <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup</label>
                  <div class="col-sm-10">
                    <select name="startup_id" class="form-control">
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $startup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($startup->id); ?>"><?php echo e($startup->title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investor</label>
                  <div class="col-sm-10">
                    <select name="startup_id" class="form-control">
                      <!--commented out 29 May 2017 as it returns an error page if another investor is selected. Is this ok?-->
                      <!--<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                      <option value="1">Offline Investor</option>
                    </select>
                  </div>
                </div>
              </div>

              
              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" name="amount" class="form-control onlyNumber" placeholder="Amount">
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <a href="<?php echo e(url('panel/admin/investments')); ?>" class="btn btn-default">Cancel</a>
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