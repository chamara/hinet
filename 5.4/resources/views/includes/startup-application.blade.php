@foreach( App\Models\Questions::all() as $question )
<h4 class="profile-title">{{ $question->question }}</h4>
<p class="margin-bottom-40">{{ $response->{'response_'.$loop->iteration} }}</p>
<hr>  
@endforeach