@extends('master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="register" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">

                <label for="exampleInputEmail1">Name</label>
                <input type="text"   name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  @error('confirm_password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Date Of Birth</label>
                  <input type="date" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Date Of Birth">
                  @error('dob')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>
                <label>Upload Picture:</label>
                <p>

                    <input type="file" name="image" id="picture" />
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>


                    <p>
                    <input name="submit" type="submit" value="Submit" id="submit" />
                    </p>
              </form>

        </div>
    </div>
</div>
@endsection
