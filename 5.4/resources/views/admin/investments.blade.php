@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
     Admin<i class="fa fa-angle-right margin-separator"></i>Investments ({{$data->total()}})
     <a href="{{ url('panel/admin/investment/add') }}" class="btn btn-sm btn-success no-shadow pull-right"><i class="glyphicon glyphicon-plus myicon-right"></i> Add Offline Investment
     </a>
   </h4>

 </section>
 <!-- Main content -->
 <section class="content">

   <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"> 
            Investments                 		
          </h3>
        </div>

        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
           <tbody>

            @if( $data->total() !=  0 && $data->count() != 0 )
            <tr>
              <th class="active">ID</th>
              <th class="active">Full Name</th>
              <th class="active">Startups</th>
              <th class="active">Email</th>
              <th class="active">Investment</th>
              <th class="active">Date</th>
              <th class="active">Actions</th>
            </tr><!-- /.TR -->

            @foreach( $data as $investment )
            <tr>
              <td>{{ $investment->id }}</td>
              <td>{{ $investment->fullname }}</td>
              <td><a href="{{url('startup',$investment->startups_id)}}" target="_blank">{{ str_limit($investment->startups()->title, 10, '...') }} <i class="fa fa-external-link-square"></i></a></td>
              <td>{{ $investment->email }}</td>
              <td>{{ $settings->currency_symbol.number_format($investment->investment) }}</td>
              <td>{{ date('d M, y', strtotime($investment->created_at)) }}</td>
              <td> <a href="{{ url('panel/admin/investments',$investment->id) }}" class="btn btn-success btn-xs padding-btn">
                View
              </a> </td>
            </tr><!-- /.TR -->
            @endforeach

            @else
            <hr />
            <h3 class="text-center no-found">No Results Found</h3>

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