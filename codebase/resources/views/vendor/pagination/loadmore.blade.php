@if ($paginator->hasMorePages())  
<a href="{{ $paginator->nextPageUrl() }}" rel="next" class="list-group-item text-center loadPaginator" id="paginator">
	<i class="fa fa-repeat myicon-right"></i> Next Page
</a>
@endif
<a href="{{ $paginator->previousPageUrl() }}" rel="previous" class="list-group-item text-center loadPaginator" id="paginator">
	<i class="fa fa-repeat myicon-right"></i> Previous Page
</a>

