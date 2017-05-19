<?php  

$settings = App\Models\AdminSettings::first();

if ($response->goal <> 0 ){
  $percentage = round($response->investments()->sum('investment') / $response->goal * 100);
} else {
  $percentage = '0';
} 

if( $percentage > 100 ) {
  $percentage = 100;
} else {
  $percentage = $percentage;
}

	// All investments
$investments = $response->investments()->orderBy('id','desc')->paginate(2);

	// Updates
$updates = $response->updates()->orderBy('id','desc')->paginate(1);

if( str_slug( $response->title ) == '' ) {
  $slug_url  = '';
} else {
  $slug_url  = '/'.str_slug( $response->title );
}

?>
@extends('app')

@section('title'){{'Invest - '.$response->title.' - ' }}@endsection

@section('css')
<link href="{{ asset('public/plugins/iCheck/all.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="banner-divider banner-blue">
  <div class="banner-content">
    <h1 class="title-site margin-bottom-40">Invest</h1>
    <div class="text-center">
      <p class="subtitle-site"><strong>{{$response->title}}</strong></p>
    </div>
  </div>
</div>


<div class="container margin-bottom-40 margin-top-40 padding-top-40">
	
  <!-- Col MD -->
  <div class="col-md-8 margin-bottom-20"> 

    <!-- form start -->
    <form method="POST" action="{{ url('invest',$response->id) }}" enctype="multipart/form-data" id="forminvestment">
    	
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<input type="hidden" name="_id" value="{{ $response->id }}">

     <div class="form-group">
      <label>Enter your investment</label>
      <div class="input-group has-success">
        <div class="input-group-addon addon-dollar">{{$settings->currency_symbol}}</div>
        <input type="text" onkeyup="comma(this)" id="onlyNumber" class="form-control input-lg" name="amount" value="{{ old('investment') }}" placeholder="Minimum amount {{$settings->currency_symbol.$settings->min_investment_amount}} {{$settings->currency_code}}">
      </div>
    </div>


    <!-- Start -->
    <div class="form-group">
      <label>Full Name</label>
      <input type="text"  value="@if( Auth::check() ){{Auth::user()->name}}@endif" name="full_name" class="form-control input-lg" placeholder="First Name and Last Name">
    </div><!-- /. End-->

    <!-- Start -->
    <div class="form-group">
      <label>Email</label>
      <input type="text"  value="@if( Auth::check() ){{Auth::user()->email}}@endif" name="email" class="form-control input-lg" placeholder="email@example.com">
    </div><!-- /. End-->

    <div class="row form-group">    
      <!-- Start -->
      <div class="col-xs-6">
        <label>Country</label>
        <select name="country" class="form-control input-lg" >
          <option value="">Select One</option>
          @foreach(  App\Models\Countries::orderBy('country_name')->get() as $country ) 	
          <option @if( Auth::check() && Auth::user()->countries_id == $country->id ) selected="selected" @endif value="{{$country->country_name}}">{{ $country->country_name }}</option>
          @endforeach
        </select>
      </div><!-- /. End-->

      <!-- Start -->
      <div class="col-xs-6">
        <label>Postal Code</label>
        <input type="text"  value="{{ old('postal_code') }}" name="postal_code" class="form-control input-lg" placeholder="Postal Code">
      </div><!-- /. End-->

    </div><!-- row form-control -->

    <!-- Start -->
    <div class="form-group">
      <input type="text" value="{{ old('comment') }}" name="comment" class="form-control input-lg" placeholder="Add a brief comment (optional)">
    </div><!-- /. End-->

    <div class="form-group checkbox icheck">
      <label class="margin-zero">
       <input class="no-show" name="anonymous" type="checkbox" value="1">
       <span class="margin-lft5 keep-login-title">Make investment anonymous?</span>
     </label>
   </div>                    
   <!-- Alert -->
   <div class="alert alert-danger display-none" id="errorinvestment">
     <ul class="list-unstyled" id="showErrorsinvestment"></ul>
   </div><!-- Alert -->

   <div class="box-footer text-center">
     <hr />
     <button type="submit" id="buttoninvestment" class="btn-padding-custom btn btn-lg btn-main custom-rounded">Invest</button>
     <div class="btn-block text-center margin-top-20">
      <a href="{{url('startup',$response->id)}}" class="text-muted">
        <i class="fa fa-long-arrow-left"></i>Back</a>
      </div>
    </div>

  </form>

</div><!-- /COL MD -->

<div class="col-md-4">
  <div class="thumbnail-holder">
    <div class="thumbnail padding-top-zero">
      <a href="javascript:history.back()"></a>
      <div class="thumnail-cover" style="background-image: url('{{ asset('public/startups/cover').'/'.$response->cover }}');"></div>


      <div class="caption">
        <p class="pull-right">
          <img src="{{ asset('public/startups/logo').'/'.$response->logo }}" width="80" height="80" class="avatar-startup" />
        </p>

        <h1 class="title-startups">
          <div title="{{ e($response->title) }}">
            {{ e($response->title) }}
          </div>
        </h1>

        <p class="min-height-55">
          {{ str_limit(strip_tags($response->oneliner),130,'...') }}
        </p>

        <p>
          <span class="stats-startups">
            <span class="pull-left">
              {{$settings->currency_symbol.number_format($response->investments()->sum('investment'))}}
              Raised
            </span> 
            <span class="pull-right">{{$percentage }}%</span> 
          </span>

          <span class="progress">
            <span class="percentage" style="width: {{$percentage }}%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
          </span>
        </p>
      </div>
    </div>
  </div>
</div>

</div>

@endsection

@section('javascript')
<script src="https://checkout.stripe.com/checkout.js"></script>
<script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}"></script>

<script type="text/javascript">

  function comma(input)
  {
    var nStr = input.value + '';
    nStr = nStr.replace( /\,/g, "");
    var x = nStr.split( '.' );
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while ( rgx.test(x1) ) {
      x1 = x1.replace( rgx, '$1' + ',' + '$2' );
    }
    input.value = x1 + x2;
  }

  $('#forminvestment').on('submit', function() {
    var input = $('#onlyNumber');
    input.val(input.val().replace(/,/g, ''));
  });


  $('#onlyNumber').focus();

  $(document).ready(function() {

   $("#onlyNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
             (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
             (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });


   $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
	    increaseArea: '20%' // optional
	  });

 });
</script>
@endsection
