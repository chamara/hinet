
@extends('admin.layout')

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/plugins/tagsinput/jquery.tagsinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h4>Admin
        <i class="fa fa-angle-right margin-separator"></i>Startups
        <i class="fa fa-angle-right margin-separator"></i>Add New
      </h4>
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="content">
      <div class="row">
          <div class="box startups">
            <div class="box-header with-border">
              <h3 class="box-title">Add Startup</h3>
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
                    <input type="text" name="title" id="title" class="form-control" placeholder="Name" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Logo</label>
                  <div class="col-sm-10">
                    <input type="file" name="logo" id="logo" class="form-control input-lg">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Cover</label>
                  <div class="col-sm-10">
                    <input type="file" name="cover" id="cover" class="form-control input-lg">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Member Name</label>
                  <div class="col-sm-10">
                    <select name="member_name" id="member_name" class="form-control" required>
                      <option value="">Select One</option>
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
                  <label class="col-sm-2 control-label">Category</label>
                  <div class="col-sm-10">
                    <select name="category" id="category" class="form-control" required>
                      <option value="">Select One</option>
                      @foreach(  App\Models\Categories::where('mode','on')->orderBy('name')->get() as $category )   
                      <option value="{{$category->id}}">{{ $category->name }}</option>
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
                    <input type="number" min="1" autocomplete="off" name="goal" id="goal" class="form-control onlyNumber" placeholder="1000000" required>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" name="location" id="location" class="form-control" placeholder="Location">
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Startup Description</label>
                  <div class="col-sm-10">
                    <textarea name="description" rows="5" id="description" class="form-control  tinymce-txt" placeholder="Description"></textarea>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select name="status" id="status" class="form-control" required>
                      <option value="pending">Pending</option>
                      <option value="active">Active</option>
                      <option value="finalized">Finialized</option>
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
                        <input type="radio" name="opportunity" id="opportunity" value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="opportunity" id="opportunity" value="0">
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
                        <input type="radio" name="portfolio" id="portfolio" value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="portfolio" id="portfolio" value="0">
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
                        <input type="radio" name="featured" id="featured" value="1" checked>
                        Yes
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="featured" id="featured" value="0">
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
    $('input[type="radio"]').iCheck({
      radioClass: 'iradio_flat-red'
    });
    
    $("#tagInput").tagsInput({
     
     'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
     'width':'auto',
     'height':'auto',
     'removeWithBackspace' : true,
     'minChars' : 3,
     'maxChars' : 25,
     'defaultText':'Add',
     /*onChange: function() {
        var input = $(this).siblings('.tagsinput');
        var maxLen = 4;
      
        if( input.children('span.tag').length >= maxLen){
          input.children('div').hide();
        }
        else{
          input.children('div').show();
        }
      },*/
    });
  </script>

@endsection