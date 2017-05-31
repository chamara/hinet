<div class="banner-divider banner-green">
  <div class="banner-content">
    <h1 class="title-site margin-bottom-40">Startup Dashboard</h1>
  </div>
</div>

<!-- Container -->
<div class="container margin-bottom-40 padding-top-40">
  <div class="startup-sidebar">
    <div class="row padding-top-40">
      <div class="col-md-3 margin-top-40">
       <ul class="startup-navigation">
         <li <?php if(Request::path() == "edit/startup/$data->id"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('edit/startup',$data->id)); ?>">Startup Profile</a></li>
         <li <?php if(Request::path() == "edit/startup/application/$data->id"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('edit/startup/application',$data->id)); ?>">Funding Application</a></li>
         <li <?php if(Request::path() == "edit/startup/documents/$data->id" || Request::path() == "edit/startup/documents/add/$data->id"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('edit/startup/documents',$data->id)); ?>">Documents</a></li>
         <li <?php if(Request::path() == "edit/startup/teams/$data->id" || Request::path() == "edit/startup/teams/add/$data->id"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('edit/startup/teams',$data->id)); ?>">Team</a></li>
       </ul>
       <hr>
       <ul class="startup-navigation">
         <li <?php if(Request::path() == "account"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('account')); ?>">Account</a></li>
         <li <?php if(Request::path() == "password"): ?> class="active" <?php endif; ?>>
         <a href="<?php echo e(url('account/password')); ?>">Change Password</a></li>
         <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
       </ul>
     </div>


     <div class="col-md-9 border-left margin-top-40">
      <div class="edit-panel">
        <div class="edit-panel-content">