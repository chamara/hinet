<div class="banner-divider banner-blue">
  <div class="banner-content">
    <h1 class="title-site margin-bottom-40">Admin Dashboard</h1>
  </div>
</div>

<!-- Container -->
<div class="container margin-bottom-40 padding-top-40">
  <div class="startup-sidebar">
    <div class="row padding-top-40">
      <div class="col-md-3 margin-top-40">
       <hr>
       <ul class="startup-navigation">
         <li @if(Request::path() == "account") class="active" @endif>
         <a href="{{ url('account') }}">Account</a></li>
         <li @if(Request::path() == "account/password") class="active" @endif>
         <a href="{{ url('account/password') }}">Change Password</a></li>
         <li><a href="{{ url('logout') }}">Logout</a></li>
       </ul>
     </div>


     <div class="col-md-9 border-left margin-top-40">
      <div class="edit-panel">
        <div class="edit-panel-content">