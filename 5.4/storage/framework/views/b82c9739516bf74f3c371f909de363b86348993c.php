 

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>Admin
       <i class="fa fa-angle-right margin-separator"></i>Settings       		
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
              <h3 class="box-title">Settings</h3>
            </div>
      
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/settings')); ?>" enctype="multipart/form-data">
           
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">	
           
                <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Site Name</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo e($settings->title); ?>" name="title" class="form-control" placeholder="Name">
                    </div>
                  </div>
                </div>
          
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Strapline</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo e($settings->welcome_text); ?>" name="welcome_text" class="form-control" placeholder="Strapline">
                    </div>
                  </div>
                </div>
      
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Subtitle</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo e($settings->welcome_subtitle); ?>" name="welcome_subtitle" class="form-control" placeholder="Subtitle">
                    </div>
                  </div>
                </div>
            
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Keywords</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo e($settings->keywords); ?>" id="keywords" name="keywords" class="form-control" placeholder="Keywords">
                    </div>
                  </div>
                </div>
                
                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                     
                     <textarea name="description" rows="4" id="description" class="form-control" placeholder="Description"><?php echo e($settings->description); ?></textarea>
                   </div>
                 </div>
               </div>

               <!-- Start Box Body -->
               <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">No-reply Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($settings->email_no_reply); ?>" name="email_no_reply" class="form-control" placeholder="no-reply@example.com">
                  </div>
                </div>
              </div>
          
              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Auto-Approve Startups</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="auto_approve_startups" <?php if( $settings->auto_approve_startups == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                        Yes
                      </label>
                    </div>
                  
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="auto_approve_startups" <?php if( $settings->auto_approve_startups == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hide Startups Registration Form</label>
                  <div class="col-sm-10">

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="disable_startups_reg" <?php if( $settings->disable_startups_reg == 'yes' ): ?> checked="checked" <?php endif; ?> value="yes" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="disable_startups_reg" <?php if( $settings->disable_startups_reg == 'no' ): ?> checked="checked" <?php endif; ?> value="no">
                        No
                      </label>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hide Investors Registration Form</label>
                  <div class="col-sm-10">

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="disable_investors_reg" <?php if( $settings->disable_investors_reg == 'yes' ): ?> checked="checked" <?php endif; ?> value="yes" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                          <input type="radio" name="disable_investors_reg" <?php if( $settings->disable_investors_reg == 'no' ): ?> checked="checked" <?php endif; ?> value="no">
                          No
                      </label>
                    </div>

                  </div>
                </div>
              </div>              

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Admin Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($settings->email_admin); ?>" name="email_admin" class="form-control" placeholder="admin@example.com">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Captcha</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="captcha" <?php if( $settings->captcha == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                        Yes
                      </label>
                    </div>
                
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="captcha" <?php if( $settings->captcha == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email Verification?</label>
                  <div class="col-sm-10">
                   
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="email_verification" <?php if( $settings->email_verification == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                        Yes
                      </label>
                    </div>
                    
                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="email_verification" <?php if( $settings->email_verification == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                        No
                      </label>
                    </div>  
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Paginate</label>
                  <div class="col-sm-10">
                    <select name="result_request" class="form-control">
                      <option <?php if( $settings->result_request == 4 ): ?> selected="selected" <?php endif; ?> value="4">4</option>
                      <option <?php if( $settings->result_request == 8 ): ?> selected="selected" <?php endif; ?> value="8">8</option>
                      <option <?php if( $settings->result_request == 12 ): ?> selected="selected" <?php endif; ?> value="12">12</option>
                      <option <?php if( $settings->result_request == 24 ): ?> selected="selected" <?php endif; ?> value="24">24</option>
                      <option <?php if( $settings->result_request == 36 ): ?> selected="selected" <?php endif; ?> value="36">36</option>
                      <option <?php if( $settings->result_request == 48 ): ?> selected="selected" <?php endif; ?> value="48">48</option>
                      <option <?php if( $settings->result_request == 60 ): ?> selected="selected" <?php endif; ?> value="60">60</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Max File Size</label>
                  <div class="col-sm-10">
                    <select name="file_size_allowed" class="form-control">
                      <option <?php if( $settings->file_size_allowed == 1024 ): ?> selected="selected" <?php endif; ?> value="1024">1 MB</option>
                      <option <?php if( $settings->file_size_allowed == 2048 ): ?> selected="selected" <?php endif; ?> value="2048">2 MB</option>
                      <option <?php if( $settings->file_size_allowed == 3072 ): ?> selected="selected" <?php endif; ?> value="3072">3 MB</option>
                      <option <?php if( $settings->file_size_allowed == 4096 ): ?> selected="selected" <?php endif; ?> value="4096">4 MB</option>
                      <option <?php if( $settings->file_size_allowed == 5120 ): ?> selected="selected" <?php endif; ?> value="5120">5 MB</option>
                      <option <?php if( $settings->file_size_allowed == 10240 ): ?> selected="selected" <?php endif; ?> value="10240">10 MB</option>
                    </select>
                    <span class="help-block ">Upload max filesize - <strong><?php echo str_replace('M', 'MB', ini_get('upload_max_filesize')) ?></strong></span>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Min Investment Target</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->min_startup_amount); ?>" name="min_startup_amount" class="form-control onlyNumber" placeholder="1000000">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Max Investmemt Target</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->max_startup_amount); ?>" name="max_startup_amount" class="form-control onlyNumber" placeholder="10000000000">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Min Investment Amount</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->min_investment_amount); ?>" name="min_investment_amount" class="form-control onlyNumber" placeholder="5000">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Max Investment Amount</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->max_investment_amount); ?>" name="max_investment_amount" class="form-control onlyNumber" placeholder="1000000">
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

  <!-- icheck -->
  <script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.js')); ?>" type="text/javascript"></script>

  <script type="text/javascript">
  	//Flat red color scheme for iCheck
    $('input[type="radio"]').iCheck({
      radioClass: 'iradio_flat-red'
    });
    
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