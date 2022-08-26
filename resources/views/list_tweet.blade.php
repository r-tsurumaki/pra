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
    <h1>ツイート一覧</h1>


    @if ($message->count() > 0)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ツイート</th>
            <th>画像</th>

        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($message as $contact)
            <tr>
                {{-- <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->my_address }}</td> --}}



                {{-- <td><a href="/MessageBoard/edit/{{ $contact->id }}">編集</a></td> --}}
                <td>
                    <form action="/MessageBoard/delete/{{$contact->id}}" method="post">
                        <input type="submit" value="削除" name="delete">
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>投稿がありません</p>
@endif


<a href="/MessageBoard/top">トップへ戻る</a>


</body>
</html>
