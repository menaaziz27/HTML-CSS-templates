<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movie Detail</title>
    </head>
    <body>
        <div class="container">
            <h3>{{ $movie->name }}</h3>
            <p>{{ $movie->description }}</p>
            <p>{{ $movie->rating }}</p>
        </div>
    </body>
</html>
