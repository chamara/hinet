  <!--Extend Admin-->
  @extends('admin.layout')

  <!--Content Section--> 
  @section('content')

  <!--Wrapper-->
  <div class="content-wrapper">
    
    <!--Header-->
    <section class="content-header">
      <h4>Admin 
        <i class="fa fa-angle-right margin-separator"></i> Categories
        <i class="fa fa-angle-right margin-separator"></i> Add New
      </h4>
    </section>

    <!--Main content-->
    <section class="content">
      <div class="content">
        <div class="row">

          <!--Admin box-->
          <div class="box startups">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Category</h3>
            </div>
            
            <!--Form Start-->
            <form class="form-horizontal" method="post" action="{{ url('panel/admin/categories/add') }}" enctype="multipart/form-data">
             
              <!--CSRF Token-->        
              <input type="hidden" name="_token" value="{{ csrf_token() }}">	

              <!--Include Form Errors-->
              @include('errors.errors-forms')
              
              <!--Category Name-->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name">
                  </div>
                </div>
              </div>
              
              <!--Category Slug-->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Slug</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ old('slug') }}" name="slug" class="form-control" placeholder="Slug">
                  </div>
                </div>
              </div>
              
              <!--Category Thumbnail-->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Thumbnail (Optional)</label>
                  <div class="col-sm-10">

                    <!--Thumbnail Upload-->  
                    <div class="btn btn-info box-file">
                      <input type="file" accept="image/*" name="thumbnail" />
                      <i class="glyphicon glyphicon-cloud-upload myicon-right"></i> Upload
                    </div>
                    
                    <!--Thumbnail Delete--> 
                    <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
                      <i class="glyphicon glyphicon-paperclip myicon-right"></i>
                      <small class="myicon-right file-name-file"></small> 
                      <i class="icon-cancel-circle delete-attach-file-2 pull-right" title="Delete"></i>
                    </div>
                  </div>
                </div>
              </div>
              
              
              <div class="box-footer">
                <a href="{{ url('panel/admin/categories') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              
            </form>
          </div>			        		
        </div>
      </div>
    </section>
  </div>
  @endsection
