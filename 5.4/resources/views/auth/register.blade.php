<!--Extend App Layout-->
@extends('app')

<!--Page Title-->
@section('title')Register - @endsection

<!-- Content -->
@section('content')

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
  <div class="text-center margin-bottom-40">
    <img src="{{ asset('public/img/logo-dark.png') }}" class="login-logo"/>
  </div>
  <div class="signup-form">
    <h1 class=" margin-bottom-40 text-center"></h1>


    <div class="form-group">
      <a href="{{ url('/register/startup') }}" class="btn btn-block btn-lg btn-main custom-rounded">Create Startup Profile</a>
    </div>

    <div class="form-group">
      <a href="{{ url('/register/investor') }}" class="btn btn-block btn-lg btn-main custom-rounded">Request to Join as Investor</a>
    </div>
    <hr>
    <p>Already registered? <a href="{{ url('/login') }}">Login</a></p>
  </div>
</div>
@endsection