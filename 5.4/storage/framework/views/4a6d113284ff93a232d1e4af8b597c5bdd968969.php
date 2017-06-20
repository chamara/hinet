<?php $settings = App\Models\AdminSettings::first(); ?>



<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h4>Admin
        <i class="fa fa-angle-right margin-separator"></i>Startups
        <i class="fa fa-angle-right margin-separator"></i>Add New Startup
      </h4>
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box startups">
            <div class="box-header with-border">
              <h3 class="box-title">Add Startup - Funding Details for: <?php echo e($data->title); ?></h3>
            </div>

            <!--Form Start-->
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
              <!--CSRF Token-->        
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

              <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

              <!--Include Form Errors-->
              <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment Sought</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                    <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>
                    <input type="number" min="1" autocomplete="off" name="goal" id="goal" class="form-control onlyNumber" placeholder="1000000">
                  </div>
                </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Equity</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                    <div class="input-group-addon">%</div>
                    <input type="number" name="equity" id="equity" class="form-control" placeholder="Equity">
                  </div>
                </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pre-Money Valuation</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>
                      <input type="number" name="valuation" id="valuation" class="form-control" placeholder="Valuation">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Form Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tax Relief</label>
                  <div class="col-sm-10">
                    <select name="tax" id="tax" class="form-control" required>
                      <option value="">Select One</option>
                      <?php $__currentLoopData = App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxreliefstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($taxreliefstatus->status); ?>"><?php echo e($taxreliefstatus->status); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status_id" class="form-control" required>
                      <?php $__currentLoopData = App\Models\Statuses::where(['mode'=>'on', 'table'=>'startups'])->orderBy('status')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                      <option value="<?php echo e($status->status); ?>"><?php echo e(ucfirst(trans($status->status))); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Featured?</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" <?php if( $settings->featured == '1' ): ?> checked="checked" <?php endif; ?> value="1">
                        Yes
                      </label>
                    </div>
                  
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" <?php if( $settings->featured == '0' ): ?> checked="checked" <?php endif; ?> value="0" checked>
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Opportunity?</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" <?php if( $settings->opportunity == '1' ): ?> checked="checked" <?php endif; ?> value="1">
                        Yes
                      </label>
                    </div>
                  
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" <?php if( $settings->opportunity == '0' ): ?> checked="checked" <?php endif; ?> value="0" checked>
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Portfolio?</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" <?php if( $settings->portfolio == '1' ): ?> checked="checked" <?php endif; ?> value="1">
                        Yes
                      </label>
                    </div>
                  
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" <?php if( $settings->portfolio == '0' ): ?> checked="checked" <?php endif; ?> value="0" checked>
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <div class="input_fields_wrap" id="TextBoxesGroup">

                      <?php $__currentLoopData = App\Models\Questions::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="TextBoxDiv<?php echo e($loop->iteration); ?>">
                          <label class="col-sm-2 control-label">Question <?php echo e($loop->iteration); ?></label>
                          <div class="col-sm-10">
                            <div style="padding-bottom:2px"><input type="text" id="question_<?php echo e($loop->iteration); ?>" name="question_<?php echo e($loop->iteration); ?>" value="<?php echo e($question->question); ?>" placeholder="Question <?php echo e($loop->iteration); ?>" class="form-control" readOnly></div>
                            <div style="padding-bottom:10px"><textarea data-limit="300" rows="5" name="response_<?php echo e($loop->iteration); ?>" id="response_<?php echo e($loop->iteration); ?>" placeholder="Response <?php echo e($loop->iteration); ?>" class="form-control"></textarea></div>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                  </div>
                </div>

              <div class="box-footer">
                <a href="<?php echo e(url('panel/admin/startups')); ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Next</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

  <!-- Include Javascript -->
  <?php echo $__env->make('includes.javascript_image_upload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- icheck -->
  <script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('public/js/style-admin-elements.js')); ?>"></script>

  <script type="text/javascript">
    $("#tagInput").tagsInput({
     'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
     'width':'auto',
     'height':'auto',
     'removeWithBackspace' : true,
     'minChars' : 3,
     'maxChars' : 25,
     'defaultText':'Add',
     /*onChange: function() {
        var input = $(this).siblings('.tagsinput');
        var maxLen = 4;
      
        if( input.children('span.tag').length >= maxLen){
          input.children('div').hide();
        }
        else{
          input.children('div').show();
        }
      },*/
    });
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>