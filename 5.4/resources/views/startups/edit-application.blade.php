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
    <select name="tax" class="form-control input-lg">
      <option value="">Select One</option>
      @foreach( App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get() as $taxreliefstatus )
        <option value="{{$taxreliefstatus->id}}">{{ $taxreliefstatus->status }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Describe the problem you are solving?</label>
    <textarea name="problem" data-limit=300 rows="5" id="problem" class="form-control input-lg" placeholder="Problem">{{ $data->problem}}</textarea>
    <span class="pull-right"  id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>How does your product/service solve this problem?</label>
    <textarea name="solution" data-limit=300 rows="5" id="solution" class="form-control input-lg" placeholder="Solution">{{ $data->solution }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>Who is your target market?</label>
    <textarea name="market" data-limit=300 rows="5" id="market" class="form-control input-lg" placeholder="Target Market">{{ $data->market }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>What is your business model?</label>
    <textarea name="model" data-limit=300 rows="5" id="model" class="form-control input-lg" placeholder="Business Model">{{ $data->model }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>What is your current traction?</label>
    <textarea name="traction" data-limit=300 rows="5" id="traction" class="form-control input-lg" placeholder="Traction">{{ $data->traction }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>Who are your main competitors?</label>
    <textarea name="competitors" data-limit=300 rows="5" id="competitors" class="form-control input-lg" placeholder="Competitors">{{ $data->competitors }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>Provide a management team summary</label>
    <textarea name="team" data-limit=300 rows="5" id="team" class="form-control input-lg" placeholder="Team">{{ $data->team }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>Please provide a breakdown of use of funds</label>
    <textarea name="spend" data-limit=300 rows="5" id="spend" class="form-control input-lg" placeholder="Spend">{{ $data->spend }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>



  <div class="form-group">
    <label>What are your key strengths?</label>
    <textarea name="strengths" data-limit=300 rows="5" id="strengths" class="form-control input-lg" placeholder="Strengths">{{ $data->strengths }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>What are your biggest weaknesses?</label>
    <textarea name="weaknesses" data-limit=300 rows="5" id="weaknesses" class="form-control input-lg" placeholder="Weaknesses">{{ $data->weaknesses }}</textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="form-group">
    <label>Why did you start the company? What excites you about it?</label>
    <textarea name="why" data-limit=300 rows="5" id="why" class="form-control input-lg" placeholder="Why?">{{ $data->why }}</textarea><span class="pull-right" id="textarea_feedback"></span>
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
