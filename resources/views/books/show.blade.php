<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Book</title>
</head>
<body>
    <a href="/books">Back To Book List Page</a>
    <h2>Show Book</h2>

    <p>Title: {{ $book->title }}</p>
    <p>Author: {{ $book->author }}</p>
    <p>Publication: {{ $book->publication }}</p>
    <p>Created At: {{ $book->created_at }}</p>
    <p>Updated At: {{ $book->updated_at }}</p>
</body>
</html>