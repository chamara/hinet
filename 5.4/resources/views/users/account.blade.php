<?php  
$user = Auth::user();

if($user->role == 'startup'){
  $data = App\Models\Startups::where('user_id',Auth::user()->id)->firstOrFail();
}
?>

@extends('app')
@section('title')Account- @endsection

@section('content')
@if( $user->role == 'startup') 
@include('includes.startup-dashboard')
@elseif( $user->role == 'investor') 
@include('includes.investor-dashboard')
@else( $user->role == 'admin')
@include('includes.admin-dashboard')
@endif

@if (session('notification'))
<div class="alert alert-success btn-sm alert-fonts" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ session('notification') }}
</div>
@endif
<h1 class="margin-bottom-40">Accounts</h1>
<form action="{{url('upload/avatar')}}" method="POST" id="formAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="text-center">
   <button type="button" class="btn btn-default no-padding btn-border btn-sm" id="avatar_file" style="margin-top: 10px;">
     <img src="{{ asset('public/avatar').'/'.Auth::user()->avatar }}" alt="User" width="150" height="150" class="avatarUser"  />
   </button>
   <input type="file" name="photo" id="uploadAvatar" accept="image/*" style="visibility: hidden;">
 </div>
</form>

<form action="{{ url('account') }}" method="post" name="form">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <!-- Full Name -->
 <div class="form-group has-feedback">
   <label>Full Name</label>
   <input type="text" class="form-control input-lg" value="{{ e( $user->name ) }}" id="full_name" name="full_name" placeholder="Full Name" required>
 </div>

 <div class="form-group has-feedback">
   <label>Email</label>
   <input type="email" class="form-control input-lg" value="{{$user->email}}" id="email" name="email" placeholder="Email" required>
 </div>

 <button type="submit" id="buttonSubmit" class="btn btn-lg btn-save custom-rounded">Save</button>

</form>


@include('includes.dashboard-end')
@endsection

@section('javascript')

<script type="text/javascript">

	//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
  $(document).on('change', '#uploadAvatar', function(){

    $('.wrap-loader').show();
    
    (function(){
      $("#formAvatar").ajaxForm({
        dataType : 'json',	
        success:  function(e){
          if( e ){
            if( e.success == false ){
              $('.wrap-loader').hide();

              var error = '';
              for($key in e.errors){
               error += '' + e.errors[$key] + '';
             }
             swal({   
               title: "Error",   
               text: ""+ error +"",   
               type: "error",   
               confirmButtonText: "Ok" 
             });

             $('#uploadAvatar').val('');

           } else {

             $('#uploadAvatar').val('');
             $('.avatarUser').attr('src',e.avatar);
             $('.wrap-loader').hide();
           }

		}//<-- e
   else {
    $('.wrap-loader').hide();
    swal({   
     title: "Error",   
     text: 'Error',   
     type: "error",   
     confirmButtonText: "Ok" 
   });

    $('#uploadAvatar').val('');
  }
		   }//<----- SUCCESS
    }).submit();
    })(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
</script>
@endsection