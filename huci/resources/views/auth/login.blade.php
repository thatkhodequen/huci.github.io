<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('public/images/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
					@csrf


					<span class="login100-form-title ">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="{{asset('public/images/3.png')}}" class="w-50" alt="">
					</span>

					<div class="wrap-input100 validate-input">
						<input type="text" class="input100" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="Tên đăng nhập"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					@error('email')
					<span class="" role="alert">
						<p style="color:red">{{ $message }}</p>
					</span>
					@enderror

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('public/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/js/main1.js')}}"></script>

</body>

</html>