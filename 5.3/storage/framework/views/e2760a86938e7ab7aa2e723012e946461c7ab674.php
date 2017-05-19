<?php 
$settings = App\Models\AdminSettings::first();
$url = url('startup',$key->id).str_slug( $key->title );

if ($key->goal <> 0 ){
  $percentage = round($key->investments()->sum('investment') / $key->goal * 100);
} 
else {
  $percentage = '0';
} 
?>

<div class="col-xs-12 col-sm-6 col-md-4"> 
  <div class="thumbnail-holder">
    <div class="thumbnail padding-top-zero">
      <a href="<?php echo e($url); ?>"></a>
      <div class="thumnail-cover" style="background-image: url('<?php echo e(asset('public/startups/cover').'/'.$key->cover); ?>');"></div>


      <div class="caption">
        <p class="pull-right">
          <img src="<?php echo e(asset('public/startups/logo').'/'.$key->logo); ?>" width="80" height="80" class="avatar-startup" />
        </p>

        <h1 class="title-startups">
          <div title="<?php echo e(e($key->title)); ?>">
            <?php echo e(e($key->title)); ?>

          </div>
        </h1>

        <p class="min-height-55">
          <?php echo e(str_limit(strip_tags($key->oneliner),130,'...')); ?>

        </p>

        <p>
          <span class="stats-startups">
            <span class="pull-left">
              <?php echo e($settings->currency_symbol.number_format($key->investments()->sum('investment'))); ?>

              Raised
            </span> 
            <span class="pull-right"><?php echo e($percentage); ?>%</span> 
          </span>

          <span class="progress">
            <span class="percentage" style="width: <?php echo e($percentage); ?>%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
          </span>
        </p>
      </div>
    </div>
  </div>
</div>