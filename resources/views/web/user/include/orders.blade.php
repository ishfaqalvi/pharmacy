<div class="myaccount-content">
	<h3>Orders</h3>
	<div class="myaccount-table table-responsive text-center">
		<table class="table table-bordered" id="orderTable">
			<thead class="thead-light">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Date</th>
				<th>Status</th>
				<th>Total</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody id="orderTableBody">
				@foreach(auth()->user()->orders()->whereUserState('Show')->get() as $key => $order)
				<tr>
					<td>{{ ++$key }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ date('M d Y', $order->created_at->timestamp) }}</td>
					<td>{{ $order->status }}</td>
					<td>&#8360; {{ $order->totalAmount+$order->shipping_cost }}</td>
					<td>
						@if($order->status == 'Pending')
						<a href="javascript:void(0)" class="cancelOrder" data-order-id="{{ $order->id}}">Cancel</a>
						@endif
						@if($order->status == 'Cancelled' || $order->status == 'Completed')
						<a href="javascript:void(0)" class="deleteOrder" data-order-id="{{ $order->id}}">Delete</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>