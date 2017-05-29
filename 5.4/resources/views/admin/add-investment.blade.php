  <!--Extend Admin-->
  @extends('admin.layout')

  <!--Content Section--> 
  @section('content')

  <!--Wrapper-->
  <div class="content-wrapper">

    <!--Header-->
    <section class="content-header">
      <h4>Admin
        <i class="fa fa-angle-right margin-separator"></i>Investments
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
              <h3 class="box-title">Add New Investment</h3>
            </div>

            <!--Form Start-->
            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/investment/add') }}" enctype="multipart/form-data">  	
              <!--CSRF Token-->        
              <input type="hidden" name="_token" value="{{ csrf_token() }}">	

              <!--Include Form Errors-->
              @include('errors.errors-forms')

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup</label>
                  <div class="col-sm-10">
                    <select name="startup_id" class="form-control">
                      @foreach( $data as $startup )
                      <option value="{{ $startup->id }}">{{ $startup->title }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investor</label>
                  <div class="col-sm-10">
                    <select name="startup_id" class="form-control">
                      <!--commented out 29 May 2017 as it returns an error page if another investor is selected. Is this ok?-->
                      <!--@foreach( $user as $user )
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach-->
                      <option value="1">Offline Investor</option>
                    </select>
                  </div>
                </div>
              </div>

              
              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" name="amount" class="form-control onlyNumber" placeholder="Amount">
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                    <input type="text" name="comment" class="form-control" placeholder="Comment">
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <a href="{{ url('panel/admin/investments') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
            </form>
          </div>			        		
        </div>
      </div>
    </section>
  </div>
  @endsection
