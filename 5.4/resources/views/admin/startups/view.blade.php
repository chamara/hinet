<?php 
$settings = App\Models\AdminSettings::first();

// Set percentage of target investment
if ($response->goal <> 0 ){
	$percentage = round($response->investments()->sum('investment') / $response->goal * 100);
} else {
	$percentage = '0';
} 

// Dcouments
$documents = $response->documents()->orderBy('id')->paginate(20);

// Team
$teams = $response->teams()->orderBy('id')->paginate(20);

// All investments
$investments = $response->investments()->orderBy('id','desc')->paginate(10);

// Slashes and spaces in URL
if( str_slug( $response->title ) == '' ) {
	$slug_url  = '';
} else {
	$slug_url  = '/'.str_slug( $response->title );
}
?>

<!-- Extend App Layout -->
@extends('app')

<!-- Page Title -->
@section('title'){{ $response->title.' - ' }}@endsection

<!-- Page Specific Meta Data and CSS for SEO -->
@section('css')
<link rel="canonical" href="{{url("startup/$response->id").'/'.str_slug($response->title)}}"/>
<!-- Open Graph Data -->
<meta property="og:site_name" content="{{$settings->title}}"/>
<meta property="og:url" content="{{url("startup/$response->id").'/'.str_slug($response->title)}}"/>
<meta property="og:image" content="{{url('public/startups/cover',$response->cover)}}"/>
<meta property="og:title" content="{{ $response->title }}"/>
<meta property="og:description" content="{{ str_limit($response->description, 200, '...') }}"/>
<!-- Twitter Data -->
<meta name="twitter:image" content="{{url('public/startups/cover',$response->cover)}}" />
<meta name="twitter:title" content="{{ $response->title }}" />
<meta name="twitter:description" content="{{ str_limit($response->description, 200, '...') }}"/>
@endsection

<!-- Content -->
@section('content')
@if( Auth::check() && Auth::user()->id != $response->user()->id && Auth::user()->role == 'startup') 
<p> Blocked</p>
@else
<!-- Cover Photo -->
<!-- <div class="coverStartup" style="background-image: url('{{ asset('public/startups/cover').'/'.$response->cover }}');"></div> -->

<div class="banner-divider banner-blue">
	<div class="banner-content">
		<h1 class="title-site margin-bottom-40">{{$response->title}} - Startup Funding Club</h1>
	</div>
</div>


<!-- Container -->
<div class="container margin-bottom-40 padding-top-40">
	<div class="startup-sidebar">
		<div class="row">
			<div class="col-md-3">
				<div class="media-center margin-bottom-5">
					<img class="img-inline center-block" src="{{url('public/startups/logo',$response->logo)}}" width="120" height="120" >
					<ul class="list-inline margin-top-20">
						@if( $response->twitter != '' ) 
						<li><a target="_blank" href="{{$response->twitter}}" class="ico-social"><i class="fa fa-twitter"></i></a></li>
						@endif

						@if( $response->facebook != '' )   
						<li><a target="_blank" href="{{$response->facebook}}" class="ico-social"><i class="fa fa-facebook"></i></a></li>
						@endif

						@if( $response->linkedin != '' )   
						<li><a target="_blank" href="{{$response->linkedin}}" class="ico-social"><i class="fa fa-linkedin"></i></a></li>
						@endif
					</ul >
				</div>
			</div>
			<div class="col-md-4 border-right">
				<p class="">{{$response->oneliner}}</p>
				<p class="margin-top-20">{{$response->location}}</p>
				<p class="website margin-top-20"><a href="{{$response->website}}" target="_blank">{{$response->website}}</a></p>
			</div>

			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						<p>INVESTMENT SOUGHT:</p>
						<h3><strong>{{$settings->currency_symbol.number_format($response->goal)}}</strong></h3>
					</div>
					<div class="col-md-6">
						<p>EQUITY OFFERED:</p>
						<h3><strong>{{$response->equity}}%</strong></h3>
					</div>
				</div>

				<span class="progress-view margin-top-10 margin-bottom-10">
					<span class="percentage-view" style="width: {{$percentage }}%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
				</span>
				<small class="btn-block margin-bottom-10 text-muted">
					{{$percentage }}% Raised by {{number_format($response->investments()->count())}} Investments
				</small>

				<!-- Invest Button -->

				<a href="{{url('invest/'.$response->id.$slug_url)}}" class="btn btn-main custom-rounded">Invest</a>
				
				<!-- Invest Button -->
				
				<a href="{{url('invest/'.$response->id.$slug_url)}}" class="btn btn-save custom-rounded">Request a meeting</a>

			</div>
		</div>
	</div>


	
	<div class="startup-sidebar margin-top-40">
		<div class="row">
			<div class="col-md-3">
				<ul class="startup-navigation margin-bottom-40">
					<li class="active"><a href="#application" role="tab" data-toggle="tab">Application</a></li>
					@if( $response->video != '' )
					<li><a href="#video" role="tab" data-toggle="tab">Video</a></li>
					@endif
					<li><a href="#documents" role="tab" data-toggle="tab">Documents</a></li>
					<li><a href="#team" role="tab" data-toggle="tab">Team</a></li>
					<li><a href="#investors" role="tab" data-toggle="tab">Investors</a></li>
				</ul>
			</div>


			<div class="col-md-9 border-left">
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane fade in active"id="application">
						@include('includes.startup-application')
					</div>

					@if( $response->video != '' )	
					<div role="tabpanel" class="tab-pane fade in"id="video">
						<iframe width="100%" height="400" src="{{$response->video}}" frameborder="0" allowfullscreen></iframe>
					</div>
					@endif

					@if( $documents->total() !=  0)
					<div role="tabpanel" class="tab-pane fade in"id="documents">
						@include('includes.startup-documents')
					</div>
					@endif

					<div role="tabpanel" class="tab-pane fade in"id="team">
						@include('includes.startup-team')
					</div>

					<div role="tabpanel" class="tab-pane fade in"id="investors">
						@foreach( $investments as $investment )
						<?php 
						$letter = str_slug(mb_substr( $investment->fullname, 0, 1,'UTF8')); 
						if( $letter == '' ) {
							$letter = 'N/A';
						} 
						if( $investment->anonymous == 1 ) {
							$letter = 'N/A';
							$investment->fullname = 'Anonymous';
						}
						?>
						@include('includes.listing-investments')
						@endforeach
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
@endif
@endsection
@php session()->forget('investment_cancel') @endphp
@php session()->forget('investment_success') @endphp