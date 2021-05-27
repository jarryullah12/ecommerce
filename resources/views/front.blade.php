<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
   
</head>
<body>

<div class="container">
    <h1>My status</h1>
    <hr>
      <form action="/comment" method="post">
      @csrf
      <div class="form-group">
      <label for="comment">Write comment</label>
      <input type="text" class="form-control" name="comment" placeholder="" type="text">
      </div>
      <input type="submit" value="Done" class="btn btn-primary">
      </form>
      <br>
    <h5>List of Comments</h5>
    <hr>
    <ol>
    @forelse($comments as $comment)
    <li class="lead">{{$comment->comment}}</li>
   @empty
   <h4>No comment</h4>
    @endforelse
    </ol>
    
</div>
</body>
</html>