<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css');}}">
    <title>Edit_tweet</title>
</head>
<body>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <h1>ツイート編集ページ</h1>
    <form action="/edit_tweet" method="post" enctype="multipart/form-data">
        <br>
        ツイート内容
        <textarea type="text" name="text" value="{{old('text', $tweet->text)}}"></textarea>
        <br>
        画像
        <img src="{{ $tweet->image_path }}" alt="">
        <input type="file" name="image" value="">
        <br>
        <input type="hidden" name="id" value="{{ $tweet->id }}">
        <input type="hidden" name="mode" value="update">
        <input type="submit" value="更新">
        @csrf
</body>
</html>
