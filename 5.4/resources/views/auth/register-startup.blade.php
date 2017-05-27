<!--Extend App Layout-->
@extends('app')

<!--Page Title-->
@section('title')Register Startup - @endsection

<!-- Content -->
@section('content')

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
  <div class="text-center margin-bottom-40">
    <img src="{{ asset('public/img/logo-dark.png') }}" class="login-logo"/>
  </div>
  <!-- Login form -->
  <div class="login-form">

    <!-- Form errors -->
    @include('errors.errors-forms')

    <!-- Start Form -->
    <form action="{{ url('register') }}" method="post" name="form" id="signup_form">

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
      <!-- Role -->
      <input type="hidden" name="role" value="startup">                   

      <!-- Full Name-->
      <div class="form-group">
        <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Full Name" required>
      </div>

      <!-- Email -->
      <div class="form-group">
       <input type="text" class="form-control input-lg" id="email" name="email" placeholder="Email" required>
     </div>

     <!-- Password -->
     <div class="form-group">
       <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required>
     </div>

     <!-- Confirm Password -->
     <div class="form-group">
       <input type="password" class="form-control input-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
       <span id="result"></span>
     </div>

     <!-- Startup Name-->
     <div class="form-group">
      <input type="text" class="form-control input-lg" name="startup" placeholder="Startup Name (Optional)">
    </div>

    <!-- Submit -->
    <button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded">Create Startup Profile</button>

    <div class="form-group margin-top-20">
      <p class="txt-center font-12"> By signing up, I agree to Startup Funding Club's <a href='terms'>Terms of Service</a> and <a href='privacy'>Privacy Policy</a></p>
    </div>

  </form>
</div>
<a href="#" onclick="history.back();" class="text-center btn-block margin-top-10 back_btn"><i class="fa fa-long-arrow-left"></i>Back</a>
</div>
@endsection

<!-- Include Javascript -->  
@include('includes.javascript-password-validation')