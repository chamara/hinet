<?php $settings = App\Models\AdminSettings::first(); ?>
@extends('app')

@section('title')Edit Application - @endsection

@section('content')
@include('includes.startup-dashboard')

<h1 class="margin-bottom-40">Funding Application</h1>
<form method="POST" action="" enctype="multipart/form-data" id="formUpdate">  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $data->id }}">

  <div class="form-group">
    <label>Investment Sought</label>
    <div class="input-group has-success">
      <div class="input-group-addon">{{$settings->currency_symbol}}</div>
      <input type="number" min="1" class="form-control input-lg" name="goal" id="goal" value="{{ $data->goal }}" placeholder="10000">
    </div>
  </div>

  <div class="form-group">
    <label>Equity Offered</label>
    <div class="input-group">
      <div class="input-group-addon">%</div>
      <input type="number" step='0.01' max="100" class="form-control input-lg" name="equity" id="equity" value="{{ $data->equity }}" placeholder="10.0">
    </div>
  </div>

  <div class="form-group">
    <label>Pre-Money Valuation</label>
    <div class="input-group">
      <div class="input-group-addon">{{$settings->currency_symbol}}</div>
      <input type="number" readonly step='0' class="form-control input-lg" name="valuation" id="valuation" placeholder="10000">
    </div>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Tax Relief</label>
      <select name="tax" id="tax" class="form-control input-lg" required>
        <option value="">Select One</option>
        @foreach( App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get() as $taxreliefstatus )
          <option @if ( $taxreliefstatus->status == $data->tax ) selected="selected" @endif value="{{$taxreliefstatus->status}}">{{ $taxreliefstatus->status }}</option>
        @endforeach
      </select>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    @foreach( App\Models\Questions::where('mode','on')->orderBy('id')->get() as $question )
      <div id="TextBoxDiv{{ $loop->iteration }}">
        <label>{{ $question->$question }}</label>
        <div >
          <textarea data-limit="300" rows="5" name="response_{{ $loop->iteration }}" id="response_{{ $loop->iteration }}" placeholder="Response" class="form-control input-lg">{{ $data->$response }}</textarea>
        </div>
      </div>
      <p></p>
    @endfor
  </div>

  <div class="box-footer">
    <hr />
    <!-- Alert -->
    <div class="alert alert-success display-none" id="successAlert">
      <ul class="list-unstyled" id="success_update">
        <li>Saved!</li>
      </ul>
    </div><!-- Alert -->
    <button type="submit" id="buttonFormUpdate" class="btn btn-save custom-rounded">Save</button>
  </div>           
</form>
@include('includes.dashboard-end')

@endsection

@section('javascript')

<!-- Calculate Valuation Fuction -->
<script type="text/javascript">
  function calculateValuation(){
    var goal = document.getElementById('goal').value;
    var equity = document.getElementById('equity').value;
    goal = isNaN(goal) ? 0 : goal;
    equity = isNaN(equity) ? 0 : equity;
    var valuation = Math.round(equity > 0 ? goal / (equity/100)-goal: NaN);
    document.getElementById('valuation').value = isNaN(valuation) ? 0 : valuation;
  }
  setInterval(function(){
    calculateValuation();
  }, 100);
</script>

<!-- Limit Textarea Function -->
<script type="text/javascript">
  $(document).ready(function () {
    $('textarea').on("propertychange keyup input paste",

      function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
          $(this).val($(this).val().substring(0, limit));
        }
        $(this).next('span').text(remainingChars<=0?0:remainingChars);
      });
  });
</script>
@endsection
