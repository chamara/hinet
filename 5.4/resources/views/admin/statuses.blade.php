@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
       Admin<i class="fa fa-angle-right margin-separator"></i>Picklists<i class="fa fa-angle-right margin-separator"></i>Statuses
       <a href="{{ url('panel/admin/statuses/add') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Status
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

                <tr>
                  <th class='active'>ID</th>
                  <th class='active'>Status</th>
                  <th class='active'>Table</th>
                  <th class='active'>Mode</th>
                  <th class='active'>Actions</th>
                </tr>

                @foreach( $data as $status )
                <tr>
                  <td>{{ $status->id }}</td>
                  <td>{{ $status->status }}</td>
                  <td>{{ $status->table }}</td>
                  <?php if( $status->mode == 'on' ) {
                    $mode = 'success';
                  } else {
                    $mode = 'danger';
                  } ?>
                  <td><span class="label label-{{$mode}}">{{ ucfirst($status->mode) }}</span></td>                  
                  <td>
                    <a href="{{ url('panel/admin/statuses/edit/').'/'.$status->id }}" class="btn btn-success btn-xs padding-btn">
                      Edit
                    </a> 
                    <a href="javascript:void(0);" data-url="{{ url('panel/admin/statuses/delete/').'/'.$status->id }}" class="btn btn-danger btn-xs padding-btn actionDelete">
                      Delete
                    </a>
                  </td>
                </tr><!-- /.TR -->
                @endforeach

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
      text: "Delete Status?",  
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
