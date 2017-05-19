<?php  
// ** Data User logged ** //
$user = Auth::user();
$settings = App\Models\AdminSettings::first();

$data = App\Models\investments::leftJoin('startups', function($join) {
  $join->on('investments.startups_id', '=', 'startups.id');
})
->where('investments.user_id',Auth::user()->id)
->select('investments.*')
->addSelect('startups.title')
->addSelect('startups.logo')
->addSelect('startups.valuation')
->orderBy('investments.id','DESC')
->paginate(20);
?>
@extends('app')

@section('title') Portfolio - @endsection

@section('content')
@include('includes.investor-dashboard')

<h1 class="margin-bottom-40">Portfolio</h1>
<div class="table-responsive">
  <table class="table table-striped"> 

    @if( $data->total() !=  0 && $data->count() != 0 )
    <thead> 
      <tr>
        <th>My Investments</th>
        <th>Invested</th>
        <th>Startup Valuation</th>
        <th>Performance</th>
      </tr>
    </thead> 

    <tbody> 
      @foreach( $data as $investment )
      <tr>
        <td><img src="{{url('public/startups/logo',$investment->logo)}}" width="50px" height="50px">&emsp;{{$investment->title}}</td>
        <td>{{ $settings->currency_symbol.number_format($investment->investment) }}</td>
        <td>{{ $settings->currency_symbol.number_format($investment->valuation) }}</td>

        <!-- Example of performacnce - Calculation to be added -->
        <td class="uplift">+5%</td>
      </tr><!-- /.TR -->
      @endforeach

      @else
      <hr />
      <h3 class="text-center no-found">No invesments made.</h3>

      @endif   		  		 		
    </tbody> 
  </table>
</div>
@include('includes.dashboard-end')
@endsection

