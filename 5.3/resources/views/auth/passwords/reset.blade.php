<!-- Extend App -->
@extends('app')

<!-- Content -->
@section('content')

<!-- Container -->
<div class="container-fluid margin-bottom-40 margin-top-40">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center line position-relative">Reset Password</h1>

      <!-- Login Form -->
      <div class="login-form">

        <!-- Include Errors -->
        @include('errors.errors-forms')

        <!-- Reset Password Form -->
        <form action="{{ url('/password/reset') }}" method="post" name="form" id="signup_form">

          <!-- Hidden inputs -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="token" value="{{ $token }}">

          <!-- Email -->
          <div class="form-group has-feedback">
          <input type="text" class="form-control input-lg" name="email" id="email" placeholder="Email">
          </div>

          <!-- Password -->
          <div class="form-group has-feedback">
          <input type="password" class="form-control input-lg" name="password" placeholder="Password">
          </div>

          <!-- Confirm Password -->
          <div class="form-group has-feedback">
           <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
         </div>

         <!-- Reset Password -->
         <button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded">Reset Password</button>
       </form>
     </div>
   </div>
 </div>
</div>
@endsection

