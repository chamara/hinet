<div class="col-md-4">
	<div class="media margin-20">
		<div class="media-left">
			<img class="media-object img-circle holderImage" data-src="holder.js/40x40?bg=fbb858&fg=FFFFFF&text=<?php echo e(strtoupper($letter)); ?>" width="40" height="40" alt="<?php echo e($letter); ?>">
		</div>
		<div class="media-body">
			<h4 class="media-heading"><?php echo e($investment->fullname); ?></h4>
			<span class="btn-block recent-investment-amount font-default">
				<?php echo e($settings->currency_symbol.number_format($investment->investment)); ?>

			</span>
		</div>
	</div>
</div>