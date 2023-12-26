@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item active" aria-current="page">Profile</li>
    	</ol>
  	</div>
</nav>
<main class="page-section pb--10 pt--50">
	<div class="container">
		<header class="entry-header">
			<h1 class="entry-title">My Account</h1>
		</header>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 mx-auto">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
				@endif
				@if(Session::has('success'))
                	<div class="alert alert-success">
                		{{Session::get('success')}}
                	</div>
            	@endif
				<form action="{{ route('user.update') }}" method="Post">
					@csrf
					<h4 class="login-title">Profile</h4>
					<div class="login-form">
						<div class="row">
							<div class="col-md-12 col-12 mb--20">
								<label>Name *</label>
								<input class="mb-0" type="text" name="name" required="required" placeholder="Your Name" value="{{ auth()->user()->name }}">
							</div>
							<div class="col-md-12 col-12 mb--20">
								<label>Email Address *</label>
								<input class="mb-0" type="email" name="email" required="required" placeholder="abc@example.com" value="{{ auth()->user()->email }}">
							</div>
							<div class="col-12 mb--20">
								<label>Phone Number *</label>
								<input class="mb-0" type="tel" name="phone_number" disabled value="{{ auth()->user()->phone_number }}">
							</div>
							<div class="col-md-12">
								<div class="d-flex align-items-center flex-wrap">
									<button type="submit" class="btn btn-black me-3">
										Submit
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection