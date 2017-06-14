@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Startups<i class="fa fa-angle-right margin-separator"></i>Startup Profiles ({{$data->total()}})
     <a href="{{ url('panel/admin/startup/add') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Startup
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
      <i class="fa fa-check margin-separator"></i>  {{ Session::get('success_message') }}	        
    </div>
    @endif

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Startups</h3>
            <div class="box-tools">

              @if( $data->total() !=  0 )   
              <!-- form -->
              <form role="search" autocomplete="off" action="{{ url('panel/admin/startups') }}" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="q" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form><!-- form -->
              @endif

            </div>
          </div>


          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>

                @if( $data->total() !=  0 && $data->count() != 0 )
                <tr>
                  <th class="active">ID</th>
                  <th class="active">Title</th>
                  <th class="active">Member</th>
                  <th class="active">Investment Sought</th>
                  <th class="active">Funds Raised</th>
                  <th class="active">Status</th>
                  <th class="active">Date Added</th>
                  <th class="active">Actions</th>
                </tr>

                @foreach( $data as $startup )
                <tr>
                  <td>{{ $startup->id }}</td>
                  <td><img src="{{asset('public/startups/logo').'/'.$startup->logo}}" width="20" /> 
                    <a title="{{$startup->title}}" href="{{ url('startup',$startup->id) }}" target="_blank">{{ str_limit($startup->title,20,'...') }} <i class="fa fa-external-link-square"></i></a>
                  </td>
                  <td>{{ $startup->user()->name }}</td>
                  <td>{{ $settings->currency_symbol.number_format($startup->goal) }}</td>
                  <td>{{ $settings->currency_symbol.number_format($startup->investments()->sum('investment')) }}</td>
                  <td>
                    @if( $startup->status == 'active' && $startup->finalized == 0 )
                      <span class="label label-success">Active</span>
                    @elseif( $startup->status == 'pending' && $startup->finalized == 0 )
                      <span class="label label-warning">Pending</span>
                    @else
                      <span class="label label-default">Finalized</span>
                    @endif
                  </td>
                  <td>{{ date('d M, y', strtotime($startup->created_at)) }}</td>
                  <td> <a href="{{ url('panel/admin/startups/edit',$startup->id) }}" class="btn btn-success btn-xs padding-btn">
                    Edit
                  </a> </td>
                </tr>
                @endforeach

                @else
                  <hr />
                  <h3 class="text-center no-found">No Results Found</h3>

                  @if( isset( $query ) )
                    <div class="col-md-12 text-center padding-bottom-15">
                      <a href="{{url('panel/admin/startups')}}" class="btn btn-sm btn-danger">Back</a>
                    </div>
                  @endif
                @endif

              </tbody>

            </table>

          </div>
        </div><!-- /.box -->
        @if( $data->lastPage() > 1 )
        {{ $data->links() }}
        @endif
      </div>
    </div>
  </section>
</div>
@endsection