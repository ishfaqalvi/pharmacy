@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item active" aria-current="page">Account Login</li>
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
				<div class="alert alert-danger" id="error" style="display: none;"></div>
				<div class="alert alert-success" id="successAuth" style="display: none;"></div>
				<form action="{{ route('web.login') }}" method="Post" id="submitForm">
					@csrf
					<h4 class="login-title">Login</h4>
					<div class="login-form">
						<div class="row" id="dataRow">
							<div class="col-md-12 col-12 mb--20">
								<label>Name *</label>
								<input class="mb-0" type="text" name="name" id="name" placeholder="Your Name">
							</div>
							<div class="col-md-12 col-12 mb--20">
								<label>Email Address *</label>
								<input class="mb-0" type="email" name="email" id="email" placeholder="abc@example.com">
							</div>
							<div class="col-12 mb--20">
								<label>Phone Number *</label>
								<input class="mb-0" type="tel" name="phone_number" id="number" required="required" pattern="\+[0-9]{1,3}-[0-9]{6,12}" placeholder="3001234567">
							</div>
							<div class="col-md-12">
								<div class="d-flex align-items-center flex-wrap">
									<button type="button" class="btn btn-black me-3" id="sign-in-button" onclick="sendOTP();">
										Send Code
									</button>
								</div>
							</div>
						</div>
						<div class="row" id="otpRow" style="display:none;">
							<div class="col-md-12 col-12 mb--20">
								<label>Code *</label>
								<input class="mb-0" type="number" id="verification" required="required">
							</div>
							<div class="col-md-12">
								<div class="d-flex align-items-center flex-wrap">
									<button type="button" class="btn btn-black me-3" onclick="verify()">Verify Code</button>
								</div>
							</div>
							<p><a href="#" class="pass-lost mt-3">Resend Code</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
@endsection

@section('script')
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCbkgvDAAa7BauY2EPVahYt7WIeoUqJlTo",
        authDomain: "pharmacy-6b014.firebaseapp.com",
        projectId: "pharmacy-6b014",
        storageBucket: "pharmacy-6b014.appspot.com",
        messagingSenderId: "1027484965522",
        appId: "1:1027484965522:web:795cfe00348077045a244b",
        measurementId: "G-4T097TE9C8",
        databaseURL: "https://pharmacy-6b014.firebaseio.com"
    };
    firebase.initializeApp(firebaseConfig);
</script>
<script type="text/javascript">
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
		  	'size': 'invisible',
		  	'callback': (response) => {
		    	onSignInSubmit();
		  	}
		});
    }
	function sendOTP() {
	    var name = $("#name").val();
	    var email = $("#email").val();
	    var number = $("#number").val();
	    if (isFormDataValid(name, email, number)) {
	        var phone = convertToStandardFormat(number);
	        if (phone) {
	            showOverlay(true);
	            firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier)
	                .then(function (confirmationResult) {
	                    window.confirmationResult = confirmationResult;
	                    coderesult = confirmationResult;
	                    $("#dataRow").hide();
	                    $("#otpRow").show();
	                    showToast('success', 'Message sent successfully! Check your phone.');
	                }).catch(function (error) {
	                    showToast('error', error.message);
	                }).finally(() => {
	                    showOverlay(false);
	                });
	        } else {
	            showToast('error', 'Phone number format is invalid!');
	        }
	    }
	}
	function verify() {
	    showOverlay(true);
	    var code = $("#verification").val();
	    coderesult.confirm(code).then(function (result) {
	        var user = result.user;
	        sendFormData();
	    }).catch(function (error) {
	        showToast('error', error.message);
	    }).finally(() => {
	        showOverlay(false);
	    });
	}
	function sendFormData() {
	    $.ajax({
	        url: '/login',
	        type: 'POST',
	        data: {
	            name: $("#name").val(),
	            email: $("#email").val(),
	            phone_number: convertToStandardFormat($("#number").val()),
	            _token: $('meta[name="csrf-token"]').attr('content')
	        },
	        success: function (response) {
	            showToast('success', response.message);
	            window.location.href = '/user/profile';
	        },
	        error: function (xhr) {
	            showToast('error', errorMessage);
	        }
	    });
	}
	function showOverlay(show) {
	    if(show) {
	        $("#overlay").show('slow');
	    } else {
	        $("#overlay").hide('slow');
	    }
	}
	function showToast(type, message) {
	    toastr[type](message);
	}
	function isFormDataValid(name, email, number) {
	    if(!name || !email || !number) {
	        showToast('warning', 'Please fill all fields!');
	        return false;
	    }
	    return true;
	}
	function convertToStandardFormat(number) {
	    number = number.replace(/[^0-9]/g, '');
	    if(number.length === 12 && number.startsWith('92')) {
	        return '+' + number;
	    }
	    else if(number.length === 11 && number.startsWith('03')) {
	        return '+92' + number.substring(1);
	    }
	    else if(number.length === 10) {
	        return '+92' + number;
	    }else {
	    	return false;
	    }
	}
</script>
@endsection