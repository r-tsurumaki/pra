<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css');}}">
    <title>Document</title>
</head>
<body>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <h1>ツイート編集ページ</h1>
    {{-- <form action="/MessageBoard/edit/{{$message->id}}" method="post"> --}}
        <br>
        ツイート内容
        {{-- <input type="text" name="you_address" value="{{old('you_address', $message->you_address)}}"> --}}
        <br>
        画像
        {{-- <input type="text" name="detail" value="{{old('detail', $message->detail)}}"> --}}
        <!--<textarea name="detail" value="{{old('detail', $message->detail)}}"></textarea>-->
        <br>

        <input type="submit" value="更新">
        @csrf
</body>
</html>
