@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
       Admin<i class="fa fa-angle-right margin-separator"></i>Picklists<i class="fa fa-angle-right margin-separator"></i>Tax-Reliefs
       <a href="{{ url('panel/admin/categories/add') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Status
       </a>
     </h4>
    </section>

  <!-- Main content -->
  <section class="content">

    @if(Session::has('success_message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      {{ Session::get('success_message') }}
    </div>
    @endif

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              Statuses
            </h3>
          </div>
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                @if( $totalCategories !=  0 )
                <tr>
                  <th class='active'>ID</th>
                  <th class='active'>Name</th>
                  <th class='active'>Actions</th>
                  <th class='active'>Status</th>
                </tr>

                @foreach( $categories as $category )
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <a href="{{ url('panel/admin/categories/edit/').'/'.$category->id }}" class="btn btn-success btn-xs padding-btn">
                      Edit
                    </a>

                    <a href="javascript:void(0);" data-url="{{ url('panel/admin/categories/delete/').'/'.$category->id }}" class="btn btn-danger btn-xs padding-btn actionDelete">
                      Delete
                    </a>

                  </td>
                  <?php if( $category->mode == 'on' ) {
                    $mode = 'success';
                  } else {
                    $mode = 'danger';
                  } ?>
                  <td><span class="label label-{{$mode}}">{{ ucfirst($category->mode) }}</span></td>
                </tr><!-- /.TR -->
                @endforeach

                @else
                <hr />
                <h3 class="text-center no-found">No Results Founds</h3>
                @endif

              </tbody>
            </table>
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
    var url     = element.attr('data-url');

    element.blur();

    swal(
      {   title: "Delete",  
      text: "Delete Tax-Relief?",  
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
        window.location.href = url;
      }
    });
  });
</script>
@endsection