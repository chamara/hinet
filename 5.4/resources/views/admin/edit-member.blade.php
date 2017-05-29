@extends('admin.layout') 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Edit
      <i class="fa fa-angle-right margin-separator"></i>{{ $data->name }}
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box Startups">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Member</h3>
            </div>

            <!-- Form start -->
            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/members/'.$data->id) }}" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">	

              @include('errors.errors-forms')

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $data->email }}" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <select name="role" class="form-control" >
                      <option @if($data->role == 'investor') selected="selected" @endif value="investor">Investor</option>
                      <option @if($data->role == 'startup') selected="selected" @endif value="startup">Startup</option>
                      <option @if($data->role == 'admin') selected="selected" @endif value="admin">Admin</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" class="form-control" >
                      <option @if($data->status == 'pending') selected="selected" @endif value="pending">Pending</option>
                      <option @if($data->status == 'active') selected="selected" @endif value="active">Active</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" value="" name="password" class="form-control" placeholder="Leave Empty for no change">
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

        <div class="col-md-3">

          <div class="block-block text-center">
            <img src="{{asset('public/avatar').'/'.$data->avatar}}" class="thumbnail img-responsive">
          </div>

          <ol class="list-group">
            <li class="list-group-item"> Registered <span class="pull-right color-strong">{{ date('d M, y', strtotime($data->created_at)) }}</span></li>

            <li class="list-group-item"> Status <span class="pull-right color-strong">{{ ucfirst($data->status) }}</span></li>

            <li class="list-group-item"> Country <span class="pull-right color-strong">@if( $data->countries_id != '' ) {{ $data->country()->country_name }} @else N/A @endif</span></li>

            <li class="list-group-item"> Startups <strong class="pull-right color-strong">{{ App\Helper::formatNumber( $data->startups()->count() ) }}</strong></li>

            <li class="list-group-item"> Investments <strong class="pull-right color-strong">{{ App\Helper::formatNumber( $data->investments()->count() ) }}</strong></li>
          </ol>

          <div class="block-block text-center">
            {!! Form::open([
            'method' => 'DELETE',
            'route' => ['user.destroy', $data->id],
            'class' => 'displayInline'
            ]) !!}
            {!! Form::submit('Delete', ['data-url' => $data->id, 'class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']) !!}
            {!! Form::close() !!}
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
      {   title: "Confirm",  
      text: "Delete User",
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
      }
    });
  });

</script>


@endsection
