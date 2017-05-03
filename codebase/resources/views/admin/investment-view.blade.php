@extends('admin.layout') 

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>Admin
			<i class="fa fa-angle-right margin-separator"></i>Investment #{{$data->id}}
		</h4>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<div class="box-body">
						<dl class="dl-horizontal">

							<!-- start -->
							<dt>ID</dt>
							<dd>{{$data->id}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Full Name</dt>
							<dd>{{$data->fullname}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Startup</dt>
							<dd><a href="{{url('startup',$data->startups()->id)}}" target="_blank">{{ $data->startups()->title }} <i class="fa fa-external-link-square"></i></a></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Email</dt>
							<dd>{{$data->email}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Investment</dt>
							<dd><strong class="text-success">{{$settings->currency_symbol.number_format($data->investment)}}</strong></dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Country</dt>
							<dd>{{$data->country}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Postal Code</dt>
							<dd>{{$data->postal_code}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Payment Gateway</dt>
							<dd>{{$data->payment_gateway}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Comment</dt>
							<dd>
								@if( $data->comment != '' )
								{{$data->comment}}
								@else
								-------------------------------------
								@endif
							</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Date</dt>
							<dd>{{date('d M, y', strtotime($data->date))}}</dd>
							<!-- ./end -->

							<!-- start -->
							<dt>Anonymous</dt>
							<dd>
								@if( $data->anonymous == '1' )
								Yes
								@else
								No
								@endif
							</dd>
							<!-- ./end -->

						</dl>
					</div><!-- box body -->

					<div class="box-footer">
						<a href="{{ url('panel/admin/investments') }}" class="btn btn-default">Back</a>
					</div>

				</div><!-- box -->
			</div><!-- col -->
		</div><!-- row -->

		

	</section>
</div>
@endsection
