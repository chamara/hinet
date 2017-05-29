<?php  
if( Auth::check() ){ 
  $data = App\Models\Startups::where('user_id',Auth::user()->id)->paginate(1);
}
?>
<!-- Pending Investor -->
<?php if( Auth::check() && $userAuth->status == 'pending' ): ?>
<div class="btn-block text-center confirmEmail">Investor Account Pending - You will be able to access opportunities once approved.</div>
<?php endif; ?>


<!-- Navbar -->
<div class="navbar-container">
  <div class="navbar navbar-inverse">
    <!-- Left Navbar -->

    <!-- Mobile Button -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <!-- Logo -->
    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
      <img src="<?php echo e(asset('public/img/logo.png')); ?>" class="logo"/>
    </a>


    <!-- Right Navbar - Colapse -->
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right"> 

        <!-- Logged in List -->
        <?php if( Auth::check() ): ?>

        <?php if( $userAuth->role == 'admin'): ?> 
        <li><a href="<?php echo e(url('panel/admin')); ?>">Admins</a></li>
        <?php endif; ?>

        <!-- Investor List -->
        <?php if( $userAuth->role == 'investor'): ?> 
        <li><a href="<?php echo e(url('/opportunities')); ?>">Current Opportunities</a></li>
        <li><a href="<?php echo e(url('account/portfolio')); ?>">My Portfolio</a></li>   
        <?php endif; ?>

        <!-- Startup List -->
        <?php if( $userAuth->role == 'startup'): ?> 
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $startup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(url('startup',$startup->id)); ?>"><?php echo e($startup->title); ?></a></li>
        <li><a href="<?php echo e(url('edit/startup',$startup->id)); ?>">Edit <?php echo e($startup->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
        <?php endif; ?>

        <li class="dropdown">
          <a data-toggle="dropdown">
            <img src="<?php echo e(asset('public/avatar').'/'.$userAuth->avatar); ?>" class="navbar-avatar"/>
            <i class="ion-chevron-down"></i>
          </a>

          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
           <li><a href="<?php echo e(url('account')); ?>">Account</a></li>
           <li><a href="<?php echo e(url('logout')); ?>" class="logout text-overflow">Logout</a></li>
         </ul>
       </li>


       <?php else: ?> 
          <!-- Logged Out List -->
          <li><a href="<?php echo e(url('/startups')); ?>">Startups</a></li>
          <li><a href="<?php echo e(url('/investors')); ?>">Investors</a></li>

          <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>

          <?php if($settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'no'): ?>
            <li><a href="<?php echo e(url('/register/investor')); ?>">Investor Sign Up</a></li>

          <?php elseif($settings->disable_startups_reg == 'no' && $settings->disable_investors_reg == 'yes'): ?>
            <li><a href="<?php echo e(url('/register/startup')); ?>">Register Startup</a></li>

          <?php elseif($settings->disable_startups_reg == 'no' && $settings->disable_investors_reg == 'no'): ?>
            <li><a href="<?php echo e(url('/register')); ?>">Sign Up</a></li>
          <?php else: ?>
          <?php endif; ?>       

       <?php endif; ?>
     </ul>
   </div>
 </div>
</div>


