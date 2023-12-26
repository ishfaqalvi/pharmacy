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
								<input class="mb-0" type="text" name="name" required="required" placeholder="Your Name">
							</div>
							<div class="col-md-12 col-12 mb--20">
								<label>Email Address *</label>
								<input class="mb-0" type="email" name="email" required="required" placeholder="abc@example.com">
							</div>
							<div class="col-12 mb--20">
								<label>Phone Number *</label>
								<input class="mb-0" type="tel" name="phone_number" id="number" required="required" pattern="\+[0-9]{1,3}-[0-9]{6,12}" placeholder="+923001234567">
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
    	$("#error").hide();
    	$("#overlay").show('slow');
        var number = $("#number").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            $("#successAuth").text("Message sent successfully! Check Your Phone.");
            $("#successAuth").show();
            $("#dataRow").hide();
            $("#otpRow").show();
            $("#overlay").hide('slow');
        }).catch(function (error) {
        	$("#successAuth").hide();
            $("#error").text(error.message);
            $("#error").show();
            $("#overlay").hide('slow');
        });
    }
    function verify() {
    	$("#overlay").show('slow');
        var code = $("#verification").val();
        coderesult.confirm(code).then(function (result) {
            var user = result.user;
            $("#submitForm").submit();
        }).catch(function (error) {
        	$("#successAuth").hide();
            $("#error").text(error.message);
            $("#error").show();
            $("#overlay").hide('slow');
        });
    }
</script>
@endsection