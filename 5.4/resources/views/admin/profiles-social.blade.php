@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Profiles-Social
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
   
    @if(Session::has('success_message'))
    <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}	        
  </div>
  @endif

  <div class="content">
    
    <div class="row">
      
     <div class="box Startups">
      <div class="box-header with-border">
        <h3 class="box-title">Social</h3>
      </div>
      
      
      
      <!-- form start -->
      <form class="form-horizontal" method="POST" action="{{ url('panel/admin/profiles-social') }}" enctype="multipart/form-data">
       
       <input type="hidden" name="_token" value="{{ csrf_token() }}">	
       
       @include('errors.errors-forms')
       
       <!-- Start Box Body -->
       <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Facebook</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->facebook }}" name="facebook" id="facebook" class="form-control" placeholder="http://www.facebook.com">
          </div>
        </div>
      </div>
      
      <!-- Start Box Body -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Twitter</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->twitter }}" name="twitter" id="twitter" class="form-control" placeholder="http://www.twitter.com">
          </div>
        </div>
      </div>
      
      <!-- Start Box Body -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Google Plus</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->googleplus }}" name="googleplus" id="googleplus" class="form-control" placeholder="http://www.google.com">
          </div>
        </div>
      </div>
      
      <!-- Start Box Body -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Instagram</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->instagram }}" name="instagram" id="instagram" class="form-control" placeholder="http://www.instagram.com">
          </div>
        </div>
      </div>

      <!-- Start Box Body -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Linkedin</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->linkedin }}" name="linkedin" id="linkedin" class="form-control" placeholder="http://www.linkedin.com">
          </div>
        </div>
      </div>

      <!-- Start Box Body -->
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">AngelList</label>
          <div class="col-sm-10">
            <input type="text" value="{{ $settings->angellist }}" name="angellist" id="angellist" class="form-control" placeholder="http://www.angel.co">
          </div>
        </div>
      </div>
      
      <div class="box-footer">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
  </div>
  
</div>

</div>
</section>
</div>
@endsection

