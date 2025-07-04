<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title {
            background: rebeccapurple;
            color: white;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <h1 class="title">{{ $task->title }}</h1>
    <div>
        <h2>
            {{ $task->title }}
        </h2>
        <span>
            {{ $task->status}}
        </span>
    </div>
</body>

</html>