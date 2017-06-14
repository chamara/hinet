 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
       Admin<i class="fa fa-angle-right margin-separator"></i>Startups<i class="fa fa-angle-right margin-separator"></i>Maintain Questions (<?php echo e($data->total()); ?>)
       <?php if( $data->count() < $settings->max_startup_questions ): ?>
         <a href="<?php echo e(url('panel/admin/questions/add')); ?>" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Question
         </a>
       <?php else: ?>
         <a href="#" class="btn btn-sm btn-success disabled no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Question</a>
       <?php endif; ?>
     </h4>    
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
            <h3 class="box-title"> 
              Questions
            </h3>
          </div>        
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                <tr>
                  <th class='active'>ID</th>
                  <th class='active'>Question</th>
                  <th class='active'>Actions</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($question->id); ?></td>
                  <td><?php echo e($question->question); ?></td>
                  <td>
                    <a href="<?php echo e(url('panel/admin/questions/edit/').'/'.$question->id); ?>" class="btn btn-success btn-xs padding-btn">
                      Edit
                    </a> 
                    <a href="javascript:void(0);" data-url="<?php echo e(url('panel/admin/questions/delete/').'/'.$question->id); ?>" class="btn btn-danger btn-xs padding-btn actionDelete">
                      Delete
                    </a>
                  </td>
                </tr><!-- /.TR -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
      text: "Delete Question?",
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