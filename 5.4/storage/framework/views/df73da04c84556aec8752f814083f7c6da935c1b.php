 
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Members
      <i class="fa fa-angle-right margin-separator"></i><?php echo e($data->name); ?>

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
              <h3 class="box-title">Edit Member</h3>
            </div>

            <!-- Form start -->
            <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/members/'.$data->id)); ?>" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="hidden" name="_method" value="PUT">	

              <?php echo $__env->make('errors.errors-forms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->name); ?>" id="name" name="name" class="form-control" placeholder="Name" required>
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo e($data->email); ?>" id="email" name="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select id="role" name="role" class="form-control" required>
                      <option <?php if($data->role == 'investor'): ?> selected="selected" <?php endif; ?> value="investor">Investor</option>
                      <option <?php if($data->role == 'startup'): ?> selected="selected" <?php endif; ?> value="startup">Startup</option>
                      <option <?php if($data->role == 'admin'): ?> selected="selected" <?php endif; ?> value="admin">Admin</option>
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
                      <?php $__currentLoopData = App\Models\Statuses::where(['mode'=>'on', 'table'=>'users'])->orderBy('status')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                      <option <?php if( $status->status == $data->status ): ?> selected="selected" <?php endif; ?> value="<?php echo e($status->status); ?>"><?php echo e(ucfirst(trans($status->status))); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" value="" id="password" name="password" class="form-control" placeholder="Leave Empty For No Change">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" value="" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <span id="result"></span>
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <a href="<?php echo e(url('panel/admin/members')); ?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
            </form>
          </div>              
        </div>

        <div class="col-md-3">

          <form action="<?php echo e(url('upload/avatar')); ?>" method="POST" id="formAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="block-block text-center">
             <button type="button" class="btn btn-default no-padding btn-border btn-sm" id="avatar_file" style="margin-top: 10px;">
               <img src="<?php echo e(asset('public/avatar').'/'.$data->avatar); ?>" alt="User" width="150" height="150" class="avatarUser"  />
             </button>
             <input type="file" name="photo" id="uploadAvatar" accept="image/*" style="visibility: hidden;">
           </div>
          </form>

          <ol class="list-group">
            <li class="list-group-item"> Registered <span class="pull-right color-strong"><?php echo e(date('d M, y', strtotime($data->created_at))); ?></span></li>

            <li class="list-group-item"> Status <span class="pull-right color-strong"><?php echo e(ucfirst($data->status)); ?></span></li>

            <li class="list-group-item"> Country <span class="pull-right color-strong"><?php if( $data->countries_id != '' ): ?> <?php echo e($data->country()->country_name); ?> <?php else: ?> N/A <?php endif; ?></span></li>

            <li class="list-group-item"> Startups <strong class="pull-right color-strong"><?php echo e(App\Helper::formatNumber( $data->startups()->count() )); ?></strong></li>

            <li class="list-group-item"> Investments <strong class="pull-right color-strong"><?php echo e(App\Helper::formatNumber( $data->investments()->count() )); ?></strong></li>
          </ol>

          <div class="block-block text-center" id="delete" data-field-id="User">
            <?php echo Form::open([
            'method' => 'DELETE',
            'route' => ['user.destroy', $data->id],
            'class' => 'displayInline'
            ]); ?>

            <?php echo Form::submit('Delete', ['data-url' => $data->id, 'class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']); ?>

            <?php echo Form::close(); ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- Include Javascript -->
<?php echo $__env->make('includes.javascript-admin-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes.javascript-password-validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">

//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
$(document).on('change', '#uploadAvatar', function(){

  $('.wrap-loader').show();
  
  (function(){
    $("#formAvatar").ajaxForm({
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

          $('#uploadAvatar').val('');

          } else {
              $('#uploadAvatar').val('');
              $('.avatarUser').attr('src',e.avatar);
              $('.wrap-loader').hide();
            }
          } //<-- e
          else {
            $('.wrap-loader').hide();
            swal({   
            title: "Error",   
            text: 'Error',   
            type: "error",   
            confirmButtonText: "Ok" 
            });

            $('#uploadAvatar').val('');
          }
      }//<----- SUCCESS
    }).submit();
  })(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>