<?php  
$settings = App\Models\AdminSettings::first(); 
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="_token" content="{!! csrf_token() !!}"/>
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link href="{{ asset('public/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="{{ asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="{{ asset('public/fonts/ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App css -->
  <link href="{{ asset('public/admin/css/app.css')}}" rel="stylesheet" type="text/css" />
  <!-- IcoMoon CSS -->
  <link href="{{ asset('public/css/icomoon.css') }}" rel="stylesheet">
  
  <!-- Theme style -->
  <link href="{{ asset('public/admin/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  
  <link href="{{ asset('public/admin/css/skins/skin-yellow.min.css')}}" rel="stylesheet" type="text/css" />
  
  <link rel="shortcut icon" href="{{ URL::asset('public/img/favicon.png') }}" />
  
  <link href='//fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
  
  <link href="{{ asset('public/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />

  <!-- Include CSS -->
  @include('includes.css_general')
  
  @yield('css')
  
  <script type="text/javascript">
    
    // URL BASE
    var URL_BASE = "{{ url('/') }}";

  </script>
  
</head>
<body class="skin-yellow sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('public/avatar').'/'.Auth::user()->avatar }}" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p class="text-overflow">{{ Auth::user()->name }}</p>
            <small class="btn-block text-overflow"><a href="javascript:void(0);"><i class="fa fa-circle text-success"></i>Online</a></small>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
         
          <li class="header">Menu</li>
          
          <!-- Links -->
          <li @if( Request::is('panel/admin' )) class="active" @endif>
           <a href="{{ url('panel/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
         </li>

          <!-- Links -->
          <li @if( Request::is('/' )) class="active" @endif>
           <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Homepage</span></a>
         </li>
         
         <!-- Links -->
         <li @if( Request::is('panel/admin/settings' )) class="active" @endif> 
           <a href="{{ url('panel/admin/settings') }}"><i class="fa fa-cogs"></i> <span>Settings</span></a>
         </li><!-- ./Links -->

         <!-- Links -->
         <!--<li @if( Request::is('panel/admin/categories' )) class="active" @endif>
           <a href="{{ url('panel/admin/categories') }}"><i class="fa fa-list-ul"></i> <span>Categories</span></a>
         </li>--><!-- ./Links -->

          <!-- Links -->
          <li @if( Request::is('panel/admin/startups' )) class="treeview" @endif>
            <a href="#"><i class="on ion-speakerphone"></i> <span>Startups</span> <i class="fa fa-angle-left pull-right"></i></a>

            <ul class="treeview-menu">
             <li @if( Request::is('panel/admin/startup/add')) @endif>
               <a href="{{ url('panel/admin/startup/add') }}"><span>Add New Startup</span></a>
             </li>

             <li @if( Request::is('panel/admin/startups')) @endif>
               <a href="{{ url('panel/admin/startups') }}"><span>Startup Profiles</span></a>
             </li>

              <li @if( Request::is('panel/admin/questions')) @endif>
                <a href="{{ url('panel/admin/questions') }}"><span>Maintain Questions</span></a>
              </li>
            </ul>

          </li><!-- ./Links -->         
         
         
         <!-- Links -->
         <li @if( Request::is('panel/admin/investments' ) ) class="active" @endif">
           <a href="{{ url('panel/admin/investments') }}"><i class="ion ion-cash"></i> <span>Investments</span></a>
         </li><!-- ./Links -->

         <!-- Links -->
         <li @if( Request::is('panel/admin/members' )) class="active" @endif>
           <a href="{{ url('panel/admin/members') }}"><i class="glyphicon glyphicon-user"></i> <span>Members</span></a>
         </li><!-- ./Links -->
         
         <!-- Links -->
         <li @if( Request::is('panel/admin/pages' )) class="active" @endif>
           <a href="{{ url('panel/admin/pages') }}"><i class="glyphicon glyphicon-file"></i> <span>Posts</span></a>
         </li><!-- ./Links -->
         
         <!-- Links -->
         <li @if( Request::is('panel/admin/payments' )) class="active" @endif>
           <a href="{{ url('panel/admin/payments') }}"><i class="fa fa-credit-card"></i> <span>Payment Settings</span></a>
         </li><!-- ./Links -->
         
         <!-- Links -->
         <li @if( Request::is('panel/admin/social-profiles' )) class="active" @endif>
           <a href="{{ url('panel/admin/social-profiles') }}"><i class="fa fa-share-alt"></i> <span>Social Profiles</span></a>
         </li><!-- ./Links -->

          <!-- Links -->
          <li @if( Request::is('panel/admin/lookups' )) class="treeview active" @endif>
            <a href="#"><i class="fa fa-link"></i> <span>Maintain Lookups</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
             <li @if( Request::is('panel/admin/categories' )) class="active" @endif>
               <a href="{{ url('panel/admin/categories') }}"><span>Categories</span></a>
             </li>

              <li @if( Request::is('panel/admin/statuses' )) class="active" @endif>
                <a href="{{ url('panel/admin/statuses') }}"><span>Statuses</span></a>
              </li>

              <li @if( Request::is('panel/admin/tax-reliefs' )) class="active" @endif>
                <a href="{{ url('panel/admin/tax-reliefs') }}"><span>Tax Reliefs</span></a>
              </li>
            </ul>
          </li><!-- ./Links -->

         <!-- Links -->
         <li @if( Request::is('panel/admin/logout' )) class="active" @endif>
           <a href="{{ url('logout') }}"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a>
         </li><!-- ./Links -->

       </ul><!-- /.sidebar-menu -->
     </section>
     <!-- /.sidebar -->
   </aside>

   @yield('content')

   <!-- Main Footer -->
   <footer class="main-footer">
    <!-- Default to the left -->
    &copy; <strong>{{ $settings->title }}</strong> - <?php echo date('Y'); ?>
  </footer>

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('public/plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('public/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{ asset('public/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin/js/app.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('public/plugins/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('public/admin/js/functions.js')}}" type="text/javascript"></script>

@yield('javascript')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
</body>
</html>
