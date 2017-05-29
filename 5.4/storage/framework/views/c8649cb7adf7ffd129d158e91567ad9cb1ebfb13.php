 

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>Admin
			<i class="fa fa-angle-right margin-separator"></i>Investment #<?php echo e($data->id); ?>

		</h4>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<div class="box-body">
						<dl class="dl-horizontal">

							<!-- start -->
							<dt>ID</dt>
							<dd><?php echo e($data->id); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Full Name</dt>
							<dd><?php echo e($data->fullname); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Startup</dt>
							<dd><a href="<?php echo e(url('startup',$data->startups()->id)); ?>" target="_blank"><?php echo e($data->startups()->title); ?> <i class="fa fa-external-link-square"></i></a></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Email</dt>
							<dd><?php echo e($data->email); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Investment</dt>
							<dd><strong class="text-success"><?php echo e($settings->currency_symbol.number_format($data->investment)); ?></strong></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Country</dt>
							<dd><?php echo e($data->country); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Postal Code</dt>
							<dd><?php echo e($data->postal_code); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Payment Gateway</dt>
							<dd><?php echo e($data->payment_gateway); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Comment</dt>
							<dd>
								<?php if( $data->comment != '' ): ?>
								<?php echo e($data->comment); ?>

								<?php else: ?>
								-------------------------------------
								<?php endif; ?>
							</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Date</dt>
							<dd><?php echo e(date('d M, y', strtotime($data->created_at))); ?></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Anonymous</dt>
							<dd>
								<?php if( $data->anonymous == '1' ): ?>
								Yes
								<?php else: ?>
								No
								<?php endif; ?>
							</dd>
							<!-- ./end -->

						</dl>
					</div><!-- box body -->

					<div class="box-footer">
						<a href="<?php echo e(url('panel/admin/investments')); ?>" class="btn btn-default">Back</a>
					</div>

				</div><!-- box -->
			</div><!-- col -->
		</div><!-- row -->

		

	</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>