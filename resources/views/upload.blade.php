<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>Document</title>
</head>
<body>


    <h1>upload</h1>
    <form name="form" method="POST" action="/upload" enctype="multipart/form-data" >

    @csrf
    <label>Upload Picture:</label>
        <input type="file" name="image" id="picture" required />
        </p>
        <p id="error1" style="display:none; color:#971c1c;">

        Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
        </p>
        <p id="error2" style="display:none; color:#971c1c;">
        Maximum File Size Limit is 1MB.
        </p>
        <p>
            <input name="submit" type="submit" value="Submit" id="submit" />
            </p>
   </form>
    <br>
    <ul>



    </div>

    @foreach($photos as $photo)
            <li>{{$photo->image}}<img style="width: 100px" src="storage/images/{{$photo->image}}"></li>
        @endforeach


    </ul>


</body>
<script>
    $('input[type="submit"]').prop("disabled", true);
var a=0;
//binds to onchange event of your input field
$('#picture').bind('change', function() {
if ($('input:submit').attr('disabled',false)){
	$('input:submit').attr('disabled',true);
	}
var ext = $('#picture').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
	$('#error1').slideDown("slow");
	$('#error2').slideUp("slow");
	a=0;
	}else{
	var picsize = (this.files[0].size);
	if (picsize > 80000){
	$('#error2').slideDown("slow");
	a=0;
	}else{
	a=1;
	$('#error2').slideUp("slow");
	}
	$('#error1').slideUp("slow");
	if (a==1){
		$('input:submit').attr('disabled',false);
		}
}
});
</script>
</html>
