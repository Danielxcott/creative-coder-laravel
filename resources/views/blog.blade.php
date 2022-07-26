<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?= $blog->title ?></h1>
    <div>
        {{-- <span>{{ $blog->created_at->format('d M Y') }}</span> --}}
    </div>
    <p>{{ $blog->description }}</p>
    <button>
        <a href="/">Go back</a>
    </button>
</body>
</html>