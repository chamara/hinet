<div class="table-responsive">
	<table class="table"> 
		<tbody> 
			@foreach( $teams as $team )
			<tr>
			<td><img src="{{url('public/startups/teams',$team->avatar)}}" class="team-avatar"/>
			<ul class="list-inline margin-top-20">
			@if( $team->linkedin != '' )   
			<li><a target="_blank" href="{{$team->linkedin}}" class="ico-social"><i class="fa fa-linkedin"></i></a></li>
			@endif
			</ul ></td>
			<td>{{$team->name}}</td>
			<td>{{$team->title}}</td>
			<td>{{$team->shareholding + 0}}%</td>
			</tr>
			@endforeach	  		 		
		</tbody> 
	</table>
</div>