@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item active" aria-current="page">Login</li>
    	</ol>
  	</div>
</nav>
<main class="page-section pb--10 pt--50">
	<div class="container">
		<header class="entry-header">
			<h1 class="entry-title">My Account</h1>
		</header>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
				<!-- Login Form s-->
				<form action="https://htmldemo.net/petmark/petmark/" >
					<h4 class="login-title">Login</h4>
					<div class="login-form">
						<div class="row">
							<div class="col-md-12 col-12 mb--20">
								<label>Username or email address *</label>
								<input class="mb-0" type="email" >
							</div>
							<div class="col-12 mb--20">
								<label>Password</label>
								<input class="mb-0" type="password" >
							</div>
							<div class="col-md-12">
								<div class="d-flex align-items-center flex-wrap">
									<a href="#" class="btn btn-black   me-3">Login</a>
									<div class="d-inline-flex align-items-center">
										<input type="checkbox" id="accept_terms" class="mb-0 me-1">
										<label for="accept_terms" class="mb-0 font-weight-400">Remember Me</label>
									</div>
								</div>
								<p><a href="#" class="pass-lost mt-3">Lost your password?</a></p>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
				<form action="https://htmldemo.net/petmark/petmark/">
					<h4 class="login-title">Register</h4>
					<div class="login-form">
						<div class="row">
							<div class="col-md-12 col-12 mb--20">
								<label>Email Address*</label>
								<input class="mb-0" type="email">
							</div>
							<div class="col-12 mb--20">
								<label>Password</label>
								<input class="mb-0" type="password">
							</div>
							<div class="col-md-12">
								<a href="#" class="btn btn-black">Register</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection