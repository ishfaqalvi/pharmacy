<div class="myaccount-content">
	<h3>Dashboard</h3>
	<img src="{{ auth()->user()->image }}">
	<div class="welcome mb-20">
		<p>Hello, <strong>{{ auth()->user()->name }}</strong></p>
	</div>
	<p class="mb-0">From your account dashboard. you can easily check &amp; view your
		recent orders, manage your shipping and billing addresses and edit your
		password and account details.</p>
</div>