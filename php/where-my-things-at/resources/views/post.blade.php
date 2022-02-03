<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Details</title>

</head>
<body>
    <a href="/posts/{{$post->id}}">
        <h1 class="text-2xl">{{ $post->title }}</h1>
    </a>
    <p>{{$post->content}}</p>
</body>
</html>
