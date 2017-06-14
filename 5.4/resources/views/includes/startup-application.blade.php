@foreach( App\Models\Questions::where('mode','on')->orderBy('id')->get() as $question )
<h4 class="profile-title">{{ $question->question }}</h4>
<p class="margin-bottom-40">{{ $response->{'response_'.$loop->iteration} }}</p>
<hr>  
@endforeach