<!-- Admin Settings -->
<?php $settings = App\Models\AdminSettings::first();?>

<!-- Extend App -->
@extends('app')

<!--Page Title-->
@section('title')Invest in UK Startups - @endsection

<!-- Content Section -->
@section('content') 
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Startup Funding Club</h1>
		<div class="text-center">
			<a href="{{ url('/register/startup') }}" class="btn btn-lg btn-green">Create Startup Profile</a><a href="{{ url('/register/investor') }}" class="btn text-center btn-lg btn-green margin-left">Join as Investor</a>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container margin-top-40">
	<!-- Header -->
	<h1 class="text-center margin-bottom-40">Featured Startups</h1>	

	<!-- Featured Opportunities -->
	<div class="margin-bottom-40">
		@include('includes.featured-opportunities')
	</div>
</div>
@endsection
