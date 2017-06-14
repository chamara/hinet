<!--Extend Admin-->
@extends('admin.layout')

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

<!--Content Section--> 
@section('content')

<!--Wrapper-->
<div class="content-wrapper">
  
  <!--Header-->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Picklists
      <i class="fa fa-angle-right margin-separator"></i>Statuses
      <i class="fa fa-angle-right margin-separator"></i>{{ $status->status }} | {{ $status->table }}
      <i class="fa fa-angle-right margin-separator"></i>Edit
    </h4>
  </section>

  <!--Main content-->
  <section class="content">
    <div class="content">
      <div class="row">

        <!--Admin box-->
        <div class="box startups">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Status</h3>
          </div>
          
          <!--Form Start-->
          <form class="form-horizontal" method="post" action="{{ url('panel/admin/statuses/update') }}" enctype="multipart/form-data">
           
            <!--CSRF Token-->        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $status->id }}">

            <!--Include Form Errors-->
            @include('errors.errors-forms')
            
            <!--Status Status-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $status->status }}" id="status" name="status" class="form-control" placeholder="Status" required>
                </div>
              </div>
            </div>
            
            <!--Status Table-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Table</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $status->table }}" name="table" id="table" class="form-control" placeholder="Table" required>
                </div>
              </div>
            </div>
            
            <!--Status Mode-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Active?</label>
                <div class="col-sm-10" style="padding-top:6px">
                  <input type="checkbox" name="mode" id="mode" @if( $status->mode == 'on' ) checked="checked" @endif value="on">
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="{{ url('panel/admin/statuses') }}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success pull-right">Save</button>
            </div>

          </form>
        </div>			        		
      </div>
    </div>
  </section>
</div>
@endsection

@section('javascript')
<!-- icheck -->
<script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
  //Flat red color scheme for iCheck
  $(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red'
  });
});
</script>

@endsection