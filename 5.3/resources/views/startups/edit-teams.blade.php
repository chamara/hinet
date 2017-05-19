<?php $settings = App\Models\AdminSettings::first(); 
$teams = $data->teams()->orderBy('id','desc')->paginate(20);
?>
@extends('app')

@section('title')Edit - Team @endsection

@section('content')
@include('includes.startup-dashboard')
<h1 class="margin-bottom-40">Team<span><a href="{{ url('edit/startup/teams/add',$data->id) }}" class="btn pull-right text-center btn-save custom-rounded">Add New</a></span></h1>
<div class="margin-top-40">
  <div class="table-responsive">
    <table class="table"> 
      <thead> 
        <tr>
          <th>Name</th>
          <th>Title</th>
          <th>Shareholding</th>
          <th>Delete</th>
        </tr>
      </thead> 

      <tbody> 
        @foreach( $teams as $team )
        <tr>
          <td>{{$team->name}}</td>
          <td>{{$team->title}}</td>
          <td>{{$team->shareholding}}%</td>
          <td><a href="{{ url('edit/startup/teams/delete/').'/'.$team->id }}" class="btn btn-danger actionDelete">Delete
          </a></td>
        </tr>
        @endforeach           
      </tbody> 
    </table>
  </div>
</div>




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
