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
                    <option value="">Select One</option>
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
                    <option value="{{ Auth::user()->id }}" selected>Offline Investor</option>
                    @foreach( $user as $user )
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Anonymous?</label>
                <div class="col-sm-10" style="padding-top:6px">
                  <input checked="checked" name="anonymous" id="anonymous" type="checkbox" value="1">
                </div>
              </div>
            </div>
            
            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Postal Code</label>
                <div class="col-sm-10">
                  <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal Code" required>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <select name="country" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach(  App\Models\Countries::orderBy('country_name')->get() as $country )   
                    <option @if( Auth::check() && Auth::user()->countries_id == $country->id ) selected="selected" @endif value="{{$country->country_name}}">{{ $country->country_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>            

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Investment</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-addon">{{$settings->currency_symbol}}</div>
                    <input type="number" min="1" autocomplete="off" name="amount" id="amount" class="form-control onlyNumber" placeholder="Amount" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10">
                  <input type="text" name="comment" class="form-control" placeholder="Add a brief comment (Optional)">
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

function checkInvestor() {
    if ( investor_id.value == '{{ Auth::user()->id }}')
    {
      $("#name").prop('disabled', false);
      $("#name").val("") ;
      $("#email").prop('disabled', false);
      $("#email").val("");
      $('#anonymous').iCheck('check');
      $('#anonymous').iCheck('disable');
    }
    else
    {
      $("#name").prop('disabled', true);
      $("#name").val("{{ $user->name }}");
      $("#email").prop('disabled', true);
      $("#email").val("{{ $user->email }}");
      $('#anonymous').iCheck('uncheck');
      $('#anonymous').iCheck('enable');
    };
}

$(function(){
  checkInvestor(); //this calls it on load
  $("select#investor_id").change(checkInvestor);
});

</script>

@endsection