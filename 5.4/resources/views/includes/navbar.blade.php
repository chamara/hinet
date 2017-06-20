<?php  
if( Auth::check() ){ 
  $data = App\Models\Startups::where('user_id',Auth::user()->id)->paginate(1);
}
?>
<!-- Pending Investor -->
@if( Auth::check() && $userAuth->status == 'pending' )
<div class="btn-block text-center confirmEmail">Investor Account Pending - You will be able to access opportunities once approved.</div>
@endif


<!-- Navbar -->
<div class="navbar-container">
  <nav id="mainNav" class="navbar-fixed-top affix-top padding-bottom-40">
    <div class="navbar navbar-inverse">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Logo -->
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('public/img/logo.png') }}" class="logo"/>
          </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-collapse collapse" id="navbar-collapse" aria-expanded="false">
        <ul class="nav navbar-nav navbar-right">
          <!-- Logged in List -->
          @if( Auth::check() )

            @if( $userAuth->role == 'admin')
              <li><a href="{{ url('panel/admin') }}">Admin</a></li>
            @endif

            <!-- Investor List -->
            @if( $userAuth->role == 'investor') 
              <li><a href="{{ url('/opportunities') }}">Current Opportunities</a></li>
              <li><a href="{{ url('account/portfolio') }}">My Portfolio</a></li>
            @endif

            <!-- Startup List -->
            @if( $userAuth->role == 'startup') 
              @foreach( $data as $startup )
                <li><a href="{{ url('startup',$startup->id) }}">{{$startup->title}}</a></li>
                <li><a href="{{ url('edit/startup',$startup->id) }}">Edit {{$startup->title}}</a></li>
                <li class="account"><a href="{{ url('account') }}">Account</a></li>
                <li class="account"><a href="{{ url('logout') }}" class="logout text-overflow">Logout</a></li>
              @endforeach
            @endif

            <li class="nav navbar-nav dropdown" id="avatar">
              <a data-toggle="dropdown">
                <img src="{{ asset('public/avatar').'/'.$userAuth->avatar }}" class="navbar-avatar"/>
                <i class="ion-chevron-down"></i>
              </a>

              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
               <li><a href="{{ url('account') }}">Account</a></li>
               <li><a href="{{ url('logout') }}" class="logout text-overflow">Logout</a></li>
             </ul>
            </li>
          @else 
            <!-- Logged Out List -->
            <li><a href="{{ url('/startups') }}">Startups</a></li>
            <li><a href="{{ url('/investors') }}">Investors</a></li>

            <li><a href="{{ url('/login') }}">Login</a></li>

            @if ($settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'no')
              <li><a href="{{ url('/register/investor') }}">Investor Sign Up</a></li>

            @elseif ($settings->disable_startups_reg == 'no' && $settings->disable_investors_reg == 'yes')
              <li><a href="{{ url('/register/startup') }}">Register Startup</a></li>

            @elseif ($settings->disable_startups_reg == 'no' && $settings->disable_investors_reg == 'no')
              <li><a href="{{ url('/register') }}">Sign Up</a></li>
            @else
          @endif

         @endif
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- /.mainNav -->
</div>
<!-- /.navbar-container -->