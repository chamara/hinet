@extends('app') 

@section('title')Categories - @endsection

@section('content') 
<div class="container margin-bottom-40 margin-top-40">
	
	@foreach ($data as $category)
	@include('includes.categories-listing')
	@endforeach

</div>
@endsection

