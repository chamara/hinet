<!--Extend Admin-->
@extends('admin.layout')

<!--Content Section--> 
@section('content')

<!--Wrapper-->
<div class="content-wrapper">
  
  <!--Header-->
  <section class="content-header">
    <h4>Admin 
      <i class="fa fa-angle-right margin-separator"></i> Statuses
      <i class="fa fa-angle-right margin-separator"></i> Add New
    </h4>
  </section>

  <!--Main content-->
  <section class="content">
    <div class="content">
      <div class="row">

        <!--Admin box-->
        <div class="box startups">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Status</h3>
          </div>
          
          <!--Form Start-->
          <form class="form-horizontal" method="post" action="{{ url('panel/admin/statuses/add') }}" enctype="multipart/form-data">
           
            <!--CSRF Token-->        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">	

            <!--Include Form Errors-->
            @include('errors.errors-forms')
            
            <!--Status Status-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('status') }}" id="status" name="status" class="form-control" placeholder="Status" required>
                </div>
              </div>
            </div>
            
            <!--Status Table-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Table</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('table') }}" name="table" id="table" class="form-control" placeholder="Table" required>
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