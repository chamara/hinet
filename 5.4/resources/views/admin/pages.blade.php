@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Pages ({{$data->count()}})
     <a href="{{ url('panel/admin/pages/create') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Post
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
    <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}	        
  </div>
  @endif
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"> 
            Posts
          </h3>
        </div>      
       <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
         <tbody>

          @if( $data->count() !=  0 )
          <tr>
            <th class="active">ID</th>
            <th class="active">Title</th>
            <th class="active">Slug</th>
            <th class="active">Actions</th>
          </tr>
          
          @foreach( $data as $page )
          <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->title }}</td>
            <td>{{ strtolower($page->slug) }}</td>
            <td>
             <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-success btn-xs padding-btn">
              Edit
            </a> 
            
            @if( $data->count() != 1 )
            
            {!! Form::open([
            'method' => 'DELETE',
            'route' => ['pages.destroy', $page->id],
            'id' => 'form'.$page->id,
            'class' => 'displayInline'
            ]) !!}
            {!! Form::submit('Delete', ['data-url' => $page->id, 'class' => 'btn btn-danger btn-xs padding-btn actionDelete']) !!}
            {!! Form::close() !!}
            
            @endif
            
          </td>
          
        </tr><!-- /.TR -->
        @endforeach
        
        @else
        <hr />
        <h3 class="text-center no-found">No Results</h3>
        @endif
        
      </tbody>
      
      
    </table>
  </div>
</div><!-- /.box -->
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
