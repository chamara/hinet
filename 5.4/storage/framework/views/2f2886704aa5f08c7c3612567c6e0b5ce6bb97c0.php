<?php 
$settings = App\Models\AdminSettings::first();

// Set percentage of target investment
if ($response->goal <> 0 ){
	$percentage = round($response->investments()->sum('investment') / $response->goal * 100);
} else {
	$percentage = '0';
} 

// Dcouments
$documents = $response->documents()->orderBy('id')->paginate(20);

// Team
$teams = $response->teams()->orderBy('id')->paginate(20);

// All investments
$investments = $response->investments()->orderBy('id','desc')->paginate(10);

// Slashes and spaces in URL
if( str_slug( $response->title ) == '' ) {
	$slug_url  = '';
} else {
	$slug_url  = '/'.str_slug( $response->title );
}
?>

<!-- Extend App Layout -->


<!-- Page Title -->
<?php $__env->startSection('title'); ?><?php echo e($response->title.' - '); ?><?php $__env->stopSection(); ?>

<!-- Page Specific Meta Data and CSS for SEO -->
<?php $__env->startSection('css'); ?>
<link rel="canonical" href="<?php echo e(url("startup/$response->id").'/'.str_slug($response->title)); ?>"/>
<!-- Open Graph Data -->
<meta property="og:site_name" content="<?php echo e($settings->title); ?>"/>
<meta property="og:url" content="<?php echo e(url("startup/$response->id").'/'.str_slug($response->title)); ?>"/>
<meta property="og:image" content="<?php echo e(url('public/startups/cover',$response->cover)); ?>"/>
<meta property="og:title" content="<?php echo e($response->title); ?>"/>
<meta property="og:description" content="<?php echo e(str_limit($response->description, 200, '...')); ?>"/>
<!-- Twitter Data -->
<meta name="twitter:image" content="<?php echo e(url('public/startups/cover',$response->cover)); ?>" />
<meta name="twitter:title" content="<?php echo e($response->title); ?>" />
<meta name="twitter:description" content="<?php echo e(str_limit($response->description, 200, '...')); ?>"/>
<?php $__env->stopSection(); ?>

<!-- Content -->
<?php $__env->startSection('content'); ?>
<?php if( Auth::check() && Auth::user()->id != $response->user()->id && Auth::user()->role == 'startup'): ?> 
<p> Blocked</p>
<?php else: ?>
<!-- Cover Photo -->
<!-- <div class="coverStartup" style="background-image: url('<?php echo e(asset('public/startups/cover').'/'.$response->cover); ?>');"></div> -->

<div class="banner-divider banner-blue">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40"><?php echo e($response->title); ?> - Startup Funding Club</h1>
	</div>
</div>


<!-- Container -->
<div class="container margin-bottom-40 padding-top-40">
	<div class="startup-sidebar">
		<div class="row">
			<div class="col-md-3">
				<div class="media-center margin-bottom-5">
					<img class="img-inline center-block" src="<?php echo e(url('public/startups/logo',$response->logo)); ?>" width="120" height="120" >
					<ul class="list-inline margin-top-20">
						<?php if( $response->twitter != '' ): ?> 
						<li><a target="_blank" href="<?php echo e($response->twitter); ?>" class="ico-social"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>

						<?php if( $response->facebook != '' ): ?>   
						<li><a target="_blank" href="<?php echo e($response->facebook); ?>" class="ico-social"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>

						<?php if( $response->linkedin != '' ): ?>   
						<li><a target="_blank" href="<?php echo e($response->linkedin); ?>" class="ico-social"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>
					</ul >
				</div>
			</div>
			<div class="col-md-4 border-right">
				<p class=""><?php echo e($response->oneliner); ?></p>
				<p class="margin-top-20"><?php echo e($response->location); ?></p>
				<p class="website margin-top-20"><a href="<?php echo e($response->website); ?>" target="_blank"><?php echo e($response->website); ?></a></p>
			</div>

			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						<p>INVESTMENT SOUGHT:</p>
						<h3><strong><?php echo e($settings->currency_symbol.number_format($response->goal)); ?></strong></h3>
					</div>
					<div class="col-md-6">
						<p>EQUITY OFFERED:</p>
						<h3><strong><?php echo e($response->equity); ?>%</strong></h3>
					</div>
				</div>

				<span class="progress-view margin-top-10 margin-bottom-10">
					<span class="percentage-view" style="width: <?php echo e($percentage); ?>%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
				</span>
				<small class="btn-block margin-bottom-10 text-muted">
					<?php echo e($percentage); ?>% Raised by <?php echo e(number_format($response->investments()->count())); ?> Investments
				</small>

				<!-- Invest Button -->

				<a href="<?php echo e(url('invest/'.$response->id.$slug_url)); ?>" class="btn btn-main custom-rounded">Invest</a>
				
				<!-- Invest Button -->
				
				<a href="<?php echo e(url('invest/'.$response->id.$slug_url)); ?>" class="btn btn-save custom-rounded">Request a meeting</a>

			</div>
		</div>
	</div>


	
	<div class="startup-sidebar margin-top-40">
		<div class="row">
			<div class="col-md-3">
				<ul class="startup-navigation margin-bottom-40">
					<li class="active"><a href="#application" role="tab" data-toggle="tab">Application</a></li>
					<?php if( $response->video != '' ): ?>
					<li><a href="#video" role="tab" data-toggle="tab">Video</a></li>
					<?php endif; ?>
					<li><a href="#documents" role="tab" data-toggle="tab">Documents</a></li>
					<li><a href="#team" role="tab" data-toggle="tab">Team</a></li>
					<li><a href="#investors" role="tab" data-toggle="tab">Investors</a></li>
				</ul>
			</div>


			<div class="col-md-9 border-left">
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane fade in active"id="application">
						<?php echo $__env->make('includes.startup-application', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>

					<?php if( $response->video != '' ): ?>	
					<div role="tabpanel" class="tab-pane fade in"id="video">
						<iframe width="100%" height="400" src="<?php echo e($response->video); ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<?php endif; ?>

					<?php if( $documents->total() !=  0): ?>
					<div role="tabpanel" class="tab-pane fade in"id="documents">
						<?php echo $__env->make('includes.startup-documents', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					<?php endif; ?>

					<div role="tabpanel" class="tab-pane fade in"id="team">
						<?php echo $__env->make('includes.startup-team', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>

					<div role="tabpanel" class="tab-pane fade in"id="investors">
						<?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php 
						$letter = str_slug(mb_substr( $investment->fullname, 0, 1,'UTF8')); 
						if( $letter == '' ) {
							$letter = 'N/A';
						} 
						if( $investment->anonymous == 1 ) {
							$letter = 'N/A';
							$investment->fullname = 'Anonymous';
						}
						?>
						<?php echo $__env->make('includes.listing-investments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php  session()->forget('investment_cancel')  ?>
<?php  session()->forget('investment_success')  ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>