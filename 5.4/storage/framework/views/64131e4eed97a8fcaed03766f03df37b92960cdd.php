<!--Extend Admin-->


<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

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
                  <select name="startup_id" id="startup_id" class="form-control" required>
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
                  <select name="investor_id" id="investor_id" class="form-control" required>
                    <option value="<?php echo e(Auth::user()->id); ?>" selected>Offline Investor</option>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Anonymous?</label>
                <div class="col-sm-10" style="padding-top:6px">
                  <input checked="checked" name="anonymous" id="anonymous" type="checkbox" value="1">
                </div>
              </div>
            </div>
            
            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Postal Code</label>
                <div class="col-sm-10">
                  <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal Code" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <select name="country" class="form-control" required>
                    <option value="">Select One</option>
                    <?php $__currentLoopData = App\Models\Countries::orderBy('country_name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option <?php if( Auth::check() && Auth::user()->countries_id == $country->id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($country->country_name); ?>"><?php echo e($country->country_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>            

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Investment</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>
                    <input type="number" min="1" autocomplete="off" name="amount" id="amount" class="form-control onlyNumber" placeholder="Amount" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10">
                  <input type="text" name="comment" class="form-control" placeholder="Add a brief comment (Optional)">
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

<?php $__env->startSection('javascript'); ?>
<!-- icheck -->
<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
  //Flat red color scheme for iCheck
  $(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red'
  });
});

function checkInvestor() {
    if ( investor_id.value == '<?php echo e(Auth::user()->id); ?>')
    {
      $("#name").prop('disabled', false);
      $("#name").val("") ;
      $("#email").prop('disabled', false);
      $("#email").val("");
      $('#anonymous').iCheck('check');
      $('#anonymous').iCheck('disable');
    }
    else
    {
      $("#name").prop('disabled', true);
      $("#name").val("<?php echo e($user->name); ?>");
      $("#email").prop('disabled', true);
      $("#email").val("<?php echo e($user->email); ?>");
      $('#anonymous').iCheck('uncheck');
      $('#anonymous').iCheck('enable');
    };
}

$(function(){
  checkInvestor(); //this calls it on load
  $("select#investor_id").change(checkInvestor);
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>