<?php  	
$settings = App\Models\AdminSettings::first();

// Total
$total_startups = App\Models\startups::count();
$startups = App\Models\startups::orderBy('id','DESC')->take(3)->get();
$users = App\Models\User::orderBy('id','DESC')->take(4)->get();
$total_raised_funds = App\Models\investments::sum('investment');
$total_investments = App\Models\investments::count();

?>



<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/morris/morris.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo e($total_investments); ?></h3>
            <p>Investments</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo e($settings->currency_symbol); ?><?php echo e(\App\Helper::formatNumber( $total_raised_funds )); ?></h3>
            <p>Raised</p>
          </div>
          <div class="icon">
            <i class="ion ion-social-gbp"></i>
          </div>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo e(\App\Helper::formatNumber( \App\Models\User::count() )); ?></h3>
            <p>Members</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo e(\App\Helper::formatNumber( $total_startups )); ?></h3>
            <p>Startups</p>
          </div>
          <div class="icon">
            <i class="ion ion-speakerphone"></i>
          </div>
        </div>
      </div><!-- ./col -->
    </div>

    <div class="row">

      <section class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li class="pull-left header"><i class="ion ion-cash"></i>Investments in last 30 days</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active">
              <div class="chart" id="chart1"></div>
            </div>
          </div>
        </div>
      </section>

    </div><!-- ./row -->	

    <div class="row">
      <div class="col-md-6">

        <!-- USERS LIST -->
        <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Latest Members</h3>
            <div class="box-tools pull-right">
            </div>
          </div>

          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <img src="<?php echo e(asset('public/avatar').'/'.$user->avatar); ?>" alt="User Image">
                <span class="users-list-name"><?php echo e($user->name); ?></span>

                <span class="users-list-date"><?php echo e(date('d M, y', strtotime($user->created_at))); ?></span>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul><!-- /.users-list -->
          </div>

          <div class="box-footer text-center">
            <a href="<?php echo e(url('panel/admin/members')); ?>" class="uppercase">View All Members</a>
          </div>

        </div><!--/.box -->
      </div>



      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Recent Startups</h3>
            <div class="box-tools pull-right">
            </div>
          </div>

          <?php if( $total_startups != 0 ): ?>  
          <div class="box-body">

            <ul class="products-list product-list-in-box">

              <?php $__currentLoopData = $startups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $startup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="item">
                <div class="product-img">
                  <img src="<?php echo e(asset('public/startups/logo/').'/'.$startup->logo); ?>" style="height: auto !important;" />
                </div>
                <div class="product-info">
                    <?php if( $startup->status == 'active' && $startup->finalized == 0 ): ?>
                      <a href="<?php echo e(url('startup', $startup->id)); ?>" target="_blank" class="product-title"><?php echo e($startup->title); ?>

                        <span class="label label-success">Active</span>
                      </a>
                    <?php elseif( $startup->status == 'pending' && $startup->finalized == 0 ): ?>
                      <div class="product-title"><?php echo e($startup->title); ?>

                        <span class="label label-warning">Pending</span>
                      </div>
                    <?php else: ?>
                      <div class="product-title"><?php echo e($startup->title); ?>

                        <span class="label label-default">Finalized</span>
                      </div>
                    <?php endif; ?>
                  <span class="product-description">
                    <?php echo e($startup->user()->name); ?> / <?php echo e(date('d M, y', strtotime($startup->created_at))); ?>

                  </span>
                </div>
              </li><!-- /.item -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>

          <div class="box-footer text-center">
            <a href="<?php echo e(url('panel/admin/startups')); ?>" class="uppercase">View All</a>
          </div>

          <?php else: ?>
          <div class="box-body">
            <h5>No Results</h5>
          </div>

          <?php endif; ?>

        </div>
      </div>

    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- Morris -->
<script src="<?php echo e(asset('public/plugins/morris/raphael-min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/morris/morris.min.js')); ?>" type="text/javascript"></script>

<!-- knob -->

<script type="text/javascript">

  var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

//** Charts
new Morris.Area({ 
// ID of the element in which to draw the chart.
element: 'chart1',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
data: [
<?php 
for ( $i=0; $i < 30; ++$i) { 

  $date = date('Y-m-d', strtotime('today - '.$i.' days'));
  $_investments = App\Models\investments::whereRaw("DATE(created_at) = '".$date."'")->count();

//print_r(DB::getQueryLog());
  ?>

  { days: '<?php echo $date; ?>', value: <?php echo $_investments ?> },

  <?php } ?>
  ],
// The name of the data record attribute that contains x-values.
xkey: 'days',
// A list of names of data record attributes that contain y-values.
ykeys: ['value'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['Investments'],
pointFillColors: ['#FF5500'],
lineColors: ['#DDD'],
hideHover: 'auto',
gridIntegers: true,
resize: true,
xLabelFormat: function (x) {
  var month = IndexToMonth[ x.getMonth() ];
  var year = x.getFullYear();
  var day = x.getDate();
  return  day +' ' + month;
//return  year + ' '+ day +' ' + month;
},
dateFormat: function (x) {
  var month = IndexToMonth[ new Date(x).getMonth() ];
  var year = new Date(x).getFullYear();
  var day = new Date(x).getDate();
  return day +' ' + month;
//return year + ' '+ day +' ' + month;
},

});// <------------ MORRIS
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>