<!-- Admin Settings -->
<?php $settings = App\Models\AdminSettings::first();?>

<!-- Extend App -->
@extends('app')

<!--Page Title-->
@section('title')For Startups - @endsection

<!-- Content Section -->
@section('content')
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Helping Startups Succeed</h1>
		<div class="text-center">
			<a href="{{ url('/register/startup') }}" class="btn btn-lg btn-green custom-rounded">Create Startup Profile</a>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container container-narrow margin-top-40 margin-bottom-40">
	<div class="row margin-bottom-40">
		<h1 class="margin-bottom-40 investors-header">This page is under construction...</h1>
	</div>
</div>
@endsection
