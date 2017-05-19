@extends('admin.layout') 
@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Edit
      <i class="fa fa-angle-right margin-separator"></i>{{ $data->title }}
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-9">

          <div class="box Startups">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Startup</h3>
            </div>

            <!-- Form start -->
            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/startups/edit/'.$data->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('errors.errors-forms')

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $data->title }}" name="title" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choose a Category</label>
                  <div class="col-sm-10">
                    <select name="categories_id" class="form-control">
                      <option value="">Select One</option>
                      @foreach(  App\Models\Categories::where('mode','on')->orderBy('name')->get() as $category ) 	
                      <option @if( $category->id == $data->categories_id ) selected="selected" @endif value="{{$category->id}}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Investment Sought</label>
                  <div class="col-sm-10">
                    <input type="number" min="1" autocomplete="off" value="{{ $data->goal }}" name="goal" class="form-control onlyNumber" placeholder="1000000">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $data->location }}" name="location" class="form-control" placeholder="Location">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="5" id="description" class="form-control  tinymce-txt" placeholder="Description">{{ $data->description }}</textarea>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select name="finalized" class="form-control" >
                      <option @if($data->finalized == '0' && $data->status == 'pending') selected="selected" @endif value="pending">Pending</option>
                      <option @if($data->finalized == '0'  && $data->status == 'active') selected="selected" @endif value="0">Active</option>
                      <option @if($data->finalized == '1'  && $data->status == 'active') selected="selected" @endif value="1">Finialized</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Opportunity?</label>
                  <div class="col-sm-10">

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" @if( $data->opportunity == '1' ) checked="checked" @endif value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" @if( $data->opportunity == '0' ) checked="checked" @endif value="0">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Portfolio?</label>
                  <div class="col-sm-10">

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" @if( $data->portfolio == '1' ) checked="checked" @endif value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" @if( $data->portfolio == '0' ) checked="checked" @endif value="0">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Featured?</label>
                  <div class="col-sm-10">

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" @if( $data->featured == '1' ) checked="checked" @endif value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" @if( $data->featured == '0' ) checked="checked" @endif value="0">
                        No
                      </label>
                    </div>

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
        <div class="col-md-3">

          <div class="block-block text-center">
            <img src="{{asset('public/startups/logo').'/'.$data->logo}}" class="thumbnail img-responsive">
          </div>

          <div class="block-block text-center">
            {!! Form::open([
            'method' => 'POST',
            'url' => 'panel/admin/startup/delete',
            'class' => 'displayInline'
            ]) !!}
            {!! Form::hidden('id',$data->id ); !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']) !!}
            {!! Form::close() !!}
          </div>
        </div>	        		
      </div>
    </div>
  </section>
</div>
@endsection
@section('javascript')

<!-- icheck -->
<script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

  $(document).ready(function() {
    $(".onlyNumber").keydown(function (e) {
// Allow: backspace, delete, tab, escape, enter and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
// Allow: Ctrl+A, Command+A
(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
// Allow: home, end, left, right, down, up
(e.keyCode >= 35 && e.keyCode <= 40)) {
// let it happen, don't do anything
return;
}
// Ensure that it is a number and stop the keypress
if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
  e.preventDefault();
}
});
  });

  $(".actionDelete").click(function(e) {
    e.preventDefault();

    var element = $(this);
    var id     = element.attr('data-url');
    var form    = $(element).parents('form');

    element.blur();

    swal(
      {   title: "Confirm",  
      text: "Delete Startup",
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
