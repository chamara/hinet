@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Members
      <i class="fa fa-angle-right margin-separator"></i>Add New
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="content">

     <div class="row">

      <div class="col-md-9">

       <div class="box Startups">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Member</h3>
        </div>

        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ url('panel/admin/member/add') }}" enctype="multipart/form-data">

         <input type="hidden" name="_token" value="{{ csrf_token() }}">

         @include('errors.errors-forms')

         <!-- Start Box Body -->
         <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
        </div>

        <!-- Start Box Body -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
          </div>
        </div>

        <!-- Start Box Body -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">
              <select name="role" id="role" class="form-control" required>
                <option value="">Select One</option>
                <option value="startup">Startup</option>
                <option value="investor">Investor</option>
                <option value="admin">Admin</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Start Box Body -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" value="" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
          </div>
        </div>

        <!-- Start Box Body -->
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" value="" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              <span id="result"></span>
            </div>
          </div>
        </div>

        <div class="box-footer">
          <a href="{{ url('panel/admin/members') }}" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Save</button>
        </div>
      </form>
    </div>

  </div>
</div>

</div>
</section>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

  $(".actionDelete").click(function(e) {
    e.preventDefault();

    var element = $(this);
    var id     = element.attr('data-url');
    var form    = $(element).parents('form');

    element.blur();

    swal(
      {   title: "Delete",  
      text: "Delete",
      type: "warning", 
      showLoaderOnConfirm: true,
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",  
      confirmButtonText: "Confirm",   
      cancelButtonText: "Cancel",  
      closeOnConfirm: false, 
    }, 
    function(isConfirm){  
      if (isConfirm) {   
       form.submit(); 
		    	 	//$('#form' + id).submit();
          }
        });
  });
</script>
@endsection

<!-- Include Javascript -->
@include('includes.javascript-password-validation')
