<!--MAIN APP LAYOUT TEMPLATE-->

<!--Admin Settings-->
<?php 
$settings = App\Models\AdminSettings::first();
$userAuth = Auth::user(); 
?> 

<!DOCTYPE html> 
<html lang="en">

<!--Start Header-->
<head>

	<!--Meta Data-->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Meta from admin settings -->
	<meta name="description" content="@yield('description_custom'){{{ $settings->description }}}">
	<meta name="keywords" content="{{{ $settings->keywords }}}" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{{ asset('public/img/favicon.png') }}}" />

	<!-- Title -->
	<title>@section('title')@show @if( isset( $settings->title ) ){{{$settings->title}}}@endif</title>

	<!-- Include CSS -->
	@include('includes.css_general')

	<!-- Include Specific Page CSS -->
	@yield('css')

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
		]); ?>
	</script>
</head>
<body>
		<!-- Navbar -->
		@include('includes.navbar')

		<!-- Include Specific Page Content -->
		@yield('content')

		<!-- Include Footer-->
		@include('includes.footer')

		<!-- Include Javascript General-->	
		@include('includes.javascript_general')

		<!-- Include Specific Page Javascript-->
		@yield('javascript')
</body>

</html>
