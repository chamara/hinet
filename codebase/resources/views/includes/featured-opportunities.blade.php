<div class="posts" id="posts"> 
	<div class="row">
	@foreach ( $data as $key )
	@include('includes.list-startups')
	@endforeach
	</div>
</div>