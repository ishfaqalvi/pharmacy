@if ($paginator->hasPages())
<div class="shop-toolbar mb--30">
	<div class="row align-items-center">
		<div class="col-5 col-md-3 col-lg-4">
  		<!-- Product View Mode -->
  			<div class="product-view-mode">
    			<a href="#" class="sortting-btn active" data-bs-target="list ">
    				<i class="fas fa-list"></i>
    			</a>
    			<a href="#" class="sortting-btn" data-bs-target="grid">
    				<i class="fas fa-th"></i>
    			</a>
  			</div>
		</div>
		<div class="col-7 col-md-9 col-lg-7 offset-lg-1 mt-3 mt-md-0 pe-md-0">
  			<div class="sorting-selection">
    			<div class="row align-items-center ps-md-0 pe-md-0 g-0">
      				<div class="col-sm-12 text-sm-end mt-sm-0 mt-3">
      					<span>{!! __('Showing') !!}</span>
                    	<span class="fw-semibold">
                    		{{ $paginator->firstItem().'-'.$paginator->lastItem() }}
                    	</span>
                    	{!! __('of') !!}
                    	<span class="fw-semibold">{{ $paginator->total() }}</span>
                    	<span>{!! __('results') !!}</span>
      				</div>
    			</div>
  			</div>
		</div>
	</div>
</div>
@endif