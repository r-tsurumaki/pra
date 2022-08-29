<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
            {{ __('Log Out') }}
        </button>
    </form>
    @endauth
    @guest
    <a href="{{ route('login') }}">ログイン</a>
    @endguest
    <h1>ツイート一覧</h1>

<a href="/upload_tweet">tweetする</a>
@if($list->count() > 0)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ユーザーID</th>
            <th>ツイート</th>
            <th>画像</th>
            <th>削除</th>
        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->users->name }}</td>
            <td>{!! nl2br(e($item->text)) !!}</td>
            <td><img src="@if( !empty($item->image_path) ) {{ $item->image_path }} @endif"></td>
            <td>
                <form action="/edit_tweet" method="post">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="submit" value="編集">
                    @csrf
                </form>
            </td>
            <td>
                <form action="/delete_tweet" method="post">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="submit" name="delete" value="削除">
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@else
    <p>投稿がありません</p>
@endif


<a href="top">トップへ戻る</a>


</body>
</html>
