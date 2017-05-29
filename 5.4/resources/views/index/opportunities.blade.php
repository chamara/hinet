<!-- Extend App -->
@extends('app')

<!--Page Title-->
@section('title')Opportunities - @endsection

<!-- Content Section -->
@section('content') 
<div class="banner-divider banner-green">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">Current Investment Opportunties</h1>
		<div class="text-center">
			@if(Auth::check())	
			@else
				@if ($settings->disable_startups_reg == 'no')		
					<a href="{{ url('/register/startup') }}" class="btn btn-lg btn-green custom-rounded">Learn How to Invest</a>
				@endif
			@endif
		</div>
	</div>
</div>

<!-- Container -->
<div class="container margin-top-40">
	<!-- Select Filter -->
	<h1>Investment Opportunities
		<span>
			<select class="select-filter" name="filter" onchange="location = this.value;">
				<option selected disabled>Choose Category</option> 
				<option value="opportunities">Show All</option> 
				@foreach(App\Models\Categories::where('mode','on')->orderBy('name')->get() as $category )
				@if($category->startups()->count() != 0) 
				<option value="opportunities/{{ $category->slug }}">{{ $category->name }} ({{$category->startups()->count()}})</option>
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