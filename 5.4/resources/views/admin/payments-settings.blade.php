@extends('admin.layout') 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Admin
      <i class="fa fa-angle-right margin-separator"></i>Payment Settings
    </h4>
  </section>

  <!-- Main content -->
  <section class="content">
    @if(Session::has('success_message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}
      </div>
    @endif

    <div class="content">
      <div class="row">
        <div class="col-md-9">
         <div class="box Startups">
          <div class="box-header with-border">
            <h3 class="box-title">Payment Settings</h3>
          </div>

            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{ url('panel/admin/payments') }}" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">	

              @include('errors.errors-forms')


              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Currency</label>
                  <div class="col-sm-10">
                    <select name="currency_code" id="currency_code" class="form-control" required>
                      <option @if( $settings->currency_code == 'USD' ) selected="selected" @endif value="USD">USD</option>
                      <option @if( $settings->currency_code == 'EUR' ) selected="selected" @endif  value="EUR">EUR</option>
                      <option @if( $settings->currency_code == 'GBP' ) selected="selected" @endif value="GBP">GBP</option>
                    </select>
                  </div>
                </div>
              </div>

            <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Investment Fee</label>
                <div class="col-sm-10">
                  <select name="fee_investment" id="fee_investment" class="form-control" required>
                    <option @if( $settings->fee_investment == '1' ) selected="selected" @endif value="1">1%</option>
                    <option @if( $settings->fee_investment == '2' ) selected="selected" @endif value="2">2%</option>
                    <option @if( $settings->fee_investment == '3' ) selected="selected" @endif  value="3">3%</option>
                    <option @if( $settings->fee_investment == '4' ) selected="selected" @endif value="4">4%</option>
                    <option @if( $settings->fee_investment == '5' ) selected="selected" @endif value="5">5%</option>

                    <option @if( $settings->fee_investment == '6' ) selected="selected" @endif value="6">6%</option>
                    <option @if( $settings->fee_investment == '7' ) selected="selected" @endif value="7">7%</option>
                    <option @if( $settings->fee_investment == '8' ) selected="selected" @endif value="8">8%</option>
                    <option @if( $settings->fee_investment == '9' ) selected="selected" @endif value="9">9%</option>

                    <option @if( $settings->fee_investment == '10' ) selected="selected" @endif value="10">10%</option>
                    <option @if( $settings->fee_investment == '15' ) selected="selected" @endif value="15">15%</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="box Startups">
              <div class="box-header">
                <h3 class="box-title">Stripe</h3>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Stripe Secret Key</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $settings->stripe_secret_key }}" id="stripe_secret_key" name="stripe_secret_key" class="form-control" required>
                    <p class="help-block"><a href="https://stripe.com/dashboard" target="_blank">https://stripe.com/dashboard</a></p>
                  </div>
                </div>
              </div>

              <!-- Start Box Body -->
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Stripe Publishable Key</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $settings->stripe_public_key }}" id="stripe_public_key" name="stripe_public_key" class="form-control" required>
                    <p class="help-block"><a href="https://stripe.com/dashboard" target="_blank">https://stripe.com/dashboard</a></p>
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <a href="{{ url('panel/admin') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
</section>
</div>
@endsection

@section('javascript')