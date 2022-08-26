<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @auth
    <a href="{{ route('login') }}">ログイン</a>
    @endauth
    @guest
    <a href="{{ route("logout")}}">ログアウト</a>
    @endguest
    <h1>ツイート一覧</h1>


@if ($upload_images->count() > 0)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ユーザーID</th>
            <th>ツイート</th>
            <th>画像</th>

        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($upload_images as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->user_id }}</td>
                <td>{{ $contact->text }}</td>
                <td><img src="{{asset($contact->image_path)}}" alt=""></td>
            </tr>
        @endforeach
    </table>
@else
    <p>投稿がありません</p>
@endif


<a href="top">トップへ戻る</a>


</body>
</html>
