@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
       Admin<i class="fa fa-angle-right margin-separator"></i>Startups<i class="fa fa-angle-right margin-separator"></i>Maintain Questions ({{ $data->total() }})
       @if ( $data->count() < $settings->max_startup_questions )
         <a href="{{ url('panel/admin/questions/add') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Question
         </a>
       @else
         <a href="#" class="btn btn-sm btn-success disabled no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Question</a>
       @endif
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
              Questions
            </h3>
          </div>        
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                <tr>
                  <th class='active'>ID</th>
                  <th class='active'>Question</th>
                  <th class='active'>Actions</th>
                </tr>

                @foreach( $data as $question )
                <tr>
                  <td>{{ $question->id }}</td>
                  <td>{{ $question->question }}</td>
                  <td>
                    <div id="delete" data-field-id="Question">
                      <a href="{{ url('panel/admin/questions/edit/').'/'.$question->id }}" class="btn btn-success btn-xs padding-btn">
                        Edit
                      </a> 
                      <a href="javascript:void(0);" data-url="{{ url('panel/admin/questions/delete/').'/'.$question->id }}" class="btn btn-danger btn-xs padding-btn actionDelete">
                        Delete
                      </a>
                    </div>
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

<!-- Include Javascript -->
@include('includes.javascript-admin-delete')

@endsection