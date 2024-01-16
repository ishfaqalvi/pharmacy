@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item active" aria-current="page">My Account</li>
    	</ol>
  	</div>
</nav>
<div class="page-section sp-inner-page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-lg-3 col-12">
						<div class="myaccount-tab-menu nav" role="tablist">
							<a href="#dashboad" class="active" data-bs-toggle="tab">
								<i class="fas fa-tachometer-alt"></i>
								Dashboard
							</a>
							<a href="#orders" data-bs-toggle="tab">
								<i class="fa fa-cart-arrow-down"></i> 
								Orders
							</a>
							<a href="#download" data-bs-toggle="tab">
								<i class="fas fa-download"></i> 
								Download
							</a>
							<a href="#payment-method" data-bs-toggle="tab">
								<i class="fa fa-credit-card"></i> 
								Payment Method
							</a>
							<a href="#address-edit" data-bs-toggle="tab">
								<i class="fa fa-map-marker"></i> Address
							</a>
							<a href="#account-info" data-bs-toggle="tab">
								<i class="fa fa-user"></i> 
								Account Details
							</a>
							<form method="POST" action="{{ route('web.logout') }}">
                                @csrf
                                <a 
                                    href="{{ route('web.logout') }}" 
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
						</div>
					</div>
					<div class="col-lg-9 col-12 mt--30 mt-lg-0">
						<div class="tab-content" id="myaccountContent">
							<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
								@include('web.user.include.dashboard')
							</div>
							<div class="tab-pane fade" id="orders" role="tabpanel">
								@include('web.user.include.orders')
							</div>
							<div class="tab-pane fade" id="download" role="tabpanel">
								<div class="myaccount-content">
									<h3>Downloads</h3>
									<div class="myaccount-table table-responsive text-center">
										<table class="table table-bordered">
											<thead class="thead-light">
											<tr>
												<th>Product</th>
												<th>Date</th>
												<th>Expire</th>
												<th>Download</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Mostarizing Oil</td>
												<td>Aug 22, 2018</td>
												<td>Yes</td>
												<td><a href="#" class="btn">Download File</a></td>
											</tr>
											<tr>
												<td>Katopeno Altuni</td>
												<td>Sep 12, 2018</td>
												<td>Never</td>
												<td><a href="#" class="btn">Download File</a></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="payment-method" role="tabpanel">
								<div class="myaccount-content">
									<h3>Payment Method</h3>
									<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
								</div>
							</div>
							<div class="tab-pane fade" id="address-edit" role="tabpanel">
								<div class="myaccount-content">
									<h3>Billing Address</h3>
									<address>
										<p><strong>Alex Tuntuni</strong></p>
										<p>1355 Market St, Suite 900 <br>
											San Francisco, CA 94103</p>
										<p>Mobile: (123) 456-7890</p>
									</address>
									<a href="#" class="theme-btn"><i class="fa fa-edit"></i>Edit Address</a>
								</div>
							</div>
							<div class="tab-pane fade" id="account-info" role="tabpanel">
								@include('web.user.include.profile')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection