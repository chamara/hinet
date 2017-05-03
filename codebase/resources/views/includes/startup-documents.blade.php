<div class="table-responsive">
	<table class="table"> 
		<tbody> 
			@foreach( $documents as $document )
			<tr>
				<td><a target="_blank" href="{{url('public/startups/documents',$document->path)}}">
					@if ($document->type == 'pdf' )
					<img src="{{ asset('public/img/pdf.png') }}" class="startup-file"/>
					@elseif ($document->type == 'xls' || $document->type == 'xlsx')
					<img src="{{ asset('public/img/xls.png') }}" class="startup-file"/>
					@endif
					</a>
				</td>
				<td><a class="filename" target="_blank" href="{{url('public/startups/documents',$document->path)}}">{{$document->filename}}</a></td>
				<td>{{$document->filesize}}mb</td>
			</tr>
			@endforeach	  		 		
		</tbody> 
	</table>
</div>