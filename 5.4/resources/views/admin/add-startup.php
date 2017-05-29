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
              <h3 class="box-title">Add New Startup</h3>
            </div>

            <!--Form Start-->
            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/startup/add') }}" enctype="multipart/form-data">  	
              <!--CSRF Token-->        
              <input type="hidden" name="_token" value="{{ csrf_token() }}">	

              <!--Include Form Errors-->
              @include('errors.errors-forms')

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="startup" class="form-control" placeholder="Startup Name">
                  </div>
                </div>
              </div>
              
              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Email" required required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required>
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control input-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <a href="{{ url('panel/admin/startups') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
