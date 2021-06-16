<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


		<div class="wrapper"  style="background-image: url('{{ asset('nowcommercestyle/images/bg-registration-form-1.jpg')}}');">
			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('nowcommercestyle/images/registration-form-1.jpg')}}" alt="">
				</div>
				<br>

				<form action="/profile" method="POST" enctype="multipart/form-data">
                    <h1 style="text-align: center">
                    <img style="height: 60px" src="{{asset('nowcommercestyle/images/logo.png')}}" alt="">
                    </h1>
					<br>
				<br>
                @csrf
					<div class="form-wrapper">
                    <input type="hidden" name="id" value={{$data['id']}}>

						<input type="text" name="username" value="{{$data['username']}}" class="form-control">

						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" value="{{$data['email']}}" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="gender" value="{{$data['gender']}}" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" value="{{base64_decode($data->password)}}" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>

                    <div class="form-wrapper">
						<input type="password" name="confirm_password"  value="{{base64_decode($data->confirm_password)}}"  class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button  type="submit" style="background-color: brown;">Update now
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

	</body>
</html>




