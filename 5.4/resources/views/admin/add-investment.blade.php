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
                    <select name="startup_id" id="startup_id" class="form-control" required>
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
                    <select name="investor_id" id="investor_id" class="form-control" required>
                      @foreach( $user as $user )
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                      <option value="{{ Auth::user()->id }}" selected>Offline Investor</option>
                    </select>
                  </div>
                </div>
              </div>
              
              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" id="lblName" name="lblName">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label" id="lblEmail" name="lblEmail">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" name="amount" id="amount" class="form-control onlyNumber" placeholder="Amount" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                    <input type="text" name="comment" class="form-control" placeholder="Comment (Optional)">
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

  @section('javascript')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#investor_id').on('change', function() {
      if ( this.value == '{{ Auth::user()->id }}')
      {
        $("#name").prop('disabled', false);
        $("#name").val("") ;
        $("#email").prop('disabled', false);   
        $("#email").val("");     
      }
      else
      {
        //$("#name").prop('disabled', true);
        $("#name").val("{{ $user->name }}") ;
        //$("#email").prop('disabled', true);
        $("#email").val("{{ $user->email }}");
      }
    });
  });
  </script>
  @endsection
