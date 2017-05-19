<!--Extend App Layout--> 
@extends('app')

<!--Page Title-->
@section('title')Login - @endsection

<!-- Content -->
@section('content')

<!--Container-->
<div class="container margin-bottom-40 margin-top-40">
  <div class="text-center">
    <img src="{{ asset('public/img/logo-dark.png') }}" class="login-logo"/>
  </div>
  <div class="login-form">
    <h1 class=" margin-bottom-40 text-center"></h1>

    <!-- Include errors -->
    @include('errors.errors-forms')

    <!-- Login Form -->
    <form action="{{ url('login') }}" method="post" name="form" id="signup_form">

      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <!-- Username or Email -->
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="email" id="username_or_email" placeholder="Email">
      </div>

      <!-- Password -->
      <div class="form-group">
        <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
      </div>

      <!-- Submit -->
      <button type="submit" id="buttonSubmit" class="btn btn-lg btn-block btn-main custom-rounded">Login</button>
    </form>
    <hr>
    <p><a href="{{url('/password/reset')}}">Forgot Password?</a></p>
    <p>Don't have an account yet?<a href="{{ url('/register') }}"> Sign Up</a></p>
  </div>
</div>
@endsection