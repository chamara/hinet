<?php if( $response->problem != '' ): ?>
<h4 class="profile-title">Describe the problem you are solving?</h4>
<p class="margin-bottom-40"><?php echo e($response->problem); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->solution != '' ): ?>
<h4 class="profile-title">How does your product/service solve this problem?</h4>
<p class="margin-bottom-40"><?php echo e($response->solution); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->market != '' ): ?>
<h4 class="profile-title">Who is your target market?</h4>
<p class="margin-bottom-40"><?php echo e($response->market); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->model != '' ): ?>
<h4 class="profile-title">What is your business model?</h4>
<p class="margin-bottom-40"><?php echo e($response->model); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->traction != '' ): ?>
<h4 class="profile-title">What is your current traction?</h4>
<p class="margin-bottom-40"><?php echo e($response->traction); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->competitors != '' ): ?>
<h4 class="profile-title">Who are your main competitors?</h4>
<p class="margin-bottom-40"><?php echo e($response->competitors); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->team != '' ): ?>
<h4 class="profile-title">Provide a management team summary</h4>
<p class="margin-bottom-40"><?php echo e($response->team); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->spend != '' ): ?>
<h4 class="profile-title">Please provide a breakdown of use of funds</h4>
<p class="margin-bottom-40"><?php echo e($response->spend); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->strengths != '' ): ?>
<h4 class="profile-title">What are your key strengths?</h4>
<p class="margin-bottom-40"><?php echo e($response->strengths); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->weaknesses != '' ): ?>
<h4 class="profile-title">What are your biggest weaknesses?</h4>
<p class="margin-bottom-40"><?php echo e($response->weaknesses); ?></p>
<hr>
<?php endif; ?>

<?php if( $response->why != '' ): ?>
<h4 class="profile-title">Why did you start the company? What excites you about it?</h4>
<p class="margin-bottom-40"><?php echo e($response->why); ?></p>
<hr>
<?php endif; ?>