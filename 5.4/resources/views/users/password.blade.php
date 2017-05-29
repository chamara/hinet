<?php  
$user = Auth::user();

if($user->role == 'startup'){
$data = App\Models\Startups::where('user_id',Auth::user()->id)->firstOrFail();
}
?>

@extends('app')
@section('title')Account- @endsection

@section('content')
@if( $user->role == 'startup') 
@include('includes.startup-dashboard')
@elseif( $user->role == 'investor') 
@include('includes.investor-dashboard')
@else( $user->role == 'admin')
@include('includes.admin-dashboard')
@endif

@if (session('notification'))
<div class="alert alert-success btn-sm alert-fonts" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ session('notification') }}
</div>
@endif


@if (Session::has('incorrect_pass'))
<div class="alert alert-danger btn-sm alert-fonts" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ Session::get('incorrect_pass') }}
</div>
@endif

@include('errors.errors-forms')
<h1 class="margin-bottom-40">Password</h1>
<form action="{{ url('account/password') }}" method="post" name="form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group has-feedback">
    <label>Old Password</label>
    <input type="password" class="form-control input-lg" name="old_password" placeholder="*******">
  </div>

  <div class="form-group has-feedback">
    <label>New Password</label>
    <input type="password" class="form-control input-lg" name="password" placeholder="*******">
  </div>

  <button type="submit" id="buttonSubmit" class="btn btn-save btn-lg custom-rounded">Update</button>
</form>


@include('includes.dashboard-end')
@endsection