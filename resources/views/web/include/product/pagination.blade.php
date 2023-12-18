@if ($paginator->hasPages())
<div class="mt--30">
  	<div class="pagination-widget">
		<div class="site-pagination">	        
	        @if ($paginator->onFirstPage())
	        	<a class="single-pagination">|&lt;</a>
	        	<a class="single-pagination">&lt;</a>
	        @else
	        	<a href="{{ $paginator->url(1) }}" class="single-pagination">|&lt;</a>
	        	<a 
	        		href="{{ $paginator->previousPageUrl() }}" 
	        		rel="prev" 
	        		class="single-pagination" 
	        		aria-label="@lang('pagination.previous')">
	        		&lt;
	        	</a>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                	<a class="single-pagination">{{ $element }}</a>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        	<a class="single-pagination active" aria-current="page">{{ $page }}</a>
                        @else
                        	<a href="{{ $url }}" class="single-pagination" aria-current="page">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            	<a 
            		href="{{ $paginator->nextPageUrl() }}" 
            		class="single-pagination"
            		rel="next" aria-label="@lang('pagination.next')"
            		>
            		&gt;
            	</a>
            	<a href="{{ $paginator->url($paginator->lastPage()) }}" class="single-pagination">&gt;|</a>
            @else
            	<a href="#" class="single-pagination disabled" aria-disabled="true" aria-label="@lang('pagination.next')">&gt;</a>
            	<a class="single-pagination">&gt;|</a>
            @endif
		</div>
	</div>
</div>
@endif