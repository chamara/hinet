<!-- Extend App -->
@extends('app')

@section('title'){{ $category->name.' - ' }}@endsection

<!-- Content Section -->
@section('content') 
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Current Investment Opportunties</h1>
		<div class="text-center">
			<a href="{{ url('/register/startup') }}" class="btn btn-lg btn-green custom-rounded">Learn How to Invest</a>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container margin-top-40">
	<!-- Select Filter -->
	<h1>{{ $category->name.' - ' }} Opportunities
		<span>
			<select class="select-filter" name="filter" onchange="location = this.value;">
				<option selected disabled>{{$category->name}}</option> 
				<option value="/opportunities">Show All</option> 
				@foreach(App\Models\Categories::where('mode','on')->orderBy('name')->get() as $category )
				@if($category->startups()->count() != 0) 
				<option value="./{{ $category->slug }}">{{ $category->name }} ({{$category->startups()->count()}})</option>
				@endif
				@endforeach
			</select>
		</span>
	</h1>

	<!-- Featured Opportunities -->
	<div class="margin-bottom-40">
		@include('includes.opportunities')
	</div>
</div>
@endsection