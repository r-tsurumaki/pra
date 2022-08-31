<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/edit.css');}}">
    <title>Edit | つぶやきアプリ</title>

</head>
<body>
    <style>
        div{
            text-align: center;
        }
        body{
            background-color:#90eeff;
        }
        </style>
<div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    <div class="foo">
        <span class="letter" data-letter="編">編</span>
        <span class="letter" data-letter="集">集</span>
        <span class="letter" data-letter="画">画</span>
        <span class="letter" data-letter="面">面</span>
    </div>
    <form action="/edit_tweet" method="post" enctype="multipart/form-data">
        <br>
        ツイート内容
    <br>
    <div>
        <textarea type="text" name="text" required>{{old('text', $tweet->text)}}</textarea>
    </div>
    <br>
        画像
    <br>
        <img src="{{ $tweet->image_path }}" alt="">
        <input type="file" name="image_path" value="">
        <br>
        <div></div> <input type="hidden" name="id" value="{{ $tweet->id }}">
        <input type="hidden" name="mode" value="update">
        <input type="submit" value="更新">
        @csrf
    </form>
    <a href="/list_tweet">戻る</a>
    </div>
</body>
</html>
