<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('nowcommercestyle/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">
        <link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/material-design-iconic-font/css/material-design-iconic-font.min') }}">
        <link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/poppins/Poppins-Regular.ttf') }}">
        <link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/poppins/Poppins-SemiBold.ttf') }}">



    <title>Shoesly</title>
</head>



<body>

		<div class="wrapper" style="background-image: url('{{ asset('nowcommercestyle/images/bg-registration-form-1.jpg')}}');" >
			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('nowcommercestyle/images/registration-form-1.jpg')}}" alt="">
				</div>

				<form action="register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 style="text-align: center">
                    <img style="height: 60px;" src="{{asset('nowcommercestyle/images/logo.png')}}" alt="">
                    </h1>
					<br>
				<br>
					<div class="form-wrapper">
						<input type="text" placeholder="Full name" name='username' class="form-control">
						<i class="zmdi zmdi-account"></i>
                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror

					</div>
					<div class="form-wrapper">
						<input type="email" placeholder="Email Address" name='email' class="form-control">
						<i class="zmdi zmdi-email"></i>
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>

						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" name='password' class="form-control">
						@error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                        <i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" name='confirm_password' class="form-control">
						@error('confirm_password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                        <i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit" name="submit"  id="submit"  style="background-color: brown;">Sign Up
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

	</body>

    </html>
