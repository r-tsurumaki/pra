<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="all.css" >
    <title class="fadeIn">ツイート</title>
</head>
<body>
    <h1>画像アップロードフォーム</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <div>
            <label for="image">
                <p>アップロード画像</p>
                <input id="image" type="file" name="image">
            </label>
        </div>

        <div>
            <label for="memo">
                <p>ツイート内容</p>
                <textarea name="memo" id="memo" cols="50" rows="10"></textarea>
            </label>
        </div>

        <div>
            <p>
                <input type="submit" value="アップロードする">
            </p>
        </div>

        @csrf
    </form>
</body>
</html>