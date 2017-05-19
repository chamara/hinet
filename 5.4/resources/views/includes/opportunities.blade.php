<div class="posts" id="posts"> 
	<div class="row">	
		@foreach ( $data as $key )
		@include('includes.list-startups')
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4">
		<div class="pull-right padding-20">{{ $data->links('vendor.pagination.default') }}</div>
		</div>
	</div>
</div>