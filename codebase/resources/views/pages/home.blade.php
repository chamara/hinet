<!-- Extend App -->
@extends('app') 

<!-- Page Title -->
@section('title') {{ $title }} @endsection

<!-- Content -->
@section('content') 

<!-- Jumbotron with page title -->
<div class="jumbotron md index-header jumbotron_set jumbotron-cover">
      <div class="container wrap-jumbotron position-relative">
        <h2 class="title-site">{{ $response->title }}</h2>
      </div>
</div>

<!-- Container -->
<div class="container margin-bottom-40">
  <div class="col-md-12">	 	
    <dl>
      <dd>
        <?php echo html_entity_decode($response->content) ?>
      </dd>
    </dl>	
  </div>
</div>
@endsection

