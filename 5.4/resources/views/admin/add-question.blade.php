<!--Extend Admin-->
@extends('admin.layout')

<!--Content Section--> 
@section('content')

<!--Wrapper-->
<div class="content-wrapper">
  
  <!--Header-->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Startups
      <i class="fa fa-angle-right margin-separator"></i>Maintain Questions
      <i class="fa fa-angle-right margin-separator"></i>Add New
    </h4>
  </section>

  <!--Main content-->
  <section class="content">
    <div class="content">
      <div class="row">

        <!--Admin box-->
        <div class="box startups">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Question</h3>
          </div>

          <!--Form Start-->
          <form class="form-horizontal" method="post" action="{{ url('panel/admin/questions/add') }}" enctype="multipart/form-data">

            <!--CSRF Token-->        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">	

            <!--Include Form Errors-->
            @include('errors.errors-forms')

            <!--Status Status-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Question</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('question') }}" id="question" name="question" class="form-control" placeholder="Question" required>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="{{ url('panel/admin/questions') }}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success pull-right">Save</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection