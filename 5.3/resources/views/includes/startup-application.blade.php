@if( $response->problem != '' )
<h4 class="profile-title">Describe the problem you are solving?</h4>
<p class="margin-bottom-40">{{$response->problem}}</p>
<hr>
@endif

@if( $response->solution != '' )
<h4 class="profile-title">How does your product/service solve this problem?</h4>
<p class="margin-bottom-40">{{$response->solution}}</p>
<hr>
@endif

@if( $response->market != '' )
<h4 class="profile-title">Who is your target market?</h4>
<p class="margin-bottom-40">{{$response->market}}</p>
<hr>
@endif

@if( $response->model != '' )
<h4 class="profile-title">What is your business model?</h4>
<p class="margin-bottom-40">{{$response->model}}</p>
<hr>
@endif

@if( $response->traction != '' )
<h4 class="profile-title">What is your current traction?</h4>
<p class="margin-bottom-40">{{$response->traction}}</p>
<hr>
@endif

@if( $response->competitors != '' )
<h4 class="profile-title">Who are your main competitors?</h4>
<p class="margin-bottom-40">{{$response->competitors}}</p>
<hr>
@endif

@if( $response->team != '' )
<h4 class="profile-title">Provide a management team summary</h4>
<p class="margin-bottom-40">{{$response->team}}</p>
<hr>
@endif

@if( $response->spend != '' )
<h4 class="profile-title">Please provide a breakdown of use of funds</h4>
<p class="margin-bottom-40">{{$response->spend}}</p>
<hr>
@endif

@if( $response->strengths != '' )
<h4 class="profile-title">What are your key strengths?</h4>
<p class="margin-bottom-40">{{$response->strengths}}</p>
<hr>
@endif

@if( $response->weaknesses != '' )
<h4 class="profile-title">What are your biggest weaknesses?</h4>
<p class="margin-bottom-40">{{$response->weaknesses}}</p>
<hr>
@endif

@if( $response->why != '' )
<h4 class="profile-title">Why did you start the company? What excites you about it?</h4>
<p class="margin-bottom-40">{{$response->why}}</p>
<hr>
@endif