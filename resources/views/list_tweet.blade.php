<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/list.css')}}">
    <title>List|tweet</title>
</head>
<body>
    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="esc-btn">
            {{ __('Log Out') }}
        </button>
    </form>
    @endauth
    @guest
    <a href="{{ route('login') }}">ログイン</a>
    @endguest
    <h1>ツイート一覧</h1>

    <style>
        .esc-btn {
            display: inline-block;
            padding: 0.8em 2em;
            background-color: #e3364a;
            box-shadow: 0 5px 0 #ca1c30;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
            transition: all 5.5s ease-out;
        }

        /* ホバー時 */
        .esc-btn:hover {
            box-shadow: none;
            transform: translate(1500px);
        }

        /* クリック時 */
        .esc-btn:active {
            box-shadow: none;
            transform: translateY(5px);
        }
    </style>

    <div class="stage">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>

      <style>
        * *, *::before, *::after {
          animation-play-state: running !important;
        }
      </style>
      <script>window.setTimeout = null;</script>

<a href="/upload_tweet">tweetする</a>

<style>
    body {
        background-color: #e74c3c;
        animation: bg-color 0.75s infinite;
    }
    @keyframes bg-color {
        0% { color: red }
        20% { color: yellow; }
        40% { color: green; }
        60% { color: blue; }
        80% { color: purple; }
        100% { color: red; }
    }


    a, a:link, a:visited, a:active {
        font-size: 2em;
        animation: a-color 0.75s infinite;
    }
    @keyframes a-color {
        0% { color: red; }
        50%{ color: yellow;}
        100% { color: red; }
    }
</style>


@if($list->count() > 0)
    <table border="1" style="margin-right: 67%">
        <tr>
            <th>ID</th>
            <th>ユーザーID</th>
            <th>ツイート</th>
            <th>画像</th>
            <th>good</th>
            <th>編集</th>
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
                <form action="/good_tweet" method="post">
                    <span>{{ $item->good }}<span>
                    <input type="hidden" name="tweet_id" value="{{ $item->id }}">
                    <button class="btn" type="submit">good</button>
                    @csrf
                </form>
            </td>
            <td>
                <form action="/edit_tweet" method="post">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button class="btn" type="submit">編集</button>
                    @csrf
                </form>
            </td>
            <td>
                <form action="/delete_tweet" method="post">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button class="btn" type="submit" name="delete">削除</button>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@else
    <p>投稿がありません</p>
@endif

<style>
    .btn{
        color:red;
        border-radius: 10px;
    }
</style>

</body>
</html>
