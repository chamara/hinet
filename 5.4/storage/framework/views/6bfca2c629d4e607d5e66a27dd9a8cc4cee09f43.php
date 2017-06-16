 
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Startups
      <i class="fa fa-angle-right margin-separator"></i>Startup Profiles
      <i class="fa fa-angle-right margin-separator"></i><?php echo e($data->title); ?>

      <i class="fa fa-angle-right margin-separator"></i>Edit
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
                  <label class="col-sm-2 control-label">Member Name</label>
                  <div class="col-sm-10">
                    <select name="member_name" id="member_name" class="form-control" disabled required>
                      <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php if( $user->id == $data->user_id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->title); ?>" name="title" id="title" class="form-control" placeholder="Name" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tagline</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->oneliner); ?>" name="tagline" id="tagline" class="form-control" placeholder="Tagline" required>
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
                  <label class="col-sm-2 control-label">Startup Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="5" id="description" class="form-control  tinymce-txt" placeholder="Description"><?php echo e($data->description); ?></textarea>
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
                  <label class="col-sm-2 control-label">Website</label>
                  <div class="col-sm-10">
                    <input type="url" value="<?php echo e($data->website); ?>" name="website" id="website" class="form-control" placeholder="https://www.website-name.com">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="url" value="<?php echo e($data->facebook); ?>" name="facebook" id="facebook" class="form-control" placeholder="https://www.facebook.com/account-name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-10">
                    <input type="url" value="<?php echo e($data->twitter); ?>" name="twitter" id="twitter" class="form-control" placeholder="https://www.twitter.com/account-name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">LinkedIn</label>
                  <div class="col-sm-10">
                    <input type="url" value="<?php echo e($data->linkedin); ?>" name="linkedin" id="linkedin" class="form-control" placeholder="https://www.linkedin.com/account-name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Video</label>
                  <div class="col-sm-10">
                    <input type="url" value="<?php echo e($data->video); ?>" name="video" id="video" class="form-control" placeholder="https://www.youtube.com/video-name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select name="category" id="category" class="form-control">
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
                    <div class="input-group">
                      <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>                  
                      <input type="number" min="1" autocomplete="off" value="<?php echo e($data->goal); ?>" name="goal" id="goal" class="form-control onlyNumber" placeholder="1000000">
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
                    <input type="number" value="<?php echo e($data->equity); ?>" name="equity" id="equity" class="form-control" placeholder="Equity">
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
                      <input type="number" value="<?php echo e($data->valuation); ?>" name="valuation" id="valuation" class="form-control" placeholder="Valuation">
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
                      <?php $__currentLoopData = App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxreliefstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if( $taxreliefstatus->status == $data->tax ): ?> selected="selected" <?php endif; ?> value="<?php echo e($taxreliefstatus->status); ?>"><?php echo e($taxreliefstatus->status); ?></option>
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
                      <option <?php if( $status->status == $data->status ): ?> selected="selected" <?php endif; ?> value="<?php echo e($status->status); ?>"><?php echo e(ucfirst(trans($status->status))); ?></option>
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

              <?php $__currentLoopData = App\Models\Questions::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="TextBoxDiv<?php echo e($loop->iteration); ?>">
                  <label class="col-sm-2 control-label">Question <?php echo e($loop->iteration); ?></label>
                  <div class="col-sm-10">
                    <div style="padding-bottom:2px"><input type="text" id="question_<?php echo e($loop->iteration); ?>" name="question_<?php echo e($loop->iteration); ?>" value="<?php echo e($question->question); ?>" placeholder="Question <?php echo e($loop->iteration); ?>" class="form-control" readOnly></div>
                    <div style="padding-bottom:10px"><textarea data-limit="300" rows="5" name="response_<?php echo e($loop->iteration); ?>" id="response_<?php echo e($loop->iteration); ?>" placeholder="Response <?php echo e($loop->iteration); ?>" class="form-control"><?php echo e($data->{'response_'.$loop->iteration}); ?></textarea></div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <div class="box-footer">
                <a href="<?php echo e(url('panel/admin/startups')); ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>

            </form>

          </div>

        </div>

          <!-- *********** LOGO ************* -->
          <form action="<?php echo e(url('upload/logo')); ?>" method="POST" id="formLogo" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="text-center">
              <button type="button" id="logo_file">
                <img src="<?php echo e(asset('public/startups/logo').'/'.$data->logo); ?>" class="logoUser" width="150" height="150"/>
              </button>
              <input type="file" name="photo" id="uploadLogo" accept="image/*" style="visibility: hidden;">
            </div>
          </form><!-- *********** LOGO ************* -->
          <p></p>
          <!-- *********** cover ************* -->
          <form action="<?php echo e(url('upload/cover')); ?>" method="POST" id="formCover" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
            <div class="text-center">
              <button type="button" id="cover_file">
               <img src="<?php echo e(asset('public/startups/cover').'/'.$data->cover); ?>" class="coverUser" height="150px" width="auto"/>
             </button>
             <input type="file" name="photo" id="uploadCover" accept="image/*" style="visibility: hidden;">
           </div>
         </form><!-- *********** Cover ************* -->
        
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- Include Javascript -->
<?php echo $__env->make('includes.javascript-admin-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD COVER  * ===============>>>>>>>//
$(document).on('change', '#uploadCover', function(){

  $('.wrap-loader').show();

  (function(){
    $("#formCover").ajaxForm({
      dataType : 'json', 
      success:  function(e){
        if( e ){
          if( e.success == false ){
            $('.wrap-loader').hide();

            var error = '';
            for($key in e.errors){
              error += '' + e.errors[$key] + '';
            }
            swal({   
              title: "Error",   
              text: ""+ error +"",   
              type: "error",   
              confirmButtonText: "Ok" 
            });

            $('#uploadCover').val('');

          } else {

            $('#uploadCover').val('');
            $('.coverUser').attr('src',e.cover);
            $('.wrap-loader').hide();
          }

}//<-- e
else {
  $('.wrap-loader').hide();
  swal({   
    title: "Error",   
    text: 'Error',   
    type: "error",   
    confirmButtonText: "Ok" 
  });

  $('#uploadCover').val('');
}
}//<----- SUCCESS
}).submit();
})(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD COVER  * ===============>>>>>>>//
</script>

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD LOGO  * ===============>>>>>>>//
$(document).on('change', '#uploadLogo', function(){

  $('.wrap-loader').show();

  (function(){
    $("#formLogo").ajaxForm({
      dataType : 'json', 
      success:  function(e){
        if( e ){
          if( e.success == false ){
            $('.wrap-loader').hide();

            var error = '';
            for($key in e.errors){
              error += '' + e.errors[$key] + '';
            }
            swal({   
              title: "Error",   
              text: ""+ error +"",   
              type: "error",   
              confirmButtonText: "Ok" 
            });

            $('#uploadLogo').val('');

          } else {

            $('#uploadLogo').val('');
            $('.logoUser').attr('src',e.logo);
            $('.wrap-loader').hide();
          }

}//<-- e
else {
  $('.wrap-loader').hide();
  swal({   
    title: "Error",   
    text: 'Error',   
    type: "error",   
    confirmButtonText: "Ok" 
  });

  $('#uploadLogo').val('');
}
}//<----- SUCCESS
}).submit();
})(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD LOGO  * ===============>>>>>>>//
</script>

<!-- Limit Textarea Function -->
<script type="text/javascript">
  $(document).ready(function () {
    $('textarea').on("propertychange keyup input paste",

      function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
          $(this).val($(this).val().substring(0, limit));
        }
        $(this).next('span').text(remainingChars<=0?0:remainingChars);
      });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>