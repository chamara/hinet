 
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Edit
      <i class="fa fa-angle-right margin-separator"></i><?php echo e($data->title); ?>

    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-9">

          <div class="box Startups">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Startup</h3>
            </div>

            <!-- Form start -->
            <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/startups/edit/'.$data->id)); ?>" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

              <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->title); ?>" name="title" id="title" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Logo</label>
                  <div class="col-sm-10">
                    <input type="file" name="logo" id="logo" class="form-control input-lg" placeholder="Logo" >
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Cover</label>
                  <div class="col-sm-10">
                    <input type="file" name="cover" id="cover" class="form-control input-lg" placeholder="Cover Page" >
                  </div>
                </div>
              </div>              

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select name="category" name="category" id="category" class="form-control">
                      <option value="">Select One</option>
                      <?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 	
                      <option <?php if( $category->id == $data->categories_id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment Sought</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="<?php echo e($data->goal); ?>" name="goal" id="goal" class="form-control onlyNumber" placeholder="1000000">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->location); ?>" name="location" id="location" class="form-control" placeholder="Location">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="5" id="description" class="form-control  tinymce-txt" placeholder="Description"><?php echo e($data->description); ?></textarea>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" id="status" class="form-control" >
                      <option <?php if($data->finalized == '0' && $data->status == 'pending'): ?> selected="selected" <?php endif; ?> value="pending">Pending</option>
                      <option <?php if($data->finalized == '0'  && $data->status == 'active'): ?> selected="selected" <?php endif; ?> value="active">Active</option>
                      <option <?php if($data->finalized == '1'  && $data->status == 'active'): ?> selected="selected" <?php endif; ?> value="finalized">Finialized</option>
                    </select>
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
                        <input type="radio" name="opportunity" id="opportunity" <?php if( $data->opportunity == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" id="opportunity" <?php if( $data->opportunity == '0' ): ?> checked="checked" <?php endif; ?> value="0">
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
                        <input type="radio" name="portfolio" id="portfolio" <?php if( $data->portfolio == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" id="portfolio" <?php if( $data->portfolio == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                        No
                      </label>
                    </div>
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
                        <input type="radio" name="featured" id="featured"  <?php if( $data->featured == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" id="featured" <?php if( $data->featured == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                        No
                      </label>
                    </div>

                  </div>
                </div>
              </div>

              <div class="box-footer">
                <a href="<?php echo e(url('panel/admin/startups')); ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
            </form>
          </div>

        </div>
        <div class="col-md-3">

          <div class="block-block text-center">
            <img src="<?php echo e(asset('public/startups/logo').'/'.$data->logo); ?>" class="thumbnail img-responsive">
          </div>

          <div class="block-block text-center">
            <?php echo Form::open([
            'method' => 'POST',
            'url' => 'panel/admin/startup/delete',
            'class' => 'displayInline'
            ]); ?>

            <?php echo Form::hidden('id',$data->id );; ?>

            <?php echo Form::submit('Delete', ['class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']); ?>

            <?php echo Form::close(); ?>

          </div>
        </div>	        		
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<!-- icheck -->
<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/tinymce/tinymce.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".onlyNumber").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
      // Allow: Ctrl+A, Command+A
      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
      // Allow: home, end, left, right, down, up
      (e.keyCode >= 35 && e.keyCode <= 40)) {
      // let it happen, don't do anything
      return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
  });

  $(".actionDelete").click(function(e) {
    e.preventDefault();

    var element = $(this);
    var id     = element.attr('data-url');
    var form    = $(element).parents('form');

    element.blur();

    swal(
      { title: "Confirm",  
      text: "Delete Startup",
      type: "warning", 
      showLoaderOnConfirm: true,
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",  
      confirmButtonText: "Confirm",   
      cancelButtonText: "Cancel",  
      closeOnConfirm: false, 
    },

    function(isConfirm){  
      if (isConfirm) {   
        form.submit(); 
        //$('#form' + id).submit();
      }
    });
  });
</script>

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