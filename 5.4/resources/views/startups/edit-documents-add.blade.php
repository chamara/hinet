<?php $settings = App\Models\AdminSettings::first(); 
$documents = $data->documents()->orderBy('id','desc')->paginate(20);
?>
@extends('app')

@section('title') Add Document - @endsection

@section('content')
@include('includes.startup-dashboard')
<h1 class="margin-bottom-40">Add Document</h1>
<form method="POST" action="" enctype="multipart/form-data" id="formUpdate">  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $data->id }}">

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Document Name</label>
    <input type="text" name="filename" id="filename" class="form-control input-lg" placeholder="Filename">
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Document</label>
    <input type="file" name="document" id="document" class="form-control input-lg">
  </div>

  <div class="box-footer">
    <hr />
    <!-- Alert -->
    <div class="alert alert-success display-none" id="successAlert">
      <ul class="list-unstyled" id="success_update">
        <li>Uploaded</li>
      </ul>
    </div>
    <button type="submit" id="buttonFormUpdate" class="btn btn-save custom-rounded">Upload</button>
  </div>          
</form>
@include('includes.dashboard-end')

@endsection
