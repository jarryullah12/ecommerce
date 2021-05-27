<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashbaord</title>
</head>
<body>
    <table class="table table-striped">
    <tr>
        <th>Comments</th>
        <th>Approval</th>

    </tr>
    <tr>
    @forelse($comments as $comment)
   
        <th>{{$comment->comment}}</th>
        <th>
        <form action="/toggle-approve" method="POST">
      @csrf
      <input type="checkbox" name="approve" <?php if($comment->approve == 1){echo "checked";} ?>>
      <input type="hidden" name="commentId" value="{{$comment->id}}">
      <input type="submit" value="Done" class="btn btn-primary">
      </form>
        </th>
    @empty
   <h4>No comment</h4>
    @endforelse
    </tr>
    </table>
</body>
</html>