 
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Payments
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

     <div class="box Startups">
      <div class="box-header with-border">
        <h3 class="box-title">Payment Settings</h3>
      </div>

      <!-- form start -->
      <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/payments')); ?>" enctype="multipart/form-data">

       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">	

       <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


       <!-- Start Box Body -->
       <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Currency</label>
          <div class="col-sm-10">
           <select name="currency_code" id="currency_code" class="form-control" required>
            <option <?php if( $settings->currency_code == 'USD' ): ?> selected="selected" <?php endif; ?> value="USD">USD</option>
            <option <?php if( $settings->currency_code == 'EUR' ): ?> selected="selected" <?php endif; ?>  value="EUR">EUR</option>
            <option <?php if( $settings->currency_code == 'GBP' ): ?> selected="selected" <?php endif; ?> value="GBP">GBP</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Start Box Body -->
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Investment Fee</label>
        <div class="col-sm-10">
         <select name="fee_investment" id="fee_investment" class="form-control" required>
          <option <?php if( $settings->fee_investment == '1' ): ?> selected="selected" <?php endif; ?> value="1">1%</option>
          <option <?php if( $settings->fee_investment == '2' ): ?> selected="selected" <?php endif; ?> value="2">2%</option>
          <option <?php if( $settings->fee_investment == '3' ): ?> selected="selected" <?php endif; ?>  value="3">3%</option>
          <option <?php if( $settings->fee_investment == '4' ): ?> selected="selected" <?php endif; ?> value="4">4%</option>
          <option <?php if( $settings->fee_investment == '5' ): ?> selected="selected" <?php endif; ?> value="5">5%</option>

          <option <?php if( $settings->fee_investment == '6' ): ?> selected="selected" <?php endif; ?> value="6">6%</option>
          <option <?php if( $settings->fee_investment == '7' ): ?> selected="selected" <?php endif; ?> value="7">7%</option>
          <option <?php if( $settings->fee_investment == '8' ): ?> selected="selected" <?php endif; ?> value="8">8%</option>
          <option <?php if( $settings->fee_investment == '9' ): ?> selected="selected" <?php endif; ?> value="9">9%</option>

          <option <?php if( $settings->fee_investment == '10' ): ?> selected="selected" <?php endif; ?> value="10">10%</option>
          <option <?php if( $settings->fee_investment == '15' ): ?> selected="selected" <?php endif; ?> value="15">15%</option>
        </select>
      </div>
    </div>
  </div>

  <div class="box Startups">
    <div class="box-header">
      <h3 class="box-title">Stripe</h3>
    </div>

    <!-- Start Box Body -->
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Stripe Secret Key</label>
        <div class="col-sm-10">
          <input type="text" value="<?php echo e($settings->stripe_secret_key); ?>" id="stripe_secret_key" name="stripe_secret_key" class="form-control" required>
          <p class="help-block"><a href="https://stripe.com/dashboard" target="_blank">https://stripe.com/dashboard</a></p>
        </div>
      </div>
    </div>

    <!-- Start Box Body -->
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Stripe Publishable Key</label>
        <div class="col-sm-10">
          <input type="text" value="<?php echo e($settings->stripe_public_key); ?>" id="stripe_public_key" name="stripe_public_key" class="form-control" required>
          <p class="help-block"><a href="https://stripe.com/dashboard" target="_blank">https://stripe.com/dashboard</a></p>
        </div>
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </form>
</div>

</div>

</div>



</section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>