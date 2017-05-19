<!-- Extend app -->
@extends('app')

<!-- Title -->
@section('title')Forgot Password - @endsection

@section('content')

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
	<div class="text-center margin-bottom-40">
		<img src="{{ asset('public/img/logo-dark.png') }}" class="login-logo"/>
	</div>

	<!-- Login form -->
	<div class="login-form">

		<!-- Header -->
		<h1 class="margin-bottom-40 text-center position-relative">Forgot Password</h1>

		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif

		@include('errors.errors-forms')
		<form action="{{ url('/password/email') }}" method="post" name="form" id="signup_form">
			{{ csrf_field() }}
			<div class="form-group has-feedback">
				<input type="text" class="form-control input-lg" name="email" id="email" placeholder="Email">
			</div>
			<button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded">Send</button>
			<a href="{{ url('login') }}" class="text-center btn-block margin-top-10 back_btn"><i class="fa fa-long-arrow-left"></i> Go Back</a>
		</form>
	</div>
</div>
@endsection
