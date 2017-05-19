@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Posts
      <i class="fa fa-angle-right margin-separator"></i>Add New
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="content">

      <div class="row">

        <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Add New Post</h3>
          </div>


          <!-- Form start -->
          <form class="form-horizontal" method="post" action="{{ url('panel/admin/pages') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">	

            @include('errors.errors-forms')

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Title">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('slug') }}" name="slug" class="form-control" placeholder="Slug">
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">

                  <textarea name="content"rows="5" cols="40" id="content" class="form-control" placeholder="Content">{{ old('content') }}</textarea>
                </div>
              </div>
            </div>

            <div class="box-footer">
              <a href="{{ url('panel/admin/pages') }}" class="btn btn-default">Cancel</a>
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
<script src="{{{ asset('public/plugins/ckeditor/ckeditor.js') }}}" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('content');
});
  @endsection
