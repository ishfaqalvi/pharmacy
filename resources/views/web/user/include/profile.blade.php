<div class="myaccount-content">
	<h3>Account Details</h3>
	<div class="account-details-form">
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
		<form id="updateProfile" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-12 mb-30"><h4>Personal Detail</h4></div>
				<div class="col-lg-6 col-12 mb-30">
					<input type="text" name="name" required="required" placeholder="Your Name" value="{{ auth()->user()->name }}">
				</div>
				<div class="col-lg-6 col-12 mb-30">
					<input type="email" name="email" required="required" placeholder="Your Email Address" value="{{ auth()->user()->email }}">
				</div>
				<div class="col-lg-6 col-12 mb-30">
					<input type="file" name="image" capture>
				</div>
				<div class="col-lg-6 col-12 mb-30">
					<input type="tel" name="phone_number" disabled value="{{ auth()->user()->phone_number }}">
				</div>
				<div class="col-12 mb-30"><h4>Address Detail</h4></div>
				<div class="col-lg-6 col-12 mb-30">
					<select name="city_id">
						<option value="">--Select City--</option>
						@foreach(cityList() as $city)
							@if($city->id == auth()->user()->city_id)
								@php($selected = 'selected')
							@else
								@php($selected = '')
							@endif
							<option value="{{ $city->id }}" {{ $selected }}>{{ $city->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-6 col-12 mb-30">
					<input placeholder="Enter Contact Number" type="text" name="contact_number" value="{{ auth()->user()->contact_number }}">
				</div>
				<div class="col-12 mb-30">
					<input placeholder="Enter Home Address" type="text" name="address" value="{{ auth()->user()->address }}">
				</div>
				<div class="col-12">
					<div class="d-flex align-items-center flex-wrap">
						<button type="submit" class="btn btn-black me-3">
							Submit
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>