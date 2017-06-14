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
      <i class="fa fa-angle-right margin-separator"></i>Startups
      <i class="fa fa-angle-right margin-separator"></i>Maintain Questions
      <i class="fa fa-angle-right margin-separator"></i>{{ $question->question }}
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
            <h3 class="box-title">Edit Question</h3>
          </div>
          
          <!--Form Start-->
          <form class="form-horizontal" method="post" action="{{ url('panel/admin/questions/update') }}" enctype="multipart/form-data">
           
            <!--CSRF Token-->        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $question->id }}">

            <!--Include Form Errors-->
            @include('errors.errors-forms')
            
            <!--question question-->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Question</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $question->question }}" id="question" name="question" class="form-control" placeholder="question" required>
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

@section('javascript')
  <!-- icheck -->
  <script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('public/js/style-admin-elements.js') }}"></script>
@endsection