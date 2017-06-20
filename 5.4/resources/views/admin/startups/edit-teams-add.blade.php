<?php $settings = App\Models\AdminSettings::first(); 
$documents = $data->documents()->orderBy('id','desc')->paginate(20);
?>
@extends('app')

@section('title') Add Team Member - @endsection

@section('content')
@include('includes.startup-dashboard')
<h1 class="margin-bottom-40">Add Team Member</h1>

<form method="POST" action="" enctype="multipart/form-data" id="formUpdate">  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $data->id }}">

  <div class="form-group">
    <label>Full Name</label>
    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="John Smith">
  </div>

  <div class="form-group">
    <label>Avatar</label>
    <input type="file" name="avatar" id="avatar" class="form-control input-lg">
  </div>

  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Co-Founder">
  </div>

  <div class="form-group">
    <label>Shareholding</label>
    <div class="input-group">
      <div class="input-group-addon">%</div>
      <input type="number" step='0.01' max="100" class="form-control input-lg" name="shareholding" id="equity" placeholder="10.0">
    </div>
  </div>

  <div class="form-group">
    <label>Email Address</label>
    <input type="text" name="email" id="email" class="form-control input-lg" placeholder="someone@example.com">
  </div>

  <div class="form-group">
    <label>Linkedin</label>
    <input type="text" name="linkedin" id="linkedin" class="form-control input-lg" placeholder="http://www.linkedin.com">
  </div>

  <div class="form-group">
    <label>Bio</label>
    <textarea name="bio" data-limit=300 rows="5" id="bio" class="form-control input-lg" placeholder="Short bio"></textarea><span class="pull-right" id="textarea_feedback"></span>
  </div>

  <div class="box-footer">
    <hr/>
    <!-- Alert -->
    <div class="alert alert-success display-none" id="successAlert">
      <ul class="list-unstyled" id="success_update">
        <li>Team Member Added</li>
      </ul>
    </div>
    <button type="submit" id="buttonFormUpdate" class="btn btn-save custom-rounded">Save</button>
  </div>          
</form>
@include('includes.dashboard-end')
@endsection


@section('javascript')
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
