 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin<i class="fa fa-angle-right margin-separator"></i>Categories</h4>  
  </section>

  <!-- Main content -->
  <section class="content">

    <?php if(Session::has('success_message')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <?php echo e(Session::get('success_message')); ?>	        
    </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Categories</h3>
            <div class="box-tools">
              <a href="<?php echo e(url('panel/admin/categories/add')); ?>" class="btn btn-sm btn-success no-shadow pull-right">
                <i class="glyphicon glyphicon-plus myicon-right"></i>Add New
              </a>
            </div>
          </div>



          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                <?php if( $totalCategories !=  0 ): ?>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Actions</th>
                  <th>Status</th>
                </tr>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($category->id); ?></td>
                  <td><?php echo e($category->name); ?></td>
                  <td>
                    <a href="<?php echo e(url('panel/admin/categories/edit/').'/'.$category->id); ?>" class="btn btn-success btn-xs padding-btn">
                      Edit
                    </a> 

                    <a href="javascript:void(0);" data-url="<?php echo e(url('panel/admin/categories/delete/').'/'.$category->id); ?>" class="btn btn-danger btn-xs padding-btn actionDelete">
                      Delete
                    </a>

                  </td>
                  <?php if( $category->mode == 'on' ) {
                    $mode = 'success';
                  } else {
                    $mode = 'danger';
                  } ?>
                  <td><span class="label label-<?php echo e($mode); ?>"><?php echo e(ucfirst($category->mode)); ?></span></td>
                </tr><!-- /.TR -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                <hr />
                <h3 class="text-center no-found">No Results Founds</h3>
                <?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>        	
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

  $(".actionDelete").click(function(e) {
    e.preventDefault();

    var element = $(this);
    var url     = element.attr('data-url');

    element.blur();

    swal(
      {   title: "Delete",  
      text: "Delete Category",  
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
        window.location.href = url;
      }
    });


  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>