<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ツイートアップロードフォーム</title>
</head>
<body>
    <h1>画像アップロードフォーム</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <div>
            <label for="image">
                <p>アップロード画像</p>
                <input id="image_path" type="file" name="image">
            </label>
        </div>

        <div>
            <label for="memo">
                <p>投稿文</p>
                <textarea name="text" id="memo" cols="50" rows="10"></textarea>
            </label>
        </div>

        <div>
            <p>
                <input type="submit" value="ツイートする">
            </p>
        </div>

        @csrf
    </form>
</body>
</html>
